<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGenresTable extends Migration {

	public function up() {
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'name' => [
				'type'       => 'VARCHAR',
				'constraint' => '64',
				'null'       => false,
				'unique'     => true
			],
			'created_at DATETIME DEFAULT current_timestamp',
			'updated_at DATETIME DEFAULT current_timestamp ON UPDATE current_timestamp',
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('genres');
	}

	public function down() {
		$this->forge->dropTable('genres');
	}

}
