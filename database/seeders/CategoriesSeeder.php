<?php

namespace Database\Seeders;

use Carbon\Traits\Date;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => 'do not set',
        ]);

        DB::table('categories')->insert($this->getData());
    }

    public function getData() {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => Factory::create()->text("100"),
                'created_at' => Date('Y-m-d')
            ];
        }

        return $data;
    }
}
