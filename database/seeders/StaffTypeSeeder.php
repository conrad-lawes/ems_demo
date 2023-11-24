<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        

        \DB::table('staff_types')->delete();
        
        \DB::table('staff_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Employee',
                'description' => 'Fulltime Employee',
                'created_at' => now(),
                'updated_at' => now()
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Contractor',
                'description' => 'Contractor',
                'created_at' => now(),
                'updated_at' => now()                
            ),
			array (
					'id' => 3,
					'name' => 'Intern/Co-Op',
					'description' => 'Co-Op or Intern',
                    'created_at' => now(),
                    'updated_at' => now()                
				),                      
			));
        
        
    }

}
