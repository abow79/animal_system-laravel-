<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Animal2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal2', function (Blueprint $table) {		//第一個參數'animal2'是資料表名稱,創了一個新的migrate file來指定animal2的table structure
            $table->id();
            $table->string('type')->nullable;                       //有別於animals,這邊是用type而非type_id
            $table->string('name');
            $table->date('birthday')->nullable;
            $table->string('area')->nullable; 
            $table->boolean('fix')->default(false);
            $table->text('description')->nullable;
            $table->text('personality')->nullable;
            $table->unsignedBigInteger('user_id');
            $table->softDeletes();                                  //快速建立軟刪除相關的欄位（deleted_at 欄位）
            $table->timestamps();                                   //建立允許為空值的created_at和updated_at兩個欄位
           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal2');//
    }
}
