<?php

$servidor = 'localhost';
$banco = 'sistema_notas';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = "INSERT INTO `alunos` (`id`, `nome`, `id_turma`) VALUES (NULL, :nomealuno, :idturma);";


    try {
        $comando = $conexao->prepare($codigoSQL);

        $resultado = $comando->execute(array('nomealuno' => $_GET['nome'],'idturma' => $_GET['id_turma']));
        

        if($resultado){
            echo "Aluno Cadastrado Com Sucesso!";
        } else {
            echo "Erro ao executar o comando!";
        }
    } catch (Exception $e) {
        echo "Erro $e";
        }
        
        $conexao = null;

        //header("Location: form_dados_aluno.php");
?>