<?php


$bd_servidor = 'localhost';
$bd_usuario = 'root';
$bd_senha = '1223';
$bd_banco = 'tarefas';


$conexao = mysqli_connect($bd_servidor, $bd_usuario, $bd_senha, $bd_banco);
if (mysqli_connect_errno($conexao)) {
    echo "Problemas em conectar com o Banco. Erri";
    echo mysqli_connect_error();
    die();
}


function buscar_tarefas($conexao)
{
    $sqlBuscar = 'select * from tarefas';
    $resultado = mysqli_query($conexao, $sqlBuscar);

    $tarefas = [];

    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        $tarefas[] = $tarefa;
    }
    return $tarefas;
}

function gravar_tarefa($conexao, $tarefa)
{
$sqlGravar = "
INSERT INTO tarefas
(nome, descricao, prioridade, prazo,concluida)
VALUES
(
'{$tarefa['nome']}',
'{$tarefa['descricao']}',
{$tarefa['prioridade']},
'{$tarefa['prazo']}',{$tarefa['concluida']}
)
";
mysqli_query($conexao, $sqlGravar);
}
function buscar_tarefa($conexao, $id) {
    $sqlBusca = 'SELECT * FROM tarefas WHERE id = ' . $id;
    $resultado = mysqli_query($conexao, $sqlBusca);
    return mysqli_fetch_assoc($resultado);
    }

function editar_tarefa($conexao, $tarefa)
{
$sqlEditar = "
UPDATE tarefas SET
nome = '{$tarefa['nome']}',
descricao = '{$tarefa['descricao']}',
prioridade = {$tarefa['prioridade']},
prazo = '{$tarefa['prazo']}',
concluida = {$tarefa['concluida']}
WHERE id = {$tarefa['id']}
";
mysqli_query($conexao, $sqlEditar);
}

function remover_tarefa($conexao, $id)
{
    $sqlRemover = "Delete from tarefas WHERE id={$id}";
    mysqli_query($conexao, $sqlRemover);

}