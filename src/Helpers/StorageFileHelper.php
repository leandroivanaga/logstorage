<?php

namespace Logcomex\LogStorage\Helpers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Logcomex\LogStorage\Dtos\StorageFileDto;
use Logcomex\LogStorage\Repositories\StorageFileRepository;

class StorageFileHelper
{
    private const DEFAULT_STORAGE = 'default';
    private const FILE_NAME_FORMAT = '%s.%s';

    public static function saveInStorage(StorageFileDto $storageFileDto): ?string
    {
        $storageFileDto->disk = is_null($storageFileDto->disk)
            ? config('filesystems.' . self::DEFAULT_STORAGE)
            : $storageFileDto->disk;

        $storageFileDto->fileName = is_null($storageFileDto->fileName)
            ? sprintf(self::FILE_NAME_FORMAT, self::generateFileHashName(), $storageFileDto->extension)
            : sprintf(self::FILE_NAME_FORMAT, $storageFileDto->fileName, $storageFileDto->extension);

        Storage::disk($storageFileDto->disk)
            ->put($storageFileDto->fileName, $storageFileDto->content);

        self::saveInDatabase($storageFileDto);

        return $storageFileDto->fileName;
    }

    private static function generateFileHashName(): string
    {
        return sha1(time());
    }

    private static function saveInDatabase(StorageFileDto $storageFileDto): void
    {
        StorageFileRepository::createFile($storageFileDto);
    }

    public static function getFromDatabaseByPid(string $pid): Collection
    {
        return StorageFileRepository::getFilesByPid($pid);
    }
}
