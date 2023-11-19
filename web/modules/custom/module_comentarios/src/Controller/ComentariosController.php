<?php

namespace Drupal\module_comentarios\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;
use mysql_xdevapi\Table;

/**
 * This is the Comments controller.
 */
class ComentariosController extends ControllerBase {

    public function getCommentList(){

      $query = \Drupal::database();
      $result = $query->select('comment__comment_body', 'comment')
        ->fields ('comment', ['comment_body_value'])
        ->execute()->fetchall(\PDO::FETCH_OBJ);

      $data = [];

      foreach($result as $row) {
        $data[] = [
          'comment_body_value' => $row->comment_body_value,
        ];
      }

      $header = array('Número total de comentarios');

      $build['table'] = [
        '#type' =>'table',
        '#header' => $header,
        '#rows' => $data
      ];

      return [
        $build,
        '#title' => 'Número total de comentarios'
      ];

    }

    public function getFiveComments(){

      $query = \Drupal::database();
      $result = $query->select('comment__comment_body', 'comment')
        ->fields ('comment', ['comment_body_value'])
        ->range(0,5)
        ->execute()->fetchall(\PDO::FETCH_OBJ);

      $data = [];

      foreach($result as $row) {
        $data[] = [
          'comment_body_value' => $row->comment_body_value,
        ];
      }

      $header = array('Últimos cinco comentarios');

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
