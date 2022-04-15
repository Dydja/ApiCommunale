<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CommuneSeeder;
use Database\Seeders\UserSeeder;
use Auth0\SDK\API\Management\Users;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         // \App\Models\User::factory(10)->create();
         //\App\Models\Commune::factory(10)->create();
         $this->call([
            //CommuneSeeder::class,
            UserSeeder::class,


         ]);

    }
}
