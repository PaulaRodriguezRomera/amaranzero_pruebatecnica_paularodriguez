<?php

namespace Drupal\module_comentarios\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * This is the Comments controller.
 */
class ComentariosController extends ControllerBase {

  public function comments_list() {

    $comentarios = [
      ['descripcion' => 'Muy buen producto'],
      ['descripcion' => 'Lo recomiendo'],
      ['descripcion' => 'No lo recomiendo'],
      ['descripcion' => 'Muy contento con el resultado'],
      ['descripcion' => 'Sin ninguna duda lo volveria a comprar'],
      ['descripcion' => 'Gracias por el servicio, muy atentos!'],
    ];

    return [
      '#theme' => 'comments_list',
      '#items' => $comentarios,
      '#title' => $this->t('Listado de comentarios'),
    ];
  }
}
