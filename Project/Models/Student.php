<?php
namespace Models;
include_once $_SERVER['DOCUMENT_ROOT']  . "/autoload.php";

class Student extends ModelBase
{
    public $name;
    public $email;
}