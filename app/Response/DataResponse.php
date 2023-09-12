<?php

namespace App\Response;

trait DataResponse {

  use ResponseService;

  private mixed $data;
  private bool $success;

  public function __construct() {}

  public function setData(mixed $data) {
    $this->data = $data;
    return $this;
  }

  public function setSuccess(bool $success) {
    $this->success = $success;
    return $this;
  }

  public function response() {
    if ($this->success) {
      return $this->responseSuccess($this->data);
    } else {
      return $this->responseFailed($this->data);
    }
  }
}
