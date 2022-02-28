<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\product;
use App\Models\transaction;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create ([
            'name'  => 'Luthfi Arzaki',
            'username' => 'luthfi',
            'no_telpon' => '6289696115076',
            'email' => 'luthfi@gmail.com',
            'password'  => bcrypt ('password'),
            'status' => 'admin'
        ]);
        User::create ([
            'name'  => 'Intan Ramadanti',
            'username' => 'intan',
            'no_telpon' => '6289696115076',
            'email' => 'intan@gmail.com',
            'password'  => bcrypt ('password'),
            'status' => 'user'
        ]);

        User::factory(5)->create();



        Category::create ([
            'nama'  => 'Kantin G',
            'slug'  => 'kantin-g'
        ]);
        Category::create ([
            'nama'  => 'Blok M',
            'slug'  => 'blok-m'
        ]);
        Category::create ([
            'nama'  => 'Cafe Kebun',
            'slug'  => 'cafe-kebun'
        ]);

        // Post::factory(4)->create();
        product::factory(10)->create();

        transaction::factory(5)->create();
        // Post::create ([
        //     'category_id'   => 2,
        //     'user_id'    => 1,
        //     'title' => 'judul 1',
        //     'slug'  => 'j1',
        //     'excerpt'   => 'loremmmmmmm',
        //     'body'  => 'loremmmmmmmmmmmmmmmmmmmmmmmmmmm'

        // ]);

        // Post::create ([
        //     'category_id'   => 1,
        //     'user_id'    => 1,
        //     'title' => 'judul 2',
        //     'slug'  => 'j2',
        //     'excerpt'   => 'loremmmmmmm',
        //     'body'  => 'loremmmmmmmmmmmmmmmmmmmmmmmmmmm'

        // ]);
    }
}
