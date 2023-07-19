<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    use HasFactory;

    protected $table = 'secretarias';

    protected $fillable = [
        'nome',
        'sigla'
    ];

    public function getPesquisarIndex(string $search = '') {

        $secretaria = $this->where('sigla', 'LIKE', "%{$search}%")->get();
        
        // $produto = $this->where(function($query) use ($search) {
        //     if($search){
        //         $query->where('nome', $search);
        //         $query->orWhere('nome', 'LIKE', "%{$search}%");
        //     }
        // })->get();
            
        return $secretaria;

    }
}
