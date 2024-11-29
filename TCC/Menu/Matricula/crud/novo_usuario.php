<?php
    switch ($_REQUEST("acao")){
        case 'cadastrar':
            $nome = $_POST["name"];
            $data_nascimento = $_POST["data_nasc"];
            $telefone = $_POST["telefone"];
            $endereco = $_POST["endereco"];
            $frequencia = $_POST["frequencia"];
            $objetivo = $_POST["objetivo"];
            $data_matricula = $_POST["data_inicio"];

            $sql = "INSERT INTO aluno (nome, data_nascimento, telefone,
            endereco, frequencia, objetivo, data_matricula) VALUES ('{name}', '{data_nasc}',
            '{telefone}','{endereco}','{frequencia}','{objetivo}','{data_inicio}')";

            $res = $conexao->query($sql);
            break;

        case 'editar':

        break;

        case 'excluir':

        break;
    }