<?php

namespace Database\Seeders;
use App\Models\departmentes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class  CreatedepartmentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  
     public function run()
     {
        
         $chunks = 300000;
         for ($i = 0; $i < $chunks; $i++) {
            $department = departmentes::create([
                'DepartmentName' => 'DepartmentName',
                'DepartmentHead' => 'DepartmentHead',
                'DepartmentArea' => 'DepartmentArea'
                ]);
         }
     }



    }