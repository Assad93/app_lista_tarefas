<?php 
    class TarefaService {

        private $conexao;
        private $tarefa;

        public function __construct(Conexao $conexao, Tarefa $tarefa){
            $this->conexao = $conexao->conectar();
            $this->tarefa = $tarefa;
        }

        public function create() {
            $sql = 'INSERT INTO tb_tarefas(tarefa) VALUES(:tarefa)';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
            $stmt->execute();
        }

        public function read() {
            $sql = 'SELECT
                         t.id, s.status, t.tarefa
                    FROM 
                         tb_tarefas AS t
                         LEFT JOIN tb_status AS s ON (t.id_status = s.id)
            ';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function update() {

        }

        public function delete() {
            
        }
    }