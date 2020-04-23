<?php

namespace Drupal\search_api_solr_multilingual\Plugin\search_api\backend;

use Drupal\search_api_solr\Plugin\search_api\backend\SearchApiSolrBackend;

/**
 * @SearchApiBackend(
 *   id = "search_api_solr_multilingual_managed_schema",
 *   label = @Translation("Multilingual Solr Managed Schema (Experimental, don't use in production)."),
 *   description = @Translation("Deprecated and replaced by the unified Solr backend.")
 * )
 *
 * @deprecated replaced by the unified Solr backend
 */
class SearchApiSolrMultilingualManagedSchemaBackend extends SearchApiSolrBackend {
}
