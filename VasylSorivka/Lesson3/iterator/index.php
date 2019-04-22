<?php

require_once 'GroupStudents.php';
require_once 'Student.php';


$groupStudents = new GroupStudents();
$student1 = new Student('ivan');
$student2 = new Student('petro');

$groupStudents->addStudent($student1);
$groupStudents->addStudent($student2);

foreach ($groupStudents as $student) {
    echo $student->getStudentName() . PHP_EOL;
}
echo $groupStudents->count();
$groupStudents->removeStudent($student2);
echo $groupStudents->count();

