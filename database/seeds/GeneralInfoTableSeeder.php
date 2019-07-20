<?php

use Illuminate\Database\Seeder;
use App\GeneralInfo;

class GeneralInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      GeneralInfo::create([
        'type'  => '1',
        'page_content'  => ''
      ]);

      GeneralInfo::create([
        'type'  => '2',
        'page_content'  => ''
      ]);
    }
}
