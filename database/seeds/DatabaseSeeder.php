<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Roles::class, 1)->create();
        factory(\App\Models\User::class, 2)->create();
    }
}
