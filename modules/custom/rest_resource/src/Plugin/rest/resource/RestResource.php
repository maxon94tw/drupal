<?php

namespace Drupal\rest_resource\Plugin\rest\resource;

use Drupal\Core\Database\Database;
use Drupal\rest\ModifiedResourceResponse;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Provides a resource to get view modes by entity and bundle.
 *
 * @RestResource(
 *   id = "rest_resource",
 *   label = @Translation("Rest resource"),
 *   uri_paths = {
 *     "canonical" = "/http://docker4drupal.localhost/rest"
 *   }
 * )
 */
class RestResource extends ResourceBase {

  /**
   * A current user instance.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $instance = parent::create($container, $configuration, $plugin_id, $plugin_definition);
    $instance->logger = $container->get('logger.factory')->get('rest_resource');
    $instance->currentUser = $container->get('current_user');
    return $instance;
  }

    /**
     * Responds to GET requests.
     *
     * @param string $payload
     *
     * @return \Drupal\rest\ResourceResponse
     *   The HTTP response object.
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     *   Throws exception expected.
     */
    public function get($id = NULL) {

      if ($id) {
        $record = Database::getConnection()->query("SELECT * FROM {pets_owners_storage} WHERE id = :id", [':id' => $id])
          ->fetchAssoc();
        if (!empty($record)) {
          return new ResourceResponse($record);
        }

        throw new NotFoundHttpException(t('Log entry with ID @id was not found', ['@id' => $id]));
      }

      throw new BadRequestHttpException(t('No log entry ID was provided'));

    }

    public function post() {

    }

    public function delete() {

    }

}
