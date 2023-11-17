<?php

namespace Drupal\module_comentarios\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Block para filtrar comentarios.
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
  public function build() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Resultado del número de comentarios.'),
    ];
  }

}
