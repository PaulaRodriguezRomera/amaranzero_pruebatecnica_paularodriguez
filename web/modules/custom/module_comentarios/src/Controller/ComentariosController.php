<?php

namespace Drupal\module_comentarios\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * This is the Comments controller.
 */
class ComentariosController extends ControllerBase {

  public function commentsList() {

    $comentarios = [
      ['name' => 'Muy buen producto'],
      ['name'  => 'Lo recomiendo'],
      ['name'  => 'No lo recomiendo'],
      ['name'  => 'Muy contento con el resultado'],
      ['name'  => 'Sin ninguna duda lo volveria a comprar'],
      ['name'  => 'Gracias por el servicio, muy atentos!'],
    ];

    return [
      '#theme' => 'comments_list',
      '#items' => $comentarios,
      '#title' => $this->t('Listado de comentarios')
    ];
  }
}
