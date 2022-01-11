<?php

namespace Logcomex\LogStorage\Dtos;

class StorageFileDto
{
    public string $pid;
    public string $fileIdentifier;
    public string $content;
    public string $extension;
    public ?string $fileName;
    public ?string $disk;

    public function getFileData(): array
    {
        return [
            'pid' => $this->pid,
            'disk' => $this->disk,
            'file_identifier' => $this->fileIdentifier,
            'file_name' => $this->fileName,
            'extension' => $this->extension,
        ];
    }
}
