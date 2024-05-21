<?php
namespace Kimek\UserRegistration\Repositories;

use Kimek\UserRegistration\Models\User;
use League\OAuth2\Server\Entities\UserEntityInterface;

class EloquentUserRepository implements UserEntityInterface
{
	public function getUserEntityByUserCredentials($username, $password)
	{
		$user = User::where('username', $username)->first();

		if (!$user || !password_verify($password, $user->password)) {
			return null;
		}

		return $user;
	}

	public function setUserEntity($username, $password)
	{
		$user = User::create([
			'username' => $username,
			'password' => $password
		]);

		if (!$user) {
			return false;
		}

		return true;
	}

	public function getIdentifier(): string {

	}
}