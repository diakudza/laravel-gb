<?php

namespace Database\Seeders;

use Database\Factories\FeedbackFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Feedback::factory(100)->create();
//        $this->call(FeedbackFactory::class);
    }
}
