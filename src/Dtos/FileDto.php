<?php

namespace Logcomex\LogStorage\Dtos;

class FileDto
{
    public string $pid;
    public string $disk;
    public string $fileName;

    public function getFileData(): array
    {
        return [
            'pid' => $this->pid,
            'disk' => $this->disk,
            'file_name' => $this->fileName,
        ];
    }
}
