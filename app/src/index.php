<?php
require_once __DIR__.'/vendor/autoload.php';

use App\Todo\Repository as TodoRepository;
use App\User\Repository as UserRepository;

$todoRepo = new TodoRepository();

$todos = $todoRepo->getAll(['\App\Todo\Entity', 'restore']);
// 仮想的に件数を100倍にする
for ($i = 0; $i < 100; $i++) {
    foreach ($todos as $todo) {
        $todo->printEntity();
        $userRepo = new UserRepository();
        $user     = $userRepo->getById($todo->getAssigneeId(), ['\App\User\Entity', 'restore']);
        $user->printEntity();
        echo '<hr>';
    }
}