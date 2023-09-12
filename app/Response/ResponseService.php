<?php

namespace App\Response;

trait ResponseService{

  public static function responseSuccess(mixed $data) {
    return [
      'success' => true,
      'data' => $data
    ];
  }

  public static function responseFailed(mixed $data) {
    return [
      'success' => false,
      'data' => [
        'errors' => $data
      ]
    ];
  }
}
