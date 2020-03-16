<?php

namespace Drupal\entity_smile;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of entity smile entities.
 *
 * @ingroup entity_smile
 */
class EntitySmileListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('entity smile ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var \Drupal\entity_smile\Entity\EntitySmile $entity */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.entity_smile.edit_form',
      ['entity_smile' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
