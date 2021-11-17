<?php

namespace App\Controller;

use App\Exception\FileFormatIsNotSupported;
use App\Service\ConfigurationProvider;
use App\Service\Contract\FileHydratorProviderInterface;
use App\Service\Contract\FileProcessorInterface;
use App\Validation\Contract\FileExtensionValidatorInterface;

class FileUploadController
{
    /** @var array */
    private array $configuration;

    /** @var FileProcessorInterface */
    private FileProcessorInterface $fileProcessor;

    /** @var FileExtensionValidatorInterface */
    private FileExtensionValidatorInterface $validator;

    /** @var FileHydratorProviderInterface */
    private FileHydratorProviderInterface $fileHydratorProvider;

    /**
     * @param FileProcessorInterface $fileProcessor
     * @param FileExtensionValidatorInterface $validator
     * @param FileHydratorProviderInterface $fileHydratorProvider
     */
    public function __construct(
        FileProcessorInterface $fileProcessor,
        FileExtensionValidatorInterface $validator,
        FileHydratorProviderInterface $fileHydratorProvider
    ) {
        $this->fileProcessor = $fileProcessor;
        $this->validator = $validator;
        $this->fileHydratorProvider = $fileHydratorProvider;
        $this->configuration = ConfigurationProvider::getConfiguration();

        $this->validator->setValidFormats($this->configuration['valid_formats']);
    }

    /**
     * @return void
     */
    public function index(): void
    {
        require_once '../Views/index.html';
    }

    /**
     * @param array $file
     * @throws FileFormatIsNotSupported
     */
    public function upload(array $file): void
    {
        $segments = explode('.', $file['name']);
        $extension = $segments[count($segments) - 1];
        $this->validator->validate($extension);
        $hydrator = $this->fileHydratorProvider->getHydrator($extension);
        $fileContent = $this->fileProcessor->getFileContent($file['tmp_name']);
        $users = $hydrator->hydrate($fileContent);

        require_once '../Views/users.php';
    }
}
