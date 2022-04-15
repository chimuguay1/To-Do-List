<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    public $table = 'tasks';

    public $fillable = [
        'title',
        'description',
        'status',
        'completed_at'
    ];

    protected $cast = [
        'name' => 'string',
        'description'=> 'text',
        'status' => 'boolean',
        'completed_at' => 'timestamp'
    ];
}
