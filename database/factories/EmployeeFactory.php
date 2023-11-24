<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Department;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 * 
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $domain = "@example.biz";
        $fn = fake()->firstname();
        $ln = fake()->lastname();
        $email =  strtolower($fn.".".$ln.$domain);
        $username =  strtolower($fn.".".$ln);
        $fullname =  $ln.", ".$fn;
        $initial = fake()->randomElement(['A','B','C','E','G', 'MB', 'S', null]);
        $position = fake()->randomElement(
            [
                "CEO",
                "Accounts Payable Clerk",
                "Accounts Receivable Clerk",
                "Sales, Director",
                "Technical Support Specialist",
                "Network Administrator",
                "Software Developer",
                "Systems Administrator",                
                "Technical Writer",
                "HR Recruiter",
                "Financial Analyst",
                "Office Administrator",
                "HR Administrator",
                "Talent Recruiter",
                "Sales, VP",
                "CFO",
                "HR, Director",
                "Co-Op Developer",
                "Junior Software Developer",
                "L1 Support Technician",
                "Finance, Director",
            ]
        );
        $depts = collect(Department::all()->modelKeys());
        return [
            'firstname' => $fn,
            'lastname' => $ln,
            'middle_init' => $initial,
            'username' => $username,
            'position' => $position,
            'fullname' => $fullname,
            'department_id' => $depts->random(),
            'email' => $email
                        
        ];
    }
}
