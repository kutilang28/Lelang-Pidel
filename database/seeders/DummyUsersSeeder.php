<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData =[
            [
                'name'=>'Admin',
                'email'=>'kutilang28@gmail.com',
                'role'=>'administrator',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'Petugas',
                'email'=>'petugas@gmail.com',
                'role'=>'petugas',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'Masyarakat kutil',
                'email'=>'masyarakat@gmail.com',
                'role'=>'masyarakat',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'Siswa',
                'email'=>'siswa@gmail.com',
                'password'=>bcrypt('123456')
            ],
        ];
        
        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
