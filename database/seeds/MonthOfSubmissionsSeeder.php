<?php

use Illuminate\Database\Seeder;

class MonthOfSubmissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('month_of_submissions')->insert([
            ['month_name' => 'Январь'],
            ['month_name' => 'Февраль'],
            ['month_name' => 'Март'],
            ['month_name' => 'Апрель'],
            ['month_name' => 'Май'],
            ['month_name' => 'Июнь'],
            ['month_name' => 'Июль'],
            ['month_name' => 'Август'],
            ['month_name' => 'Сентябрь'],
            ['month_name' => 'Октябрь'],
            ['month_name' => 'Ноябрь'],
            ['month_name' => 'Декабрь']
        ]);
    }
}
