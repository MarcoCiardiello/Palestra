<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atleta extends Model
{
    use HasFactory;
    protected $table = 'atleta';

    public $timestamps = false;
    protected $fillable = ['nome', 'cognome'];

}
