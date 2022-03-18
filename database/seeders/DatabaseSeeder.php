<?php

namespace Database\Seeders;

use App\Models\facility;
use App\Models\User;
use App\Models\booking;
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
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'made',
            'email' => 'made@gamil.com',
            'password' => bcrypt('123'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'reihan',
            'email' => 'reihan@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'management'
        ]);
        User::create([
            'name' => 'yang selalu',
            'email' => 'yangselalu@gamil.com',
            'password' => bcrypt('123'),
        ]);
        User::create([
            'name' => 'baik',
            'email' => 'baik@gmail.com',
            'password' => bcrypt('123'),
        ]);
        User::create([
            'name' => 'hatinya',
            'email' => 'hatinya@gmail.com',
            'password' => bcrypt('123'),
        ]);

        facility::create([
            'name'=>'Hall',
            'image'=> 'facility-images/default.jpg',
            'body' => 'lets booking hall'
        ]);
        facility::create([
            'name'=>'football field',
            'image'=> 'facility-images/default.jpg',
            'body' => 'lets booking football field'
        ]);
        facility::create([
            'name'=>'swimming pool',
            'image'=> 'facility-images/default.jpg',
            'body' => 'lets booking swimming pool'
        ]);
        facility::create([
            'name'=>'Badminton court',
            'image'=> 'facility-images/default.jpg',
            'body' => 'lets booking badminton court'
        ]);
        facility::create([
            'name'=>'parking area',
            'image'=> 'facility-images/default.jpg',
            'body' => 'lets booking parking area'
        ]);
        facility::create([
            'name'=>'basement',
            'image'=> 'facility-images/default.jpg',
            'body' => 'lets booking basement'
        ]);

        booking::factory(5)->create();
    }
}
