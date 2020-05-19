<?php
    require "../app_lista_tarefas/tarefa.php";
    require "../app_lista_tarefas/TarefaService.php";
    require "../app_lista_tarefas/conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserir') {
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->create();

        header('Location: ./nova_tarefa.php?inclusao=1');
    } else if($acao == 'recuperar') {
        $tarefa = new Tarefa();
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->read();
    } else if($acao == 'atualizar') {
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_POST['id'])->__set('tarefa', $_POST['tarefa']);
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        if($tarefaService->update()) {
            header('location: todas_tarefas.php');
        }
    } else if ($acao == 'remover') {
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->delete();

        header('location: todas_tarefas.php');
    } else if ($acao == 'marcarRealizada') {
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id'])->__set('id_status', 2);
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->check();

        header('location: todas_tarefas.php');
    }