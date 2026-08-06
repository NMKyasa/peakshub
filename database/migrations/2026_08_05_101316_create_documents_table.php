<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();

            $table->string('title');

            $table->string('document_number', 100)
                ->nullable()
                ->unique();

            $table->text('description')
                ->nullable();

            $table->string('file_path', 500)
                ->nullable();

            $table->string('original_name')
                ->nullable();

            $table->string('mime_type', 150)
                ->nullable();

            $table->unsignedBigInteger('file_size')
                ->nullable();

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('documents');
    }
};
