<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // realizou uma chamada da seeder FornecedorSeeder
        $this->call(FornecedorSeeder::class);
        $this->call(SiteContatoSeeder::class);
        $this->call(MotivoContatoSeeder::class);
    }
}
