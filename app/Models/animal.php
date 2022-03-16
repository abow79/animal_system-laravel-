<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class animal extends Model
{
    use HasFactory;
    use SoftDeletes;
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
