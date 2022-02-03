<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => 'todo'],
            ['name' => 'inprogress'],
            ['name' => 'completed']
        ];
        \DB::table('statuses')->insert($statuses);
    }
}
