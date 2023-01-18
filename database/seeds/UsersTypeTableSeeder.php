<?php

use Illuminate\Database\Seeder;
use App\Modules\Users\Models\UserType;

class UsersTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insertToData = ['Super Admin', 'Admin', 'User', 'Guest'];
        for($i=0; $i < count($insertToData); $i++){
                $user_type = new UserType;
                $user_type->name =  $insertToData[$i];
                $user_type->save();
        }
    }
}
