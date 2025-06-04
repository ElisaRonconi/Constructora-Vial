<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('provinces')->insert(  [
    ['name' => 'Buenos Aires',       'postal_code' => 'B1900', 'latitud' => -34.9214, 'longuitud' => -57.9544], 
    ['name' => 'Catamarca',          'postal_code' => 'K4700', 'latitud' => -28.4696, 'longuitud' => -65.7852],
    ['name' => 'Chaco',              'postal_code' => 'H3500', 'latitud' => -27.4510, 'longuitud' => -58.9839], 
    ['name' => 'Chubut',             'postal_code' => 'U9103', 'latitud' => -43.3002, 'longuitud' => -65.1023], 
    ['name' => 'CABA',               'postal_code' => 'C1000', 'latitud' => -34.6037, 'longuitud' => -58.3816], 
    ['name' => 'Córdoba',            'postal_code' => 'X5000', 'latitud' => -31.4201, 'longuitud' => -64.1888],
    ['name' => 'Corrientes',         'postal_code' => 'W3400', 'latitud' => -27.4692, 'longuitud' => -58.8306],
    ['name' => 'Entre Ríos',         'postal_code' => 'E3100', 'latitud' => -31.7319, 'longuitud' => -60.5238], 
    ['name' => 'Formosa',            'postal_code' => 'P3600', 'latitud' => -26.1775, 'longuitud' => -58.1731],
    ['name' => 'Jujuy',              'postal_code' => 'Y4600', 'latitud' => -24.1858, 'longuitud' => -65.2995], 
    ['name' => 'La Pampa',           'postal_code' => 'L6300', 'latitud' => -36.6167, 'longuitud' => -64.2833],
    ['name' => 'La Rioja',           'postal_code' => 'F5300', 'latitud' => -29.4135, 'longuitud' => -66.8559],
    ['name' => 'Mendoza',            'postal_code' => 'M5500', 'latitud' => -32.8895, 'longuitud' => -68.8458],
    ['name' => 'Misiones',           'postal_code' => 'N3300', 'latitud' => -27.3671, 'longuitud' => -55.8961], 
    ['name' => 'Neuquén',            'postal_code' => 'Q8300', 'latitud' => -38.9516, 'longuitud' => -68.0591],
    ['name' => 'Río Negro',          'postal_code' => 'R8500', 'latitud' => -40.8134, 'longuitud' => -62.9967], 
    ['name' => 'Salta',              'postal_code' => 'A4400', 'latitud' => -24.7821, 'longuitud' => -65.4232],
    ['name' => 'San Juan',           'postal_code' => 'J5400', 'latitud' => -31.5375, 'longuitud' => -68.5364],
    ['name' => 'San Luis',           'postal_code' => 'D5700', 'latitud' => -33.2950, 'longuitud' => -66.3356],
    ['name' => 'Santa Cruz',         'postal_code' => 'Z9400', 'latitud' => -51.6226, 'longuitud' => -69.2181], 
    ['name' => 'Santa Fe',           'postal_code' => 'S3000', 'latitud' => -31.6107, 'longuitud' => -60.6973], 
    ['name' => 'Santiago del Estero','postal_code' => 'G4200', 'latitud' => -27.7951, 'longuitud' => -64.2612],
    ['name' => 'Tierra del Fuego',   'postal_code' => 'V9410', 'latitud' => -54.8019, 'longuitud' => -68.3030], 
    ['name' => 'Tucumán',            'postal_code' => 'T4000', 'latitud' => -26.8083, 'longuitud' => -65.2176]  
]);
    }
}
