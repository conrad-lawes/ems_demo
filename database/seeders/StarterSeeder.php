<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('starters')->delete();
        
        \DB::table('starters')->insert(array (
            0 => 
            array (
                'id' => 1,
                'staff_type_id' => 1,
                'firstname' => 'Tom',
                'lastname' => 'Hanks',
                'username' => 'tom.hanks',
                'position' => 'Sales Director',
                'email' => 'tom.hanks@example.biz',
                'password' => 'Life$like@box..',
                'department_id' => 5,
                'manager_id' => 1,
                'user_id' => 1,
                'date_hired' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ),
            1 => 
            array (
                'id' => 2,
                'staff_type_id' => 1,
                'firstname' => 'Bruce',
                'lastname' => 'Willis',
                'username' => 'bruce.willis',
                'position' => 'Software Developer',
                'email' => 'bruce.willis@example.biz',
                'password' => 'Yippee-ki-yaY',
                'department_id' => 3,
                'manager_id' => 1,
                'user_id' => 1,
                'date_hired' => now(),
                'created_at' => now(),
                'updated_at' => now()             
            ),
            2 => 
            array (
                'id' => 3,
                'staff_type_id' => 2,
                'firstname' => 'Sylvester',
                'lastname' => 'Stallone',
                'username' => 'sylvester.stallone',
                'position' => 'Contractor',
                'email' => 'syl.stall@gmail.com',
                'password' => 'Adrienne!',
                'department_id' => 4,
                'manager_id' => 2,
                'user_id' => 1,
                'date_hired' => now(),
                'created_at' => now(),
                'updated_at' => now()             
            ),
			            
			));
        
 
    }
}
