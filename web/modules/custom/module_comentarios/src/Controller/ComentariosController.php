<?php

namespace Drupal\module_comentarios\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;

/**
 * This is the Comments controller.
 */
class ComentariosController extends ControllerBase {

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

    public function getFiveComments(){
      $query = \Drupal::database();
      $result = $query->select('comment_field_data', 'comments')
        ->fields ('comments', ['subject', 'entity_type','field_name'])
        ->orderBy('comments.created', 'DESC')
        ->RANGE(0,5)
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
        '#title' => 'Últimos cinco comentarios'
      ];

    }

    public function totalNumberWords() {

      $query = \Drupal::database();
      $result = $query->select('comment__comment_body', 'comment')
        ->fields ('comment', ['comment_body_value'])
        ->execute()->fetchall(\PDO::FETCH_OBJ);

      $data = [];
      $totalWords = 0;

      foreach($result as $row) {
        $comment_body = $row->comment_body_value;
        $word_count = str_word_count(strip_tags($comment_body));

        $totalWords += $word_count;

        $data[] = [
          'comment_body_value' => $comment_body,
          'value_words' => $word_count,
        ];
      }

      $data[] = [
        'comment_body_value' => 'Total:',
        'value_words' => $totalWords,
      ];

      $header = array('Comentarios', 'Total Palabras');

      $build['table'] = [
        '#type' =>'table',
        '#header' => $header,
        '#rows' => $data,
      ];

      return [
        $build,
        '#title' => 'Número total de palabras'
      ];

    }
}
