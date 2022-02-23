<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class animal extends Model
{
    use HasFactory;
    /*
    可以被批量寫入的屬性(欄位)
    @param  array  $attributes
    必須用一個$fillable變數來限制那些欄位可以被寫入
    */
    protected $fillable=[
        'type_id',
        'name',
        'birthday',
        'area',
        'fix',
        'description',
        'personality',
        'user_id',
    ];
}
