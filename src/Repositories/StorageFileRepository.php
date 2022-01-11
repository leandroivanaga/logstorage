<?php

namespace Logcomex\LogStorage\Repositories;

use Illuminate\Support\Collection;
use Logcomex\LogStorage\Dtos\StorageFileDto;
use Logcomex\LogStorage\Entities\StorageFile;

class StorageFileRepository
{
    public static function createFile(StorageFileDto $storageFileDto): StorageFile
    {
        return StorageFile::query()
            ->create($storageFileDto->getFileData());
    }

    public static function getFilesByPid(string $pid): Collection
    {
        return StorageFile::query()
            ->wherePid($pid)
            ->get();
    }
}
