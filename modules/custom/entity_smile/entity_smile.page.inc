<?php

/**
 * @file
 * Contains entity_smile.page.inc.
 *
 * Page callback for entity smile entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for entity smile templates.
 *
 * Default template: entity_smile.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_entity_smile(array &$variables) {
  // Fetch EntitySmile Entity Object.
  $entity_smile = $variables['elements']['#entity_smile'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
