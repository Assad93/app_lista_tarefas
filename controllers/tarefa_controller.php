<?php
    require "../entities/tarefa.php";
    require "../service/TarefaService.php";
    require "../util/conexao.php";

    

    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->create();

    header('Location: ../nova_tarefa.php?inclusao=1');