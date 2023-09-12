<?php

namespace App\Repository;

use App\Response\DataResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AppRepository extends Model implements RepositoryInterface {

  use DataResponse;

  public function getAll() : array {
    $data = $this->get();
    return $this->setData($data)
      ->setSuccess(true)
      ->response();
  }

  public function getById(int $id): array {
    $data = $this->find($id);
    $success = true;
    if (!$data) {
      $success = false;
      $data = [
        'message' => 'Data consulted non-existent',
        'code' => 404
      ];
    }

    return $this->setData($data)
      ->setSuccess($success)
      ->response();
  }

  public function saveModel(Request $request): array {
    $success = false;
    try {
      $this::validateData($request);
      $data = $this::create($request->all());
      $success = true;
    } catch (ValidationException $e) {
      $errors = $e->validator->errors();
      $data = $errors->messages();
    } catch (\Exception $e) {
      $data = ['message' => $e->getMessage()];
    }

    return $this->setData($data)
      ->setSuccess($success)
      ->response();
  }

  public function updateModel(Request $request, int $id): array {
    $success = false;
    try {
      $this::validateData($request);
      $data = $this::find($id);
      if ($data) {
        $data->update($request->all());
        $success = true;
      } else {
        $data = [
          'message' => 'Element for update non-existent',
          'code' => 404
        ];
      }
    } catch (ValidationException $e) {
      $data = $e->validator->errors();
    } catch (\Exception $e) {
      $data = ['message' => $e->getMessage()];
    }

    return $this->setData($data)
      ->setSuccess($success)
      ->response();
  }

  public function deleteModel(int $id): array {
    $data = $this::find($id);
    $success = false;
    if ($data) {
      $result = $this::destroy($id);
      if ($result > 0) {
        $data = ['message' => 'Element removed'];
        $success = true;
      }
    } else {
      $data = [
        'message' => 'element for delete non-existent',
        'code' => 404
      ];
    }

    return $this->setData($data)
      ->setSuccess($success)
      ->response();
  }
}
