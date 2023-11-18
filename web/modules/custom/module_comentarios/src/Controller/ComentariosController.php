<?php

namespace Drupal\module_comentarios\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;

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

  public function getCommentList(){

    $query = \Drupal::database();
    $result = $query->select('comment_field_data', 'comments')
            ->fields ('comments', ['subject', 'entity_type','field_name'])
            ->execute()->fetchall(\PDO::FETCH_OBJ);
    $data = [];

    foreach($result as $row) {
      $data[] = [
        'subject' => $row->subject,
        'entity_type' => $row->entity_type,
        'field_name' => $row->field_name,
      ];
    }

      $header = array('Subject', 'Entity type', 'Field name');

      $build['table'] = [
        '#type' =>'table',
        '#header' => $header,
        '#rows' => $data
      ];

      return [
        $build,
        '#title' => 'Lista de comentarios'
      ];
    }
}
