<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @param  Office  $users
	 * @return void
	 */
	public function __construct(protected Office $office)
	{}

	/**
	 * Display a listing of the offices
	 *
	 * @return \Iluminate\Http\Response
	 */
	public function index() {
		return $this->office->getAll();
	}

	/**
	 * Display the specified office.
	 *
	 * @param int $id: Identification of office
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show(int $id) {
		return $this->office->getById($id);
	}

	/**
	 * Store a newly created office in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		return $this->office->saveModel($request);
	}

	/**
	 * Update the specified office in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		return $this->office->updateModel($request, $id);
	}

	/**
	 * Remove the specified office from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		return $this->office->deleteModel($id);
	}

}
