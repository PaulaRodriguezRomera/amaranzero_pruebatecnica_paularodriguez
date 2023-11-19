<?php

namespace Drupal\module_comentarios\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Render\Element\Form;
use Drupal\module_comentarios\src\Controller\ComentariosController;
use Drupal\Core\Render\Element\Checkboxes;


/**
 * Custom Comments Form.
 */
class CommentsForm extends FormBase {

  /**
   * (@inheritdoc)
   */
  public function getFormId() {
    return "module_comentarios_commentsform_submit";
  }

  /**
   * (@inheritdoc)
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['options'] = [
      '#type' => 'radios',
      '#title' => $this->t('Selecciona una opción'),
      '#options' => [
        'option1' => $this->t('Número total de comentarios'),
        'option2' => $this->t('Últimos cinco comentarios'),
        'option3' => $this->t('Número total de palabras'),
      ],
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#submit' => ['::customSubmitHandler'],
    ];

    return $form;
  }

  /**
   * (@inheritdoc)
   */
  public function customSubmitHandler(array &$form, FormStateInterface $form_state) {
    $selected_option = $form_state->getValue('options');

    drupal_set_message('Selected option: ' . $selected_option);

    if ($selected_option === 'option1') {
      $form_state->setRedirectUrl(\Drupal\Core\Url::fromRoute('module_comentarios.getCommentList'));
    } elseif ($selected_option === 'option2') {
      $form_state->setRedirectUrl(\Drupal\Core\Url::fromRoute('module_comentarios.getFiveComments'));
    } elseif ($selected_option === 'option3') {
      $form_state->setRedirectUrl(\Drupal\Core\Url::fromRoute('module_comentarios.totalNumberWords'));
    }
  }

  /**
   * (@inheritdoc)
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Empty implementation, as it's not needed for this form.
  }
}
