<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    // \App\Models\User::factory(10)->create();
        // Produto::factory(10)->create();
        Produto::create([
            'nome' => 'Heitor Gonçalves',
            'valor'=> 20.00
        ]);
    }
}
