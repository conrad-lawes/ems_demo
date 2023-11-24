<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('departments')->delete();
        
        \DB::table('departments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Finance',
                'description' => 'Finance',
                'created_at' => now(),
                'updated_at' => now()
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'HR',
                'description' => 'Human Resources Dept',
                'created_at' => now(),
                'updated_at' => now()                
            ),
			array (
					'id' => 3,
					'name' => 'Software Development',
					'description' => 'Software Dev',
                    'created_at' => now(),
                    'updated_at' => now()                
				),
                array (
					'id' => 4,
					'name' => 'Information Systems',
					'description' => 'IT',
                    'created_at' => now(),
                    'updated_at' => now()                
				),
                array (
					'id' => 5,
					'name' => 'Sales',
					'description' => 'Sales',
                    'created_at' => now(),
                    'updated_at' => now()                
				),               
                array (
					'id' => 6,
					'name' => 'Executive',
					'description' => 'Executive',
                    'created_at' => now(),
                    'updated_at' => now()                
				),                                                                       
			));
    }
}
