
<?php
require "banco.php";
remover_tarefa($conexao,$_GET['id']);

header('location:tarefas.php');