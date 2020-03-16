<?php

namespace Drupal\smile_entity\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Smile_entity entities.
 */
class smile_entityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}
