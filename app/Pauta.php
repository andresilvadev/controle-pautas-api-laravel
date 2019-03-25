<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pauta extends Model
{
    protected $fillable = ['titulo', 'descricao', 'detalhes', 'autor', 'status'];
}
