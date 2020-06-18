<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class People2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'taro2',
            'mail' => 'taro2@yamada.jp',
            'age'  => 12,
        ];
        DB::table('people2')->insert($param);

        $param = [
            'name' => 'hanako2',
            'mail' => 'hanako2@flower.jp',
            'age'  => 34,
        ];
        DB::table('people2')->insert($param);

        $param = [
            'name' => 'sachiko2',
            'mail' => 'sachiko2@happy.jp',
            'age'  => 56,
        ];
        DB::table('people2')->insert($param);

    }
}
