<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;


    protected $table = 'content';

    protected $fillable = [
'title_th',
'title_en',
'detail_th',
'detail_en',
'url',
'image',
'desciption_th',
'desciption_en',
'status',
'type',
'seq',
'keyword',
'created_at',
'updated_at',
    ];


}
