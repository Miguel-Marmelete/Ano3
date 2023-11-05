<?php
require_once 'grade_class.php';

class Student {
    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getProgram()
    {
        return $this->program;
    }
    private $number;
    private $email;
    private $program;
    private $subjectList = [];

    /**
     * @param $name
     * @param $number
     * @param $email
     * @param $program
     * @param array $subjectList
     */
    public function __construct($name, $number, $email, $program, array $subjectList)
    {
        $this->name = $name;
        $this->number = $number;
        $this->email = $email;
        $this->program = $program;
        $this->subjectList = $subjectList;
    }


    public function setName($name) {
        $this->name = $name;
    }

    public function setNumber($number) {
        $this->number = $number;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setProgram($program) {
        $this->program = $program;
    }

    public function addGrade($subjectName, $grade) {
        $gradeObject = new Grade($subjectName, $grade);
        $this->subjectList[] = $gradeObject;
    }

    public function getDetails() {
        return [
            "name" => $this->name,
            "number" => $this->number,
            "email" => $this->email,
            "program" => $this->program,
            "subjectList" => $this->subjectList
        ];
    }

    public function getSubjectList() {
        return $this->subjectList;
    }

    public function subjectGradesAverage() {
        $grades = array_column($this->subjectList, 'getGrade');
        $average = count($grades) > 0 ? array_sum($grades) / count($grades) : 0;
        return $average;
    }

}

?>
