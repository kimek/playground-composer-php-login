<?php
namespace Kimek\UserRegistration\Controllers;

use Illuminate\Database\QueryException;
use Laminas\Diactoros\Response\JsonResponse;
use League\OAuth2\Server\Entities\UserEntityInterface;
use Psr\Http\Message\ServerRequestInterface;

class UserController
{
	protected $userRepository;

	public function __construct(UserEntityInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function login(ServerRequestInterface $request): JsonResponse
	{
		$data = $request->getParsedBody();
		$username = $data['email'] ?? null;
		$password = $data['password'] ?? null;

		if (!$username || !$password) {
			return new JsonResponse(['error' => 'Invalid input'], 400);
		}

		$user = $this->userRepository->getUserEntityByUserCredentials($username, $password);

		if ($user) {
			return new JsonResponse(['message' => "Login successful!", 'user' => $user]);
		}

		return new JsonResponse(['error' => "Invalid email or password!"], 401);
	}

	public function register(ServerRequestInterface $request): JsonResponse
	{
		$data = $request->getParsedBody();
		$username = $data['email'] ?? null;
		$password = $data['password'] ?? null;

		if (!$username || !$password) {
			return new JsonResponse(['error' => 'Invalid input'], 400);
		}

		$password = password_hash($password, PASSWORD_BCRYPT);

		try {
			$user = $this->userRepository->setUserEntity($username, $password);

			if($user) {
				return new JsonResponse(['message' => "User created"]);
			}
		} catch (\Throwable $e) {
			if($e instanceof QueryException){
				$errorCode = $e->errorInfo[1];
				switch ($errorCode) {
					case 1062:
						return new JsonResponse([
							'errors'=>'Duplicate Entry'
						],404);
						break;
				}
			}
		}

		return new JsonResponse(['error' => "User not created"], 401);
	}
}
