<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;           //引用特徵檔案
class animal extends Model
{
    use HasFactory;
    use SoftDeletes;                                    //使用特徵（類似把特徵定義的方法貼到這個類別）
    protected $table = 'animal2';                       //指定寫入哪個table
    /*
    可以被批量寫入的屬性(欄位)
    @param  array  $attributes
    必須用一個$fillable變數來限制那些欄位可以被寫入
    */
    protected $fillable=[
        'type',
        'name',
        'birthday',
        'area',
        'fix',
        'description',
        'personality',
        'user_id',
    ];
}
