<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;

class Notes extends Seeder
{
    public function run()
    {
        $fabricator = new Fabricator(\App\Models\Notes::class); //Carga modelo que tiene la funcion de faker para generar datos de prueba
        $fabricator->create(10); //creala n cantidad de registros la cantidad que se desea debe ir dentro de los parentesis
    }
}
