<?php

namespace Drupal\smile_entity;

use Drupal\Core\Entity\ContentEntityStorageInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\smile_entity\Entity\smile_entityInterface;

/**
 * Defines the storage handler class for Smile_entity entities.
 *
 * This extends the base storage class, adding required special handling for
 * Smile_entity entities.
 *
 * @ingroup smile_entity
 */
interface smile_entityStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Smile_entity revision IDs for a specific Smile_entity.
   *
   * @param \Drupal\smile_entity\Entity\smile_entityInterface $entity
   *   The Smile_entity entity.
   *
   * @return int[]
   *   Smile_entity revision IDs (in ascending order).
   */
  public function revisionIds(smile_entityInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Smile_entity author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Smile_entity revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\smile_entity\Entity\smile_entityInterface $entity
   *   The Smile_entity entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(smile_entityInterface $entity);

  /**
   * Unsets the language for all Smile_entity with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
