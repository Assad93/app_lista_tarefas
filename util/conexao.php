<?php
    class Conexao {
        private $host = 'localhost';
        private $dbname = 'php_com_pdo';
        private $username = 'root';
        private $password = '';

        public function Conectar() {
            try {
                $conexao = new PDO(
                    "mysql:host=$this->localhost;dbname=$this->dbname", 
                    "$this->username",
                    "$this->password"
                );

                return $conexao;
            } catch (PDOException $e) {
                echo '<p>'.$e->getMessage().'</p>';
            }
        }
    }