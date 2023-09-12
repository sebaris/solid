<?php

namespace App\Repository;

use Illuminate\Http\Request;

interface RepositoryInterface {
  public function getAll(): array;
  public function getById(int $id) : array;
  public function saveModel(Request $request): array;
  public function updateModel(Request $request, int $id): array;
  public function deleteModel(int $id): array;
}
