<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            [
                'id'        => 1,
                'name'      => 'abc',
                'value'     => 5,
                'status'    => 'new'
            ],
            [
                'id'        => 2,
                'name'      => 'bce',
                'value'     => 10,
                'status'    => 'new'
            ]
        ]);
    }
}
