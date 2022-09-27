<?php

use App\Models\Category;
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
        Schema::create('tbl_book', function (Blueprint $table) {
            $table->id('BookID');
            $table->foreignIdFor(Category::class, 'CategoryID');
            $table->string('BookTitle')->unique();
            $table->string('BookISBN')->unique();
            $table->string('BookAuthor');
            $table->string('BookPublicationYear');
            $table->string('BookPublisher');
            $table->string('BookCopies');
            $table->string('IsActive')->default('yes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_book');
    }
};
