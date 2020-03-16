<?php

namespace Drupal\smile_entity;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
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
class smile_entityStorage extends SqlContentEntityStorage implements smile_entityStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(smile_entityInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {smile_entity_revision} WHERE id=:id ORDER BY vid',
      [':id' => $entity->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {smile_entity_field_revision} WHERE uid = :uid ORDER BY vid',
      [':uid' => $account->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(smile_entityInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {smile_entity_field_revision} WHERE id = :id AND default_langcode = 1', [':id' => $entity->id()])
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('smile_entity_revision')
      ->fields(['langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED])
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
