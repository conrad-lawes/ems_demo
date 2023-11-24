<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Employee::factory(45)->create();
        $users = \App\Models\Employee::get();

        
        
        try {
            DB::beginTransaction();
            foreach ($users as $user)
            {
                // printf("Looking for department matching %s\n", $user->position);
                switch ($user->position) {
                    case ( str_contains($user->position, 'HR')):
                        $id = 2;
                        break;
                    case ( str_contains($user->position, 'Talent')):
                        $id = 2;
                        break;
                    case ( str_contains($user->position, 'CFO')):
                        $id = 6;
                        break;
                    case ( str_contains($user->position, 'CEO')):
                            $id = 6;
                            break;
                    case ( str_contains($user->position, 'VP')):
                        $id = 6;
                        break;
                    case ( str_contains($user->position, 'Developer')):
                        $id = 3;
                        break;
                    case ( str_contains($user->position, 'Technical') or str_contains($user->position, 'Support')):
                        $id = 4;
                        break;
                    case ( str_contains($user->position, 'Systems') or str_contains($user->position, 'Network')):
                        $id = 4;
                        break;
                    case ( str_contains($user->position, 'Accounts')):
                        $id = 1;
                        break;
                    case ( str_contains($user->position, 'Finance') or str_contains($user->position, 'Financial')):
                        $id = 1;
                        break;
                    case ( str_contains($user->position, 'Sales')):
                        $id = 5;
                        break;
                    default:
                        $id = 0;
                }

                if ($id > 0)                
                {   
                    // printf('Found a match!\n');
                    // printf("The id for %s is %d\n", $user->position, $id);                 
                    $user->department_id = $id;
                    $user->save();
                }
            }
            DB::commit();
        }
        catch(Exception $e)
        {  
            DB::rollback();
        }
    }
}
