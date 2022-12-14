<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'empresa_id'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function Usuários()
    {
        return $this->belongsToMany(User::class, 'projetos_usuarios');
    }

    public function Cameras()
    {
        return $this->hasMany(Camera::class);
    }
}
