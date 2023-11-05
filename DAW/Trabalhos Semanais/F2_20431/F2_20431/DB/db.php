<?php

class DB{
    private $servername = "localhost";  // Endereço do servidor MySQL (normalmente localhost)
    private $username = "root";          // Nome de usuário do MySQL
    private $password = "";            // Senha do MySQL
    private $dbname = "school";       // Nome do banco de dados
    private $conn;

    /**
     * @return mixed
     */
    public function getConn()
    {
        return $this->conn;
    }

    public function connect(){
        // Criando a conexão
         $this->conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);

        // Verificando a conexão
        if ( $this->conn->connect_error) {
        die("Erro na conexão: " .  $this->conn->connect_error);
        }

        echo "Conexão bem-sucedida \n";
        }

    public function disconnect(){
        // Verificando a conexão
        if ( $this->conn->connect_error) {
            die("Erro na conexão: " .  $this->conn->connect_error);
        }
        $this->conn->close();
        echo "Conexão terminada \n";
    }
}

?>