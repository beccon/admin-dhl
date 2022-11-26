<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Projeto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Empresa::factory()->create([
            'nome' => 'DHL',
            'cnpj' => '000',
            'endereco' => 'endereço 1',
       ]);

       Projeto::factory()->create([
        'nome' => 'Projeto 1',
        'empresa_id' => 1,
   ]);

        User::factory()->create([
             'name' => 'User 1',
             'email' => 'user1@test.com',
             'password' => bcrypt('password'),
             'empresa_id' => 1,
             'projeto_id' => 1,
        ]);
    }
}
