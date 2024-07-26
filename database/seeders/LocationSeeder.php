<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
           1=> 'Chennai',
           2=> 'Coimbatore',
           3=> 'Erode',
           4=> 'Salem',
           5=> 'Trichy',
           6=> 'Tiruchendur',
           7=> 'Madurai',
           8=> 'Tirunelveli',
           9=> 'Thoothukudi',
           10=> 'Gobi'
        ];

        foreach ($data as $key => $value) {
            Location ::updateOrCreate(['id'=>$key],[
                'name'=> $value
            ]);
        }
    }
}
