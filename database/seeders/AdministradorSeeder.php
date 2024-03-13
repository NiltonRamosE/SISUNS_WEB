<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Administrador;
class AdministradorSeeder extends Seeder
{
    public function run(): void
    {
        $administrators = [
            ['NILTON','RAMOS','ENCARNACION','admin', '123'],
            ['JHOAN ANTONI','CRUZ','CASTILLO','admin2', '124'],
        ];
        
        foreach ($administrators as $administratorData) {
            $administrator = new Administrador();

            $administrator->nombre  = $administratorData[0];
            $administrator->apellido_paterno  = $administratorData[1];
            $administrator->apellido_materno = $administratorData[2];
            $administrator->usuario = $administratorData[3];
            $administrator->password = $administratorData[4];
            $administrator->save();
        }
    }
}
