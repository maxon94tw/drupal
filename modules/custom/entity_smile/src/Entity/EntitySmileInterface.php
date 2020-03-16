<?php

namespace Drupal\entity_smile\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining entity smile entities.
 *
 * @ingroup entity_smile
 */
interface EntitySmileInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface, EntityOwnerInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the entity smile name.
   *
   * @return string
   *   Name of the entity smile.
   */
  public function getName();

  /**
   * Sets the entity smile name.
   *
   * @param string $name
   *   The entity smile name.
   *
   * @return \Drupal\entity_smile\Entity\EntitySmileInterface
   *   The called entity smile entity.
   */
  public function setName($name);

  /**
   * Gets the entity smile creation timestamp.
   *
   * @return int
   *   Creation timestamp of the entity smile.
   */
  public function getCreatedTime();

  /**
   * Sets the entity smile creation timestamp.
   *
   * @param int $timestamp
   *   The entity smile creation timestamp.
   *
   * @return \Drupal\entity_smile\Entity\EntitySmileInterface
   *   The called entity smile entity.
   */
  public function setCreatedTime($timestamp);

}
