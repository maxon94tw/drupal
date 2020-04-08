<?php

namespace Drupal\entity_smile\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Cache\Cache;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Session\AccountProxyInterface;

/**
 * @Block(
 *   id = "entity_smile_block",
 *   admin_label = @Translation("Block with cache per roles"),
 *   category = @Translation("Custom"),
 * )
 */



class EntitySmileBlock extends BlockBase implements BlockPluginInterface
{

  /**
   * {@inheritDoc}
   */
  public function build()
  {
    return [
      '#markup' => $this->t('Custom block with catche per user roles'),
      '#cache' => [
        'tags' => $this->getCacheTags(),
        'contexts' => ['user.roles'],
      ],
    ];
  }
}



//  /**
//   * {@inheritDoc}
//   */
//  public function build() {
//    $build = array();
//    //if node is found from routeMatch create a markup with node ID's.
//    if ($node = \Drupal::routeMatch()->getParameter('node')) {
//      $build['node_id'] = [
//        '#markup' => '<p>' . $node->id() . '<p>',
//      ];
//    }
//    return $build;
//  }
//
//  public function getCacheTags() {
//    //With this when your node change your block will rebuild
//    if ($node = \Drupal::routeMatch()->getParameter('node')) {
//      //if there is node add its cachetag
//      return Cache::mergeTags(parent::getCacheTags(), ['node:' . $node->id())];
//    } else {
//      //Return default tags instead.
//      return parent::getCacheTags();
//    }
//  }
//
//  public function getCacheContexts() {
//    //if you depends on \Drupal::routeMatch()
//    //you must set context of this block with 'role' context tag.
//    //Every new route this block will rebuild
//    return Cache::mergeContexts(parent::getCacheContexts(), [user.roles]);
//  }
//}


//  /**
//   * {@inheritDoc}
//   */
//  public function getCacheTags()
//  {
//    return Cache::mergeTags(parent::getCacheTags(), ['entity_smile_block:uid:' . $this->currentUser->id()]);
//  }
//
//  /**
//   * {@inheritDoc}
//   */
//
//  public function getCacheContexts()
//  {
//    return Cache::mergeContexts(parent::getCacheContexts(), ['user.roles]);
//  }
//}
