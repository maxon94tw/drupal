<?php

/**
 * @file
 * Contains smile_entity.page.inc.
 *
 * Page callback for Smile_entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Smile_entity templates.
 *
 * Default template: smile_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_smile_entity(array &$variables) {
  // Fetch smile_entity Entity Object.
  $smile_entity = $variables['elements']['#smile_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
