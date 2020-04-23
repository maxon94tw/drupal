<?php

namespace Drupal\search_api_solr_multilingual\Entity;

/**
 * Defines the SolrFieldType entity.
 *
 * @ConfigEntityType(
 *   id = "solr_field_type",
 *   label = @Translation("Solr Field Type"),
 *   handlers = {
 *     "list_builder" = "Drupal\search_api_solr\Controller\SolrFieldTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\search_api_solr\Form\SolrFieldTypeForm",
 *       "edit" = "Drupal\search_api_solr\Form\SolrFieldTypeForm",
 *       "delete" = "Drupal\search_api_solr\Form\SolrFieldTypeDeleteForm",
 *       "export" = "Drupal\search_api_solr\Form\SolrFieldTypeExportForm"
 *     }
 *   },
 *   config_prefix = "solr_field_type",
 *   admin_permission = "administer search_api",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "edit-form" = "/admin/config/search/search-api/solr_field_type/{solr_field_type}",
 *     "delete-form" = "/admin/config/search/search-api/solr_field_type/{solr_field_type}/delete",
 *     "export-form" = "/admin/config/search/search-api/solr_field_type/{solr_field_type}/export",
 *     "collection" = "/admin/config/search/search-api/server/{search_api_server}/solr_field_type"
 *   }
 * )
 *
 * @deprecated use Drupal\search_api_solr\Entity\SolrFieldType
 */
class SolrFieldType extends \Drupal\search_api_solr\Entity\SolrFieldType {
}
