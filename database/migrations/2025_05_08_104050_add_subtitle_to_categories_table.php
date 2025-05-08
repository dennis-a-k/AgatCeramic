<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();
        Schema::enableForeignKeyConstraints();

        Schema::table('categories', function (Blueprint $table) {
            $table->string('subtitle')->after('title');
        });

        $categories = [
            ['title' => 'Керамогранит', 'subtitle' => 'Керамогранит'],
            ['title' => 'Плитка', 'subtitle' => 'Плитка'],
            ['title' => 'Мозаика', 'subtitle' => 'Мозаика'],
            ['title' => 'Клинкер', 'subtitle' => 'Клинкер'],
            ['title' => 'Ступени', 'subtitle' => 'Ступени'],
            ['title' => 'Сантехника', 'subtitle' => 'Сантехника'],
            ['title' => 'Клеевые смеси', 'subtitle' => 'Клей'],
            ['title' => 'Затирка для плитки', 'subtitle' => 'Затирка'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'title' => $category['title'],
                'subtitle' => $category['subtitle'],
                'slug' => Str::slug($category['title']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('subtitle');
        });

        DB::table('categories')->truncate();
    }
};
