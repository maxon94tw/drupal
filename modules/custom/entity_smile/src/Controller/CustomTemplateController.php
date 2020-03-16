<?php

///**
//* @file
//* Contains \Drupal\entity_smile\Controller\CustomTemplateController.
//*/
//
//namespace Drupal\entity_smile\Controller;
//
//use Drupal\Core\Controller\ControllerBase;
//
//class CustomTemplateController extends ControllerBase {
//public function content() {
//
//return [
//'#theme' => 'entity_smile',
//'#elements' => $this->t('Test Value'),
//];
//
//}
//}


/**
 * @file
 * Contains \Drupal\smile_entity\Controller\CustomTemplateController.
 */

namespace Drupal\entity_smile\Controller;

use Drupal\Core\Controller\ControllerBase;

class CustomTemplateController extends ControllerBase {
  public function content() {

    return [
      '#theme' => 'entity_smile',
      '#test_var' => $this->t('Test Value'),
    ];

  }
}
