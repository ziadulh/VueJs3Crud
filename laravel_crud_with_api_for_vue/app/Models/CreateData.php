<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateData extends Model
{
    use HasFactory;

    protected $table = 'create_data';
    protected $fillable = ['test_text' ,'test_text_area' ,'test_select' ,'radio_option' ,'test_check'];
}
