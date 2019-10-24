<?php
session_start();

require "banco.php";
require "ajudantes.php";
$exibir_tabela = true;
$tem_erros = false;
$erros_validacao = [];
if (tem_post()) {

    if (array_key_exists('nome', $_POST) && strlen($_POST['nome']) > 0) { //     strlen($_POST['nome'])>0) conta o tamanho da String

        $tarefa['nome'] = $_POST['nome'];

    } else {
        $tem_erros = true;
        $erros_validacao['nome'] = 'O nome da Tarefa na é obrigatorio!';
    }

    if (array_key_exists('descricao', $_POST)) {
        $tarefa['descricao'] = $_POST['descricao'];
    } else {
        $tarefa['descricao'] = '';
    }
    if (array_key_exists('prazo', $_POST)
        && strlen($_POST['prazo']) > 0) {
        if (validar_data($_POST['prazo'])) {
            $tarefa['prazo'] =
                traduz_data_para_banco($_POST['prazo']);
        } else {
            $tem_erros = true;
            $erros_validacao['prazo'] =
                'O prazo não é uma data válida!';
        }
    } else {
        $tarefa['prazo'] = '';
    }
    $tarefa['prioridade'] = $_POST['prioridade'];
    if (array_key_exists('concluida', $_POST)) {
        $tarefa['concluida'] = 1;
    } else {
        $tarefa['concluida'] = 0;
    }
    if (!$tem_erros) {
        gravar_tarefa($conexao, $tarefa);
        header('location: tarefas.php');
        die();
    }

}

$lista_tarefas = buscar_tarefas($conexao);


$tarefa = [
    'id'
    => 0,
    'nome'
    => (array_key_exists('nome', $_POST)) ?
        $_POST['nome'] : '',
    'descricao' => (array_key_exists('descricao', $_POST)) ?
        $_POST['descricao'] : '',
    'prazo'
    => (array_key_exists('prazo', $_POST)) ?
        traduz_data_para_banco($_POST['prazo']) : '',
    'prioridade' => (array_key_exists('prioridade', $_POST)) ?
        $_POST['prioridade'] : 1,
    'concluida' => (array_key_exists('concluida', $_POST)) ?
        $_POST['concluida'] : ''
];
include 'template.php';