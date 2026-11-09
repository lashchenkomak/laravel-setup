<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory()
            ->count(3)
            ->create();

        $statuses = [
            'new',
            'in_progress',
            'done',
            'new',
            'in_progress',
        ];

        foreach ($users as $user) {

            $projects = Project::factory()
                ->count(2)
                ->create([
                    'user_id' => $user->id,
                ]);

            foreach ($projects as $project) {

                foreach ($statuses as $status) {

                    $task = Task::factory()->create([
                        'project_id' => $project->id,

                        'author_id' => $user->id,

                        'assigned_to' =>
                            $users->random()->id,

                        'status' => $status,
                    ]);

                    $commentUsers = $users
                        ->shuffle()
                        ->take(random_int(2, 3));

                    foreach (
                        $commentUsers
                        as $commentUser
                    ) {
                        Comment::factory()->create([
                            'task_id' => $task->id,

                            'user_id' =>
                                $commentUser->id,
                        ]);
                    }
                }
            }
        }
    }
}
