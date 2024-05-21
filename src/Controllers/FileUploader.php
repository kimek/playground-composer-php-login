<?php

namespace Kimek\UserRegistration\Controllers;

use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;

class FileUploader
{
	private Filesystem $filesystem;

	public function __construct(string $uploadPath)
	{
		$adapter = new LocalFilesystemAdapter($uploadPath);
		$this->filesystem = new Filesystem($adapter);
	}

	public function upload(string $fieldName): bool
	{
		if ($_FILES[$fieldName]['error'] !== UPLOAD_ERR_OK) {
			return false;
		}

		$filePath = $_FILES[$fieldName]['tmp_name'];
		$fileName = basename($_FILES[$fieldName]['name']);
		$stream = fopen($filePath, 'r+');

		$this->filesystem->writeStream($fileName, $stream);

		fclose($stream);

		return true;
	}

	public function getUploadStatusMessage(bool $success): string
	{
		return $success ? 'File uploaded successfully' : 'Failed to upload file';
	}
}
