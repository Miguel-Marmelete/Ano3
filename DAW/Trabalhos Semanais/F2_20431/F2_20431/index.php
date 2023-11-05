<?php
require_once 'grade_class.php';
require_once 'student_class.php';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $grade = new Grade($_POST['subjectGrade'],$_POST['subjectName']);
    $student1 = new Student(
        $_POST['studentName'],
        $_POST['studentNum'],
        $_POST['studentEmail'],
        $_POST['studentProgram'],
        array($grade));

    $details = $student1->getDetails();

    foreach ($details as $key => $value) {
        echo "$key: ";
        if (is_array($value)) {
            foreach ($value as $subject) {
                foreach ($subject as $field => $fieldValue) {
                    echo "$field: $fieldValue, ";
                }
                echo "<br>";
            }
        } else {
            echo "$value<br>";
        }
    }


}
