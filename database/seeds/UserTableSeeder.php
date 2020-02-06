<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function run()
    {
        $this->model->truncate();

        $this->model->create([
            'name' => 'Ricardo Rocha',
            'email' => 'rocharor@gmail.com',
            'password' => '$2y$10$ikMLqVZKZq1U.eh4YzqeDOES/CALkqW2eBpKWFFbrJ7e9SJxKI/rG'// ricardo
        ]);
    }
}
