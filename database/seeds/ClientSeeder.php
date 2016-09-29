<?php

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->truncate();
        DB::table('contracts')->truncate();
        factory(App\Models\Client::class, 5)->create()->each(function($u) {
            $u->contracts()->save(factory(App\Models\Contract::class)->make());
        });
    }

}