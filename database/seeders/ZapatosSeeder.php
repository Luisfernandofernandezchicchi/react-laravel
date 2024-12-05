<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ZapatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =array('marca'=>"ldsds",'modelo'=>"dsds",'tamaño'=>"151515",'tipo'=>"fdgfdgd");
        DB::table('zapatos')->insert($data);
    }
}
