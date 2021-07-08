<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\Response;

class Genres extends ResourceController {

	protected $modelName = 'App\Models\GenreModel';
	protected $format    = 'json';
	protected $helpers   = ['date'];

	private static $validation_rules = array(
		'name' => 'required|min_length[4]',
	);

	/**
	 * GET /genres
	 */
	public function index() {
		return $this->respond($this->model->findAll());
	}

	/**
	 * GET /genres/$id
	 */
	public function show($id = NULL) {
		$genre = $this->model->find($id);
		if (!$genre) {
			return $this->failNotFound('No genre found with id ' . $id);
		}
		return $this->respond($genre);
	}

	/**
	 * POST /genres
	 */
	public function create() {
		if (!$this->validate(Genres::$validation_rules)) {
			return $this->failValidationErrors(
				$this->validator->getErrors(),
				Response::HTTP_BAD_REQUEST);
		}
		$data = [
			'name' => $this->request->getVar('name'),
			'created_at' => get_current_datetime(),
			'updated_at' => get_current_datetime(),
		];
		try {
			$genre_id = $this->model->insert($data);
		} catch (\Exception $e) {
			//TODO could be a different exception than 'duplicated entry'.
			//TODO search for a better error response handle according the exception.
			return $this->failResourceExists($e->getMessage());
		}
		return $this->respondCreated([
			'genre_id' => $genre_id
		]);
	}

	/**
	 * PUT /genres/$id
	 */
	public function update($id = NULL) {
		if (!$this->validate(Genres::$validation_rules)) {
			return $this->failValidationErrors(
				$this->validator->getErrors(),
				Response::HTTP_BAD_REQUEST);
		}
		if (!$this->model->find($id)) {
			return $this->failNotFound('No genre found with id ' . $id);
		}
		$data = [
			'name' => $this->request->getVar('name'),
			'updated_at' => get_current_datetime(),
		];
		log_message('info', 'name=' . $data['name'] . ' updated_at=' . $data['updated_at']);
		if (!$this->model->update($id, $data)) {
			//TODO already not tested, must add a unit test
			return $this->failServerError();
		}
		return $this->respond($this->model->find($id), Response::HTTP_OK);
	}

	/**
	 * DELETE /genres/$id
	 */
	public function delete($id = NULL) {
		if (!$this->model->find($id)) {
			return $this->failNotFound('No genre found with id ' . $id);
		}
		if (!$this->model->delete($id)) {
			//TODO already not tested, must add a unit test
			return $this->failServerError();
		}
		return $this->respondNoContent();
	}

	/**
	 * POST /genres/bulk
	 */
	public function createBulk() {
		$file = $this->request->getFile('genres_list');
		$handle = fopen($file, "r");
		$data = array();
		while ($row = fgetcsv($handle, 10000, ",")) {
			if (sizeof($row) != 2 || !is_numeric($row[0])) {
				continue;
			}
			$genre = [
				'name' => $row[1],
				'created_at' => get_current_datetime(),
				'updated_at' => get_current_datetime(),
			];
			array_push($data, $genre);
			log_message('debug', "createBulk - name={name}, created_at={created_at}, updated_at={updated_at}", $genre);
		}
		if (sizeof($data) == 0) {
			return $this->fail('Please specify the data in the right format: id,name', Response::HTTP_BAD_REQUEST);
		}
		$num_inserts = $this->model->insertBatch($data);
		return $this->respondCreated([
			'num_inserts' => $num_inserts,
		]);
	}

}
