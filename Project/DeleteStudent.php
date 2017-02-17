<?php
include_once $_SERVER['DOCUMENT_ROOT']  . "/autoload.php";

use Models\Student;
use Repositories\StudentRepository;

$studentRepository = new StudentRepository();
$student = $studentRepository->destroy($_GET['id']);

header("Location: ListStudents.php");