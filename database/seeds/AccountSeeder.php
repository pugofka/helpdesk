<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        User::create(array(
            'name'     => 'Pugofka dev',
            'email'    => 'info@pugofka.com',
            'password' => Hash::make('admin'),
        ));
    }

}