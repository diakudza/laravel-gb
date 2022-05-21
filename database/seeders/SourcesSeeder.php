<?php

namespace Database\Seeders;

use Carbon\Traits\Date;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert($this->getData());
    }

    public function getData() {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => Factory::create()->text("10"),
                'text' => Factory::create()->text("100"),
                'created_at' => Date('Y-m-d'),
                'url' => Factory::create()->url(),
            ];
        }

        return $data;
    }
}
