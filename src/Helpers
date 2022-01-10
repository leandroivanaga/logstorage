<?php

namespace App\Helpers\Storage;

use App\Dtos\FileDto;
use App\Entities\File\File;
use App\Helpers\PIDHelper;
use App\Repositories\File\FileRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class StorageHelper
{
    private const DEFAULT_STORAGE = 'default';
    private const FILE_NAME_FORMAT = '%s.%s';

    public static function saveInStorage(
        string $content,
        string $extension,
        ?string $disk = null,
        ?string $name = null,
    ): ?string {

        $disk = is_null($disk)
            ? config('filesystems.' . self::DEFAULT_STORAGE)
            : $disk;

        $fileName = is_null($name)
            ? sprintf(self::FILE_NAME_FORMAT, self::generateFileHashName(), $extension)
            : sprintf(self::FILE_NAME_FORMAT, $name, $extension);

        Storage::disk($disk)
            ->put($fileName, $content);

        self::saveInDatabase($disk, $fileName);

        return $fileName;
    }

    private static function generateFileHashName(): string
    {
        return sha1(time());
    }

    private static function saveInDatabase(string $disk, string $fileName): void
    {
        $fileDto = new FileDto();
        $fileDto->pid = PIDHelper::getPID();
        $fileDto->disk = $disk;
        $fileDto->fileName = $fileName;

        FileRepository::createFile($fileDto);
    }

    public static function getFromDatabaseByPid(string $pid): array
    {
        $files = FileRepository::getFilesByPid($pid);

        $return = [];
        $files->each(function (File $file) use (&$return) {
            $return[] = Url::route('download.file', ['file_name' => $file->file_name]);
        });

        return $return;
    }
}
