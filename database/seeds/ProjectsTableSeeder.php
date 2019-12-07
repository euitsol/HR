<?php

use Illuminate\Database\Seeder;
use App\Project;
use App\Department;
use App\Task;
use App\Userassign;
use Illuminate\Support\Facades\DB;


class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 5; $i++) {
            Project::create([
                'branch_id' => 1,
                'title' => $faker->unique()->colorName,
            ]);
        }
        $projects = Project::all();
        foreach ($projects as $p) {
            $D = rand(2, 7);
            for ($i = 0; $i < $D; $i++) {
                Department::create([
                    'project_id' => $p->id,
                    'title' => $faker->unique()->colorName,
                ]);
            }
            $departments = Department::where('project_id', $p->id)->get();
            foreach ($departments as $d) {
                $T = rand(2, 7);
                for ($i = 0; $i < $T; $i++) {
                    $S = rand(2, 6);
                    Task::create([
                        'project_id' => $p->id,
                        'department_id' => $d->id,
                        'title' => $faker->unique()->userName,
                        'deadline' => $faker->dateTimeBetween('+5 days', '+70 days'),
                        'remark' => $faker->paragraph($S),
                        'progress' => rand(0, 1),
                        'submit' => rand(0, 1),
                    ]);
                }
                $tasks = Task::where('project_id', $p->id)->where('department_id', $d->id)->get();
                foreach ($tasks as $t) {
                    $U = rand(1, 4);
                    for ($i = 0; $i < $U; $i++) {
                        Userassign::create([
                            'user_id' => rand(1, 4),
                            'project_id' => $p->id,
                            'department_id' => $d->id,
                            'task_id' => $t->id,
                        ]);
                    }
                }
            }
        }
        DB::table('userassigns as n1')->join('userassigns as n2', 'n1.id', '>', 'n2.id')->where('n1.user_id', '=', 'n2.user_id')->where('n1.task_id', '=', 'n2.task_id')->delete();
    }
}
