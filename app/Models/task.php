<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\migration\tasks;

class Task extends Model
{
    protected $fillable = [
        'title',
        'done',
    ]; 
}
