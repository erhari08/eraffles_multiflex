<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Fee;
use App\Models\CpeProgram;

use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Make sure roles exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@eraffles.com',
            'password' => Hash::make('password123'), // Set secure password
            'role_id' => $adminRole->id, // for single-role setup
            'email_verified_at'=>'2025-06-28 18:18:17'
        ]);

        // Create normal user
        $user = User::create([
            'name' => 'Normal User',
            'email' => 'user@eraffles.com',
            'password' => Hash::make('password123'),
            'role_id' => $userRole->id,
            'email_verified_at'=>'2025-06-28 18:18:17'

        ]);
        $user = CpeProgram::create([
            'date' => '2025-06-28',
            'name' => 'Refresher course 4 hrs',
            'venue' => 'Online',
            'status' => '1',
            'certificate_template' => 'cpe_templates\1Vw9Q8PQfWi4Wzs3uXjVXcylUNfwvVCQ3Xsy873a.pdf',
            'course_content' => 'https://www.youtube.com/watch?v=JYgdC4EQxUo'
        ]);

    
               $fees = [
            ['name' => 'Application Fee', 'amount' => 10],
            ['name' => 'Registration Fee', 'amount' => 500],
            ['name' => 'Late Registration Fee', 'amount' => 500],
            ['name' => 'Renewal Fee (1 Year)', 'amount' => 50],
            ['name' => 'Renewal Fee (5 Year)', 'amount' => 500],
            ['name' => 'Restoration Fee', 'amount' => 1000],
            ['name' => 'Restoration Penalty', 'amount' => 250],
            ['name' => 'Name Change Fee', 'amount' => 100],
            ['name' => 'Duplicate Certificate Fee', 'amount' => 1500],
            ['name' => 'Duplicate ID Card Fee', 'amount' => 100],
            ['name' => 'Additional Qualification Fee', 'amount' => 510],
            ['name' => 'Good Standing Certificate Fee', 'amount' => 2500],
            ['name' => 'Transfer from Pondy to Other State', 'amount' => 500],
            ['name' => 'Transfer from Other State to Pondy', 'amount' => 500],
        ];

            foreach ($fees as $fee) {
                Fee::create($fee);
            }

    }
}
