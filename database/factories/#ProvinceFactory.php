<?php

namespace Database\Factories;

use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProvinceFactory extends Factory
{
    protected $model = Province::class;

    public function definition(): array
    {
        $provinces = [
    ['name' => 'Buenos Aires',       'postal_code' => 'B1900', 'latitud' => -34.9214, 'longitud' => -57.9544], 
    ['name' => 'Catamarca',          'postal_code' => 'K4700', 'latitud' => -28.4696, 'longitud' => -65.7852],
    ['name' => 'Chaco',              'postal_code' => 'H3500', 'latitud' => -27.4510, 'longitud' => -58.9839], 
    ['name' => 'Chubut',             'postal_code' => 'U9103', 'latitud' => -43.3002, 'longitud' => -65.1023], 
    ['name' => 'CABA',               'postal_code' => 'C1000', 'latitud' => -34.6037, 'longitud' => -58.3816], 
    ['name' => 'Córdoba',            'postal_code' => 'X5000', 'latitud' => -31.4201, 'longitud' => -64.1888],
    ['name' => 'Corrientes',         'postal_code' => 'W3400', 'latitud' => -27.4692, 'longitud' => -58.8306],
    ['name' => 'Entre Ríos',         'postal_code' => 'E3100', 'latitud' => -31.7319, 'longitud' => -60.5238], 
    ['name' => 'Formosa',            'postal_code' => 'P3600', 'latitud' => -26.1775, 'longitud' => -58.1731],
    ['name' => 'Jujuy',              'postal_code' => 'Y4600', 'latitud' => -24.1858, 'longitud' => -65.2995], 
    ['name' => 'La Pampa',           'postal_code' => 'L6300', 'latitud' => -36.6167, 'longitud' => -64.2833],
    ['name' => 'La Rioja',           'postal_code' => 'F5300', 'latitud' => -29.4135, 'longitud' => -66.8559],
    ['name' => 'Mendoza',            'postal_code' => 'M5500', 'latitud' => -32.8895, 'longitud' => -68.8458],
    ['name' => 'Misiones',           'postal_code' => 'N3300', 'latitud' => -27.3671, 'longitud' => -55.8961], 
    ['name' => 'Neuquén',            'postal_code' => 'Q8300', 'latitud' => -38.9516, 'longitud' => -68.0591],
    ['name' => 'Río Negro',          'postal_code' => 'R8500', 'latitud' => -40.8134, 'longitud' => -62.9967], 
    ['name' => 'Salta',              'postal_code' => 'A4400', 'latitud' => -24.7821, 'longitud' => -65.4232],
    ['name' => 'San Juan',           'postal_code' => 'J5400', 'latitud' => -31.5375, 'longitud' => -68.5364],
    ['name' => 'San Luis',           'postal_code' => 'D5700', 'latitud' => -33.2950, 'longitud' => -66.3356],
    ['name' => 'Santa Cruz',         'postal_code' => 'Z9400', 'latitud' => -51.6226, 'longitud' => -69.2181], 
    ['name' => 'Santa Fe',           'postal_code' => 'S3000', 'latitud' => -31.6107, 'longitud' => -60.6973], 
    ['name' => 'Santiago del Estero','postal_code' => 'G4200', 'latitud' => -27.7951, 'longitud' => -64.2612],
    ['name' => 'Tierra del Fuego',   'postal_code' => 'V9410', 'latitud' => -54.8019, 'longitud' => -68.3030], 
    ['name' => 'Tucumán',            'postal_code' => 'T4000', 'latitud' => -26.8083, 'longitud' => -65.2176]  
];

        $province = fake()->randomElement($provinces);

        return [
            'name' => $province['name'],
            'postal_code' => $province['postal_code'],
            'latitud' => $province['latitud'],
            'longuitud' => $province['longuitud'],
        ];
    }
}