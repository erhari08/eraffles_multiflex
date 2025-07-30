<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Fee;
use App\Models\Products;
use App\Models\Category;
use App\Models\Machine;
use App\Models\Shift;

use App\Models\CpeProgram;

use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Make sure roles exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $supervisorRole = Role::firstOrCreate(['name' => 'supervisor']);
        $prod_managerRole = Role::firstOrCreate(['name' => 'production_manager']);
        $operatorrRole = Role::firstOrCreate(['name' => 'operator']);


        $shift = Shift::firstOrCreate(['name' => 'Shift-1']);
        $shift = Shift::firstOrCreate(['name' => 'Shift-2']);
        $shift = Shift::firstOrCreate(['name' => 'Shift-3']);

         $machine = Machine::firstOrCreate(['name'=>'printing_machine-1','machine_no'=>'01','details'=>'prining roll']);
         $machine = Machine::firstOrCreate(['name'=>'printing_machine-2','machine_no'=>'02','details'=>'prining roll']);

         $machine = Machine::firstOrCreate(['name'=>'Slitting_machine','machine_no'=>'01','details'=>'rewind,splitting,joining']);
         $machine = Machine::firstOrCreate(['name'=>'poucing','machine_no'=>'01','details'=>'pouch']);
         $machine = Machine::firstOrCreate(['name'=>'packing','machine_no'=>'01','details'=>'packaging']);

        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@eraffles.com',
            'password' => Hash::make('password123'), // Set secure password
            'role_id' => $adminRole->id, // for single-role setup
            'email_verified_at'=>'2025-06-28 18:18:17'
        ]);
        $user = User::create([
            'name' => 'User',
            'email' => 'user@eraffles.com',
            'password' => Hash::make('password123'), // Set secure password
            'role_id' => $userRole->id, // for single-role setup
            'email_verified_at'=>'2025-06-28 18:18:17'
        ]);
        $supervisor = User::create([
            'name' => 'Supervisior ',
            'email' => 'supervisor@eraffles.com',
            'password' => Hash::make('password123'), // Set secure password
            'role_id' => $supervisorRole->id, // for single-role setup
            'email_verified_at'=>'2025-06-28 18:18:17'
        ]);

        // Create normal user
        $operatorrRole = User::create([
            'name' => 'operator',
            'email' => 'operator@eraffles.com',
            'password' => Hash::make('password123'),
            'role_id' => $operatorrRole->id,
            'email_verified_at'=>'2025-06-28 18:18:17'

        ]);
         $prodmanagerRole = User::create([
            'name' => 'prod_manager',
            'email' => 'pm@eraffles.com',
            'password' => Hash::make('password123'),
            'role_id' => $prod_managerRole->id,
            'email_verified_at'=>'2025-06-28 18:18:17'

        ]);

         $Categories = [
            ['name' => 'Film'],
            ['name' => 'Ink'],
            ['name' => 'Solvent'],
            ['name' => 'Tape'],
         ];
          foreach ($Categories as $Category) {
                Category::create($Category);
            }
       
             $Products = [
            ['name' => 'LD'],
            ['name' => 'MOPP'],
            ['name' => 'PET'],
            ['name' => 'Slicking Tape'],
         ];
          foreach ($Products as $Product) {
                Products::create($Product);
            }
       

    
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
