<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'projeto_id'];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }
}
