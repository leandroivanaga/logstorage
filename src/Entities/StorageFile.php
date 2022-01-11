<?php

namespace Logcomex\LogStorage\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Logcomex\LogStorage\Entities\StorageFile
 *
 * @property int $id
 * @property string $pid
 * @property string $disk
 * @property string $file_identifier
 * @property string $file_name
 * @property string $extension
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|StorageFile wherePid($value)
 * @method static Builder|StorageFile whereFileIdentifier($value)
 * @method static Builder|StorageFile whereFileName($value)
 * @method static Builder|StorageFile whereExtension($value)
 * @method static Builder|StorageFile whereDisk($value)
 * @method static Builder|StorageFile query()
 */

class StorageFile extends Model
{
    protected $table = 'storage_file';

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'pid',
        'disk',
        'file_name',
        'file_identifier',
        'extension',
    ];
}
