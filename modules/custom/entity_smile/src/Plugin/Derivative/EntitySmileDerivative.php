<?php

/**
 * @file
 * Contains \Drupal\entity_smile\Plugin\Derivative\EntitySmileDerivative.
 */

namespace Drupal\entity_smile\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Plugin\Discovery\ContainerDeriverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides block plugin definitions for nodes.
 *
 * @see \Drupal\entity_smile\Plugin\Derivative\EntitySmileDerivative
 */
class EntitySmileDerivative extends DeriverBase implements ContainerDeriverInterface {

  /**
   * The node storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $nodeStorage;

  /**
   * Constructs new NodeBlock.
   *
   * @param \Drupal\Core\Entity\EntityStorageInterface $node_storage
   *   The node storage.
   */
  public function __construct(EntityStorageInterface $node_storage) {
    $this->nodeStorage = $node_storage;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, $base_plugin_id) {
    return new static(
      $container->get('entity.manager')->getStorage('role')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {
    $roles = $this->entityManager->getStorage('user_role')->loadMultiple();
    foreach ($roles as $role) {
      $this->derivatives[$role->id()] = $base_plugin_definition;
      $this->derivatives[$role->id()]['admin_label'] = t('Role of the block: ') . $role->label();
    }
    return $this->derivatives;
  }
}
