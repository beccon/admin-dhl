<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cnpj', 'endereco', 'responsavel_nome', 'responsavel_telefone'];

    public function projetos()
    {
        return $this->hasMany(Projeto::class);
    }

    public function Usuários()
    {
        return $this->hasMany(User::class);
    }
}
