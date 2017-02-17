<?php
include_once $_SERVER['DOCUMENT_ROOT']  . "/autoload.php";

use Models\Student;
use Repositories\StudentRepository;

$studentRepository = new StudentRepository();

//TODO: Convert the logic to get data form form!

for($i = 0; $i<10;$i++){
    $user = new Student();
    $user->email = "1234567$i@stu.vtc.edu.hk";
    $user->name = "Student $i";
    $studentRepository->save($user);
}
echo "Done!";
