<?php

namespace Drupal\entity_smile;

use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\entity_smile\Entity\EntitySmile;


/**
 * Provides dynamic permissions for entity smile of different types.
 *
 * @ingroup entity_smile
 *
 */
class EntitySmilePermissions{

  use StringTranslationTrait;

  /**
   * Returns an array of node type permissions.
   *
   * @return array
   *   The EntitySmile by bundle permissions.
   *   @see \Drupal\user\PermissionHandlerInterface::getPermissions()
   */
  public function generatePermissions() {
    $perms = [];

    foreach (EntitySmile::loadMultiple() as $type) {
      $perms += $this->buildPermissions($type);
    }

    return $perms;
  }

  /**
   * Returns a list of node permissions for a given node type.
   *
   * @param \Drupal\entity_smile\Entity\EntitySmile $type
   *   The EntitySmile type.
   *
   * @return array
   *   An associative array of permission names and descriptions.
   */
  protected function buildPermissions(EntitySmile $type) {
    $type_id = $type->id();
    $type_params = ['%type_name' => $type->label()];

    return [
      "$type_id create entities" => [
        'title' => $this->t('Create new %type_name entities', $type_params),
      ],
      "$type_id edit own entities" => [
        'title' => $this->t('Edit own %type_name entities', $type_params),
      ],
      "$type_id edit any entities" => [
        'title' => $this->t('Edit any %type_name entities', $type_params),
      ],
      "$type_id delete own entities" => [
        'title' => $this->t('Delete own %type_name entities', $type_params),
      ],
      "$type_id delete any entities" => [
        'title' => $this->t('Delete any %type_name entities', $type_params),
      ],
    ];
  }

}
