<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Trainer extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_trainer'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'jenis_kelamin' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'create_at' => [
				'type' => 'DATETIME',
				'null' => true
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true
			]
		]);
		$this->forge->addKey('id_trainer', true);
		$this->forge->createTable('trainer');
	}

	public function down()
	{
		$this->forge->dropTable('trainer');
	}
}
