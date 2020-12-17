<?php

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            ['name' => 'Laravel', 'slug' => 'laravel'],
            ['name' => 'Vue', 'slug' => 'vue'],
            ['name' => 'React', 'slug' => 'react'],
        ];

        foreach ($subjects as $subject) {
            Subject::create([
                'name' => $subject['name'],
                'slug' => $subject['slug'],
            ]);
        }
    }
}
