<?php
include_once $_SERVER['DOCUMENT_ROOT']  . "/autoload.php";
//Set up page title!
$title = "Show Students";

//If you need header include other javascript or CSS
function headerExtra()
{
    ?>


    <?php
}

include_once "Header.php";

//Logic related to Database!
use Models\Student;
use Repositories\StudentRepository;

$studentRepository = new StudentRepository();
$student = $studentRepository->find($_GET['id']);
?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Panel heading</div>
    <div class="panel-body">
        <p>Demo</p>
    </div>

    <!-- List group -->
    <ul class="list-group">
        <li class="list-group-item"><?=htmlentities($student->id, ENT_QUOTES | ENT_HTML5, 'UTF-8');?></li>
        <li class="list-group-item"><?=htmlentities($student->name, ENT_QUOTES | ENT_HTML5, 'UTF-8');?></li>
        <li class="list-group-item"><?=htmlentities($student->email, ENT_QUOTES | ENT_HTML5, 'UTF-8');?></li>
    </ul>
</div>
<?php
//If you need add javascript before the end of body!
function bodyEndExtra()
{
    ?>
    <script>
        console.log("This is Body End code");
    </script>

    <?php
}

include_once "Footer.php";
?>

