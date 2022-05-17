<?php

namespace Database\Seeders;

use App\Models\UserInformation;
use Illuminate\Database\Seeder;

class UserInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //tao ra 10 records
        UserInformation::factory(10)->create();
    }
}
