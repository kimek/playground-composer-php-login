<?php

namespace Kimek\UserRegistration\Repositories;

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
	public static function connect()
	{
		$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
		$dotenv->load();

		if ($_SERVER['DB_HOST'] === false) {
			throw new \Exception('.env file is not loaded properly');
		}

		$db = new Capsule;
		$db->addConnection(require __DIR__ . '/../Config/database.php');
		$db->setAsGlobal();
		$db->bootEloquent();
	}
}