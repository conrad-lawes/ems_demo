<?php

namespace App\Filament\Widgets\Dashboard;

use Filament\Widgets\ChartWidget;
use App\Models\Department;

class EmployeeChart extends ChartWidget
{
    protected static ?string $heading = 'Employees per Department';
    protected static string $color = 'info';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $depts = Department::withCount('employees')->get();
        $data = [];
        foreach($depts as $dept => $value) {
                array_push($data,$value->employees_count);
             }
        $labels = [];
        foreach($depts as $dept => $value) {
                array_push($labels,$value->name);
            }
        return [
            'datasets' => [
                [
                    'label' => 'Departments',
                    'data' => $data,
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                      ],
                      'borderColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                      ],
                      'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
