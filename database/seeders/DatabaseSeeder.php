<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\item_type;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $name=['Radio Button','Text Input'];
        
        foreach($name as $item){
            item_type::insert(['name'=> $item]);
        }
    }
}
