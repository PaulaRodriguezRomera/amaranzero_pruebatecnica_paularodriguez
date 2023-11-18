<?php

namespace Drupal\module_comentarios\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;



/**
 * Block para métrica de comentarios.
 *
 * @Block(
 *   id = "module_comentarios",
 *   admin_label = @Translation ("Resultado del número de comentarios.")
 * )
 */
class ComentariosBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build(){
    $form = \Drupal::formBuilder()->getForm('Drupal\module_comentarios\Form\CommentsForm');

    return $form;

  }
}


