<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                    'nama'      => 'admin',
                    'username'  => 'admin', 
                    'password'  => bcrypt('admin'),
                    'level'     => 'admin',
                    'tlp'       => '89606274696'
                 
            ],
            [
                    'nama'      => 'petugas',
                    'username'  => 'petugas', 
                    'password'  => bcrypt('petugas'),
                    'level'     => 'petugas',
                    'tlp'       => '08885679900'
                 
            ],
            [
                    'nama'      => 'masyarakat',
                    'username'  => 'masyarakat', 
                    'password'  => bcrypt('masyarakat'),
                    'level'     => 'masyarakat',
                    'tlp'       => '08567899999'
                 
            ]
            ];
                foreach ($user as $key => $value){
                    User::create($value);
                }
        
    }
  }