<?php

namespace Drupal\smile_entity\Controller;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Url;
use Drupal\smile_entity\Entity\smile_entityInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class smile_entityController.
 *
 *  Returns responses for Smile_entity routes.
 */
class smile_entityController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * The date formatter.
   *
   * @var \Drupal\Core\Datetime\DateFormatter
   */
  protected $dateFormatter;

  /**
   * The renderer.
   *
   * @var \Drupal\Core\Render\Renderer
   */
  protected $renderer;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->dateFormatter = $container->get('date.formatter');
    $instance->renderer = $container->get('renderer');
    return $instance;
  }

  /**
   * Displays a Smile_entity revision.
   *
   * @param int $smile_entity_revision
   *   The Smile_entity revision ID.
   *
   * @return array
   *   An array suitable for drupal_render().
   */
  public function revisionShow($smile_entity_revision) {
    $smile_entity = $this->entityTypeManager()->getStorage('smile_entity')
      ->loadRevision($smile_entity_revision);
    $view_builder = $this->entityTypeManager()->getViewBuilder('smile_entity');

    return $view_builder->view($smile_entity);
  }

  /**
   * Page title callback for a Smile_entity revision.
   *
   * @param int $smile_entity_revision
   *   The Smile_entity revision ID.
   *
   * @return string
   *   The page title.
   */
  public function revisionPageTitle($smile_entity_revision) {
    $smile_entity = $this->entityTypeManager()->getStorage('smile_entity')
      ->loadRevision($smile_entity_revision);
    return $this->t('Revision of %title from %date', [
      '%title' => $smile_entity->label(),
      '%date' => $this->dateFormatter->format($smile_entity->getRevisionCreationTime()),
    ]);
  }

  /**
   * Generates an overview table of older revisions of a Smile_entity.
   *
   * @param \Drupal\smile_entity\Entity\smile_entityInterface $smile_entity
   *   A Smile_entity object.
   *
   * @return array
   *   An array as expected by drupal_render().
   */
  public function revisionOverview(smile_entityInterface $smile_entity) {
    $account = $this->currentUser();
    $smile_entity_storage = $this->entityTypeManager()->getStorage('smile_entity');

    $langcode = $smile_entity->language()->getId();
    $langname = $smile_entity->language()->getName();
    $languages = $smile_entity->getTranslationLanguages();
    $has_translations = (count($languages) > 1);
    $build['#title'] = $has_translations ? $this->t('@langname revisions for %title', ['@langname' => $langname, '%title' => $smile_entity->label()]) : $this->t('Revisions for %title', ['%title' => $smile_entity->label()]);

    $header = [$this->t('Revision'), $this->t('Operations')];
    $revert_permission = (($account->hasPermission("revert all smile_entity revisions") || $account->hasPermission('administer smile_entity entities')));
    $delete_permission = (($account->hasPermission("delete all smile_entity revisions") || $account->hasPermission('administer smile_entity entities')));

    $rows = [];

    $vids = $smile_entity_storage->revisionIds($smile_entity);

    $latest_revision = TRUE;

    foreach (array_reverse($vids) as $vid) {
      /** @var \Drupal\smile_entity\smile_entityInterface $revision */
      $revision = $smile_entity_storage->loadRevision($vid);
      // Only show revisions that are affected by the language that is being
      // displayed.
      if ($revision->hasTranslation($langcode) && $revision->getTranslation($langcode)->isRevisionTranslationAffected()) {
        $username = [
          '#theme' => 'username',
          '#account' => $revision->getRevisionUser(),
        ];

        // Use revision link to link to revisions that are not active.
        $date = $this->dateFormatter->format($revision->getRevisionCreationTime(), 'short');
        if ($vid != $smile_entity->getRevisionId()) {
          $link = $this->l($date, new Url('entity.smile_entity.revision', [
            'smile_entity' => $smile_entity->id(),
            'smile_entity_revision' => $vid,
          ]));
        }
        else {
          $link = $smile_entity->link($date);
        }

        $row = [];
        $column = [
          'data' => [
            '#type' => 'inline_template',
            '#template' => '{% trans %}{{ date }} by {{ username }}{% endtrans %}{% if message %}<p class="revision-log">{{ message }}</p>{% endif %}',
            '#context' => [
              'date' => $link,
              'username' => $this->renderer->renderPlain($username),
              'message' => [
                '#markup' => $revision->getRevisionLogMessage(),
                '#allowed_tags' => Xss::getHtmlTagList(),
              ],
            ],
          ],
        ];
        $row[] = $column;

        if ($latest_revision) {
          $row[] = [
            'data' => [
              '#prefix' => '<em>',
              '#markup' => $this->t('Current revision'),
              '#suffix' => '</em>',
            ],
          ];
          foreach ($row as &$current) {
            $current['class'] = ['revision-current'];
          }
          $latest_revision = FALSE;
        }
        else {
          $links = [];
          if ($revert_permission) {
            $links['revert'] = [
              'title' => $this->t('Revert'),
              'url' => $has_translations ?
              Url::fromRoute('entity.smile_entity.translation_revert', [
                'smile_entity' => $smile_entity->id(),
                'smile_entity_revision' => $vid,
                'langcode' => $langcode,
              ]) :
              Url::fromRoute('entity.smile_entity.revision_revert', [
                'smile_entity' => $smile_entity->id(),
                'smile_entity_revision' => $vid,
              ]),
            ];
          }

          if ($delete_permission) {
            $links['delete'] = [
              'title' => $this->t('Delete'),
              'url' => Url::fromRoute('entity.smile_entity.revision_delete', [
                'smile_entity' => $smile_entity->id(),
                'smile_entity_revision' => $vid,
              ]),
            ];
          }

          $row[] = [
            'data' => [
              '#type' => 'operations',
              '#links' => $links,
            ],
          ];
        }

        $rows[] = $row;
      }
    }

    $build['smile_entity_revisions_table'] = [
      '#theme' => 'table',
      '#rows' => $rows,
      '#header' => $header,
    ];

    return $build;
  }

}
