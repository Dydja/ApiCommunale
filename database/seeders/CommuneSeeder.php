<?php

namespace Database\Seeders;

//use App\Models\Commune;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('communes')->insert([
            'nom' => "Adjame"
        ]);

        DB::table('communes')->insert([
            'nom' => "Plateau"
        ]);

        DB::table('communes')->insert([
            'nom' => "Adjame"
        ]);

        DB::table('communes')->insert([
            'nom' => "Plateau"
        ]);

        DB::table('communes')->insert([
            'nom' => "Plateau"
        ]);

        DB::table('communes')->insert([
            'nom' => "Plateau"
        ]);
    }
}
