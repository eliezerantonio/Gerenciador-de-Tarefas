<?php

function traduz_prioridade($codigo)
{
    $prioridade = '';
    switch ($codigo) {
        case 1:
            $prioridade = 'Baixa';
            break;
        case 2:
            $prioridade = 'Media';
            break;
        case 3:
            $prioridade = 'Alta';

            break;
    }
    return $prioridade;

}

function traduz_data_para_banco($data)
{
    if ($data == "") {
        return "";
    }
    $partes = explode("/", $data);
    if (count($partes) != 3) {
        return $data;
    }
    $objeto_data = DateTime::createFromFormat('d/m/Y', $data);
    return $objeto_data->format('Y-m-d');
}


function traduz_data_para_exibir($data)
{
    if ($data == "" OR $data == "0000-00-00") {
        return "";
    }
    $partes = explode("-", $data);
    if (count($partes) != 3) {
        return $data;
    }
    $objeto_data = DateTime::createFromFormat('Y-m-d', $data);
    return $objeto_data->format('d/m/Y');
}

function traduz_concluida($concluida){

    if($concluida==1){
        return'Sim';
    }

    return 'Não';
}


function tem_post(){

    if(count($_POST)>0){
        return true;
    }
    return false;
}

function validar_data($data)
{
    $padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    $resultado = preg_match($padrao, $data);
    if ($resultado == 0) {
        return false;
    }
    $dados = explode('/', $data);
    $dia = $dados[0];
    $mes = $dados[1];
    $ano = $dados[2];
    $resultado = checkdate($mes, $dia, $ano); //PHP possui a função checkdate() que verifica se uma data é válida.
    return $resultado;
}
