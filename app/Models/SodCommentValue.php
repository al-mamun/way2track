<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SodCommentValue extends Model
{
    use HasFactory;
    protected $table = "w2t_sod_comment_values";
    protected $timestamp = false;
    protected $primaryKey = "ID";
}
