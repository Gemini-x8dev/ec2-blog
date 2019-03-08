<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'PHP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Docker',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        \Blog\Category\Category::insert($categories);
    }
}
