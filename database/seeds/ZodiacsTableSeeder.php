<?php

use Illuminate\Database\Seeder;

class ZodiacsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zodiacs')->insert([
            ['id' => 1, 'title' => 'Aries', 'alias'=> 'aries','zodiacSign'=> 'aries.png','startDate'=> 'Mar 21','endDate'=> 'Apr 20', 'status'=> 1,'orderid'=> 1],
            ['id' => 2, 'title' => 'Taurus', 'alias'=> 'taurus','zodiacSign'=> 'taurus.png','startDate'=> 'Apr 21','endDate'=> 'May 21', 'status'=> 1,'orderid'=> 2],
            ['id' => 3, 'title' => 'Gemini', 'alias'=> 'gemini','zodiacSign'=> 'gemini.png','startDate'=> 'May 22','endDate'=> 'Jun 21', 'status'=> 1,'orderid'=> 3],
            ['id' => 4, 'title' => 'Cancer', 'alias'=> 'cancer','zodiacSign'=> 'cancer.png','startDate'=> 'Jun 22','endDate'=> 'Jul 22', 'status'=> 1,'orderid'=> 4],
            ['id' => 5, 'title' => 'Leo', 'alias'=> 'leo','zodiacSign'=> 'leo.png','startDate'=> 'Jul 23','endDate'=> 'Aug 22', 'status'=> 1,'orderid'=> 5],
            ['id' => 6, 'title' => 'Virgo', 'alias'=> 'virgo','zodiacSign'=> 'virgo.png','startDate'=> 'Aug 23','endDate'=> 'Sep 22', 'status'=> 1,'orderid'=> 6],
            ['id' => 7, 'title' => 'Libra', 'alias'=> 'libra','zodiacSign'=> 'libra.png','startDate'=> 'Sep 23','endDate'=> 'Oct 22', 'status'=> 1,'orderid'=> 7],
            ['id' => 8, 'title' => 'Scorpio', 'alias'=> 'scorpio','zodiacSign'=> 'scorpio.png','startDate'=> 'Oct 23','endDate'=> 'Nov 21', 'status'=> 1,'orderid'=> 8],
            ['id' => 9, 'title' => 'Sagittarius', 'alias'=> 'sagittarius','zodiacSign'=> 'sagittarius.png','startDate'=> 'Nov 22','endDate'=> 'Dec 21', 'status'=> 1,'orderid'=> 9],
            ['id' => 10, 'title' => 'Capricorn', 'alias'=> 'capricorn','zodiacSign'=> 'capricorn.png','startDate'=> 'Dec 22','endDate'=> 'Jan 20', 'status'=> 1,'orderid'=> 10],
            ['id' => 11, 'title' => 'Aquarius', 'alias'=> 'aquarius','zodiacSign'=> 'aquarius.png','startDate'=> 'Jan 21','endDate'=> 'Feb 19', 'status'=> 1,'orderid'=> 11],
            ['id' => 12, 'title' => 'Pisces', 'alias'=> 'pisces','zodiacSign'=> 'pisces.png','startDate'=> 'Feb 20','endDate'=> 'Mar 20', 'status'=> 1,'orderid'=> 12]  
        ]);

    }
}
