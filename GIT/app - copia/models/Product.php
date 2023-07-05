<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{

    protected $table = 'products';
    protected $primaryKey="id";
    protected $fillable = ['title', 'plot', 'genre', 'actors', 'rated', 'released', 'writer'];
    public $timestamps = false;

}
