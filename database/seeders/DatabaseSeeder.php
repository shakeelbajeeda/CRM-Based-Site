<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudentParent;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
        ]);

        StudentParent::factory(50)->create();
        Student::factory(50)->create();
        Attendance::factory(50)->create();
        Grade::factory(50)->create();
    }
}
