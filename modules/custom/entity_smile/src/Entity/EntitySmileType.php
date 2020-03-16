<?php

namespace Drupal\entity_smile\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the entity smile type entity.
 *
 * @ConfigEntityType(
 *   id = "entity_smile_type",
 *   label = @Translation("entity smile type"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\entity_smile\EntitySmileTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\entity_smile\Form\EntitySmileTypeForm",
 *       "edit" = "Drupal\entity_smile\Form\EntitySmileTypeForm",
 *       "delete" = "Drupal\entity_smile\Form\EntitySmileTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\entity_smile\EntitySmileTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "entity_smile_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "entity_smile",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/entity_smile_type/{entity_smile_type}",
 *     "add-form" = "/admin/structure/entity_smile_type/add",
 *     "edit-form" = "/admin/structure/entity_smile_type/{entity_smile_type}/edit",
 *     "delete-form" = "/admin/structure/entity_smile_type/{entity_smile_type}/delete",
 *     "collection" = "/admin/structure/entity_smile_type"
 *   }
 * )
 */
class EntitySmileType extends ConfigEntityBundleBase implements EntitySmileTypeInterface {

  /**
   * The entity smile type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The entity smile type label.
   *
   * @var string
   */
  protected $label;

}
