<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GenreSeeder extends Seeder {

	public function run() {
		$data = [
			[
				'name' => "Action"
			],
			[
				'name' => "Platformer"
			],
			[
				'name' => "Shooter"
			],
			[
				'name' => "Fighting"
			],
			[
				'name' => "Beat'em up"
			],
			[
				'name' => "Stealth"
			],
			[
				'name' => "Survival"
			],
			[
				'name' => "Rhythm"
			],
			[
				'name' => "Action-adventure"
			],
			[
				'name' => "Survival horror"
			],
			[
				'name' => "Metroidvania"
			],
			[
				'name' => "Adventures"
			],
			[
				'name' => "Text adventures"
			],
			[
				'name' => "Graphic adventures"
			],
			[
				'name' => "Visual novels"
			],
			[
				'name' => "Sandbox"
			],
			[
				'name' => "Open world"
			],
			[
				'name' => "Role-playing (RPG)"
			],
			[
				'name' => "Action RPG"
			],
			[
				'name' => "Massively multiplayer online role-playing (MMORPG)"
			],
			[
				'name' => "Roguelike"
			],
			[
				'name' => "Tactical RPG"
			],
			[
				'name' => "Simulation"
			],
			[
				'name' => "Real-time strategy (RTS)"
			],
			[
				'name' => "Real-time tactics (RTT)"
			],
			[
				'name' => "Multiplayer online battle arena (MOBA)"
			],
			[
				'name' => "Tower defense"
			],
			[
				'name' => "Turn-based strategy (TBS)"
			],
			[
				'name' => "Turn-based tactics (TBT)"
			],
			[
				'name' => "Battle royale"
			],
			[
				'name' => "Sports"
			],
			[
				'name' => "Racing"
			],
			[
				'name' => "Puzzle"
			],
			[
				'name' => "Trivia"
			],
			[
				'name' => "Cards"
			],
			[
				'name' => "Casual"
			],
			[
				'name' => "Party"
			],
			[
				'name' => "Massive multiplayer online (MMO)"
			],
			[
				'name' => "Educational"
			],
			[
				'name' => "Religion"
			]
		];

		$this->db->table('genres')->insertBatch($data);
	}

}
