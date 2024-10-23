<?php

$servidor = 'localhost';
$banco = 'sistema_notas';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
$codigoSQL =  "SELECT `id`, `nome` FROM `alunos` WHERE `id_turma` = :id_alunos";

    try {
        $comando = $conexao->prepare($codigoSQL);
        $resultado = $comando->execute(array('id_alunos' => $_GET['id_turma']));
        
        if($resultado){
            ?>
            <table border="1">
            <tr>
            <th>ID</th>
            <th>Nome</th> 
            </tr>
            <?php  
            while ($linha = $comando->fetch()) {
            ?>
                    <tr>
                        <td><?php echo $linha['id']; ?></td>
                        <td><?php echo $linha['nome']; ?></td>
                    </tr>
       
        <?php
        }
        echo "</table>";
        } else {
            echo "Erro ao executar o comando!";
        }
    } catch (Exception $e) {
        echo "Erro $e";
        }
        
        $conexao = null;

        //header("Location: form_dados_aluno.php");
?>