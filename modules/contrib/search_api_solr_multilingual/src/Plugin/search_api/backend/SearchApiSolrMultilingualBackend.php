<?php

namespace Drupal\search_api_solr_multilingual\Plugin\search_api\backend;

use Drupal\search_api_solr\Plugin\search_api\backend\SearchApiSolrBackend;

/**
 * @SearchApiBackend(
 *   id = "search_api_solr_multilingual",
 *   label = @Translation("Multilingual Solr"),
 *   description = @Translation("Deprecated and replaced by the unified Solr backend.")
 * )
 *
 * @deprecated replaced by the unified Solr backend
 */
class SearchApiSolrMultilingualBackend extends SearchApiSolrBackend {
}
