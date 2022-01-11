<?php

namespace Logcomex\LogStorage\Repositories;

use App\Dtos\FileDto;
use App\Entities\File\File;
use Illuminate\Database\Eloquent\Collection;

class StorageFileRepository
{
    public static function createFile(FileDto $fileDto): File
    {
        return File::query()
            ->create($fileDto->getFileData());
    }

    public static function getFilesByPid(string $pid): Collection
    {
        return File::query()
            ->wherePid($pid)
            ->get();
    }
}
