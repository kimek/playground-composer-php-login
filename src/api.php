<?php
require '../vendor/autoload.php';

use Kimek\UserRegistration\Controllers\FileUploader;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use Kimek\UserRegistration\Controllers\UserController;
use Kimek\UserRegistration\Repositories\EloquentUserRepository;

try {
	Kimek\UserRegistration\Repositories\Database::connect();
} catch (Exception $e) {
	die('Something go wrong');
}

$request = ServerRequestFactory::fromGlobals(
	$_SERVER,
	$_GET,
	$_POST,
	$_COOKIE,
	$_FILES
);


$userRepository = new EloquentUserRepository();
$userController = new UserController($userRepository);
$fileController = new FileUploader(__DIR__ . '/uploads');


//todo set response
$response = null;
// TODO - refactor to handle request by form action
$data = $request->getParsedBody();

if (isset($data['action'])) {
	switch ($data['action']) {
		case 'login':
			$response = $userController->login($request);
			break;
		case 'register':
			$response = $userController->register($request);
			break;
		case 'file':
			// TODO refactor to class, add response
			if ($fileController->upload('file')) {
				echo $fileController->getUploadStatusMessage(true);
			} else {
				echo $fileController->getUploadStatusMessage(false);
			}
			break;
	}
}

$emitter = new SapiEmitter();
$emitter->emit($response);
