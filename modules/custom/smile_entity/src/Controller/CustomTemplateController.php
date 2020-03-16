<?php

///**
//* @file
//* Contains \Drupal\smile_entity\Controller\CustomTemplateController.
//*/
//
//namespace Drupal\smile_entity\Controller;
//
//use Drupal\Core\Controller\ControllerBase;
//
//class CustomTemplateController extends ControllerBase {
//public function content() {
//
//return [
//'#theme' => 'smile_entity',
//'#elements' => $this->t('Test Value'),
//];
//
//}
//}


/**
 * @file
 * Contains \Drupal\smile_entity\Controller\CustomTemplateController.
 */

namespace Drupal\smile_entity\Controller;

use Drupal\Core\Controller\ControllerBase;

class CustomTemplateController extends ControllerBase {
  public function content() {

    return [
      '#theme' => 'smile_entity',
      '#test_var' => $this->t('Test Value'),
    ];

  }
}
