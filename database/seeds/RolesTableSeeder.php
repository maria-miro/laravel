<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Role;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'description' => 'Управление сайтом',
        ]);


  		Role::create([
        	'name' => 'author',
            'description' => 'Добавление статей, редактирование и удаление своих статьей, добваление комментариев, удаление своих комментариев и комментариев к своим статьям',
  		]); 
    }
}
