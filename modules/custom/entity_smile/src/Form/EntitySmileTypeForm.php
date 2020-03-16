<?php

namespace Drupal\entity_smile\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class EntitySmileTypeForm.
 */
class EntitySmileTypeForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $entity_smile_type = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $entity_smile_type->label(),
      '#description' => $this->t("Label for the entity smile type."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $entity_smile_type->id(),
      '#machine_name' => [
        'exists' => '\Drupal\entity_smile\Entity\EntitySmileType::load',
      ],
      '#disabled' => !$entity_smile_type->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity_smile_type = $this->entity;
    $status = $entity_smile_type->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label entity smile type.', [
          '%label' => $entity_smile_type->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label entity smile type.', [
          '%label' => $entity_smile_type->label(),
        ]));
    }
    $form_state->setRedirectUrl($entity_smile_type->toUrl('collection'));
  }

}
