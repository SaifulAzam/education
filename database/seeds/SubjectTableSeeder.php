<?php

use Illuminate\Database\Seeder;
use App\Repositories\Subject\Subject;

class SubjectTableSeeder extends Seeder {

    public function run()
    {
        DB::table('subjects')->delete();
        $subjects = ['数学', '语文', '科学', '物理', '化学', '政治', '历史', '英语', '生物', '编程'];

        foreach(range(0, 9) as $index)
        {
            Subject::create([
                'name'      => $subjects[$index]
            ]);
        }
    }

}