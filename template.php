<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilo.css">
        
    <link rel="shortcut icon" href="img/calendario.png" type="image/x-icon">
    <title>Gerenciador de tarefas</title>
</head>

<body>

    <h1>Gerenciador de Tarefas</h1>

    <?php require 'formulario.php';?>
    <?php if($exibir_tabela):?>
    <?php require 'tabela.php'; ?>
    <?php endif; ?>




</body>

</html>