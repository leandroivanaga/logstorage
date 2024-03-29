<?php

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorageFileTable extends Migration
{
    public function up(): void
    {
        Schema::create('storage_file', function (Blueprint $table) {
            $table->id();
            $table->string('pid');
            $table->string('disk');
            $table->string('file_identifier');
            $table->string('file_name');
            $table->string('extension');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('storage_file');
    }
}
