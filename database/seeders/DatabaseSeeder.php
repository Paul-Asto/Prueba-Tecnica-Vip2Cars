<?php

namespace Database\Seeders;

use App\Http\Controllers\MarcaController;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Propietario;
use App\Models\User;
use App\Models\Vehiculo;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        User::factory()->create([
            'name' => 'Test_User',
            'email' => 'test@example.com',
        ]);

        Marca::create(["nombre"=> "Toyota"]);
        Marca::create(["nombre"=> "Honda"]);
        Marca::create(["nombre"=> "Ford"]);
        Marca::create(["nombre"=> "Chevrolet"]);
        Marca::create(["nombre"=> "Nissan"]);
        Marca::create(["nombre"=> "Mazda"]);
        Marca::create(["nombre"=> "Volkswagen"]);
        Marca::create(["nombre"=> "BMW"]);
        Marca::create(["nombre"=> "Mercedes-Benz"]);
        Marca::create(["nombre"=> "Audi"]);
        Marca::create(["nombre"=> "Hyundai"]);
        Marca::create(["nombre"=> "Kia"]);
        Marca::create(["nombre"=> "Jeep"]);
        Marca::create(["nombre"=> "Subaru"]);
        Marca::create(["nombre"=> "Tesla"]);
        Marca::create(["nombre"=> "Volvo"]);

        Modelo::create(["nombre" => "Corolla", "id_marca" => Marca::where("nombre", "Toyota")->first()->id]);
        Modelo::create(["nombre" => "Civic", "id_marca" => Marca::where("nombre", "Honda")->first()->id]);
        Modelo::create(["nombre" => "Mustang", "id_marca" => Marca::where("nombre", "Ford")->first()->id]);
        Modelo::create(["nombre" => "Golf", "id_marca" => Marca::where("nombre", "Volkswagen")->first()->id]);
        Modelo::create(["nombre" => "Cherokee", "id_marca" => Marca::where("nombre", "Jeep")->first()->id]);
        Modelo::create(["nombre" => "Camaro", "id_marca" => Marca::where("nombre", "Chevrolet")->first()->id]);
        Modelo::create(["nombre" => "Sentra", "id_marca" => Marca::where("nombre", "Nissan")->first()->id]);
        Modelo::create(["nombre" => "A4", "id_marca" => Marca::where("nombre", "Audi")->first()->id]);
        Modelo::create(["nombre" => "Clase C", "id_marca" => Marca::where("nombre", "Mercedes-Benz")->first()->id]);
        Modelo::create(["nombre" => "Serie 3", "id_marca" => Marca::where("nombre", "BMW")->first()->id]);
        Modelo::create(["nombre" => "Elantra", "id_marca" => Marca::where("nombre", "Hyundai")->first()->id]);
        Modelo::create(["nombre" => "Outback", "id_marca" => Marca::where("nombre", "Subaru")->first()->id]);
        Modelo::create(["nombre" => "Pilot", "id_marca" => Marca::where("nombre", "Honda")->first()->id]);
        Modelo::create(["nombre" => "RAV4", "id_marca" => Marca::where("nombre", "Toyota")->first()->id]);
        Modelo::create(["nombre" => "Tucson", "id_marca" => Marca::where("nombre", "Hyundai")->first()->id]);
        Modelo::create(["nombre" => "CX-5", "id_marca" => Marca::where("nombre", "Mazda")->first()->id]);
        Modelo::create(["nombre" => "CR-V", "id_marca" => Marca::where("nombre", "Honda")->first()->id]);
        Modelo::create(["nombre" => "F-150", "id_marca" => Marca::where("nombre", "Ford")->first()->id]);
        Modelo::create(["nombre" => "Grand Cherokee", "id_marca" => Marca::where("nombre", "Jeep")->first()->id]);
        Modelo::create(["nombre" => "Tacoma", "id_marca" => Marca::where("nombre", "Toyota")->first()->id]);
        

        Propietario::factory()->count(300)->create();
        Vehiculo::factory()->count(500)->create();
    }
}
