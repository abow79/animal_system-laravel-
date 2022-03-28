<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {		//第一個參數'animals'是資料表名稱,第二個參數是匿名的函數內容中撰寫要怎樣建立這資料表的欄位
        $table->id();
	    $table->unsignedBigInteger('type_id')->nullable;
	    $table->string('name');
	    $table->date('birthday')->nullable;
	    $table->string('area')->nullable; 
     	$table->boolean('fix')->default(false);
	    $table->text('description')->nullable;
	    $table->text('personality')->nullable;
	    $table->unsignedBigInteger('user_id');
	    $table->softDeletes();                                      //快速建立軟刪除相關的欄位（deleted_at 欄位）
	    $table->timestamps();                                       //建立允許為空值的created_at和updated_at兩個欄位
	   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()			//down用於恢復資料庫流程時
    {
        Schema::dropIfExists('animals');
    }
}
