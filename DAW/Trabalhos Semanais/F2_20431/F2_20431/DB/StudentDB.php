<?php
require_once '../student_class.php';
require_once 'db.php';
require_once '../grade_class.php';
class StudentDB extends Student {
        private $db;
        private function initDB(){
            $this->db = new DB();
            $this->db->connect();
        }
        function createStudent(){
            $this->initDB();
            $conn = $this->db->getConn();

            $this->testConn($conn);
            $name = $this->getName();
            $number = $this->getNumber();
            $email = $this->getEmail();
            $program = $this->getProgram();
            $subjectList = json_encode($this->getSubjectList());

            $sql = "INSERT INTO students (name, number, email, program, subjectList) 
            VALUES ('$name', '$number', '$email', '$program', '$subjectList')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $this->db->disconnect();
        }


    function readStudent(){
        $this->initDB();
        $conn = $this->db->getConn();
        $this->testConn($conn);

        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "Nome: ". $row['name'] . "Numero: ". $row['number'] . "Email: ". $row['email'] . "SubjectList: ". json_decode($row['subjectList']) ."\n";
            }
        }else{
            echo  " 0 results";
        }

        $this->db->disconnect();

    }
    function updateStudent($name, $email, $program){
        $this->initDB();
        $conn = $this->db->getConn();
        $this->testConn($conn);


        $sql = "UPDATE students SET name = '$name',email = '$email',program = '$program' WHERE number = '20431'" ;

        if ($conn->query($sql) === TRUE) {
            echo "Record Updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $this->db->disconnect();
    }
    function deleteStudent($studentNum){
        $this->initDB();
        $conn = $this->db->getConn();
        $this->testConn($conn);

        $sql = "DELETE FROM students WHERE number =$studentNum ";

        if ($conn->query($sql) === TRUE) {
            echo "Record Deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $this->db->disconnect();
    }
    function testConn($conn){
        if ( $conn->connect_error) {
            die("Erro na conexão: " .  $conn->connect_error);
        }
    }
}

?>