<?php

use Illuminate\Database\Seeder;
use App\Http\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
            'role_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin.ru',
            'password' => bcrypt('admin'),
        ]);
        
        factory(App\Http\Models\User::class, 9)->create();
    }
}
