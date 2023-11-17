<?php

namespace Drupal\module_comentarios\Controller;

/**
 * This is the Comentarios controller.
 */
class ComentariosController {

  public function commentsList() {

    $comentarios = [
      ['descripcion' => 'Muy buen producto'],
      ['descripcion' => 'Lo recomiendo'],
      ['descripcion' => 'No lo recomiendo'],
      ['descripcion' => 'Muy contento con el resultado'],
      ['descripcion' => 'Sin ninguna duda lo volveria a comprar'],
      ['descripcion' => 'Gracias por el servicio, muy atentos!'],
    ];

    $ourComments = '';
    foreach ($comentarios as $comentario) {
      $ourComments .= '<li>' . $comentario['descripcion'] . '</li>';
    }
    return [
      '#type' => 'markup',
      '#markup' => '<ol>' . $ourComments . '</ol>'
    ];
  }
}
