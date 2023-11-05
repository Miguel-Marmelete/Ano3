<?php

class Grade{
    private $subjectName;
    private $grade;
    private $status;

    public function __construct($grade, $subjectName){
        $this->grade = $grade;
        $this->subjectName = $subjectName;

    }

    private function setStatus(){
         $this->grade > 9.5 ? $this->status = "Approved" : $this->status = "Disapproved";
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param mixed $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    /**
     * @return mixed
     */
    public function getSubjectName()
    {
        return $this->subjectName;
    }

    /**
     * @param mixed $subjectName
     */
    public function setSubjectName($subjectName)
    {
        $this->subjectName = $subjectName;
    }
}














?>