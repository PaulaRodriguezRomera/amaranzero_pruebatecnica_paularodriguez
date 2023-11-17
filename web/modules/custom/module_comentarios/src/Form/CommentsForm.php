<?php

namespace Drupal\module_comentarios\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Render\Element\Form;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * Custom Comments Form.
 */

class CommentsForm extends FormBase {

  /**
   * (@inheritdoc)
   */
  public function getformId() {
    return "module_comentarios_commentsform";
}

  /**
   * (@inheritdoc)
   */
public function buildForm(array $form, FormStateInterface $form_state) {
  $form['comments_select'] = [
    '#type' => 'select',
    '#title' => $this ->t('Selecciona una opción'),
    '#options' => [
      '1' => $this->t('Total de comentarios'),
      '2' => $this->t('Cinco últimos comentarios'),
      '3' => $this->t('Número total de palabras')
    ],
  ];
  return $form;
}

  /**
   * (@inheritdoc)
   */
public function submitForm(array &$form, FormStateInterface $form_state)
  {
    drupal_set_message('Submit form');
  }
}
