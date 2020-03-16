<?php

namespace Drupal\smile_entity;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Smile_entity entity.
 *
 * @see \Drupal\smile_entity\Entity\smile_entity.
 */
class smile_entityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\smile_entity\Entity\smile_entityInterface $entity */
    if (in_array($entity->get('role')->getString(), $account->getRoles())) {
      switch ($operation) {

        case 'view':

          if (!$entity->isPublished()) {
            return AccessResult::allowedIfHasPermission($account, 'view unpublished smile_entity entities');
          }


          return AccessResult::allowedIfHasPermission($account, 'view published smile_entity entities');

        case 'update':

          return AccessResult::allowedIfHasPermission($account, 'edit smile_entity entities');

        case 'delete':

          return AccessResult::allowedIfHasPermission($account, 'delete smile_entity entities');
      }

      // Unknown operation, no opinion.
      return AccessResult::neutral();
    }
    return AccessResult::forbidden();
  }


  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add smile_entity entities');
  }


}
