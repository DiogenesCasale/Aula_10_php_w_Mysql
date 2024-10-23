<?php

$servidor = 'localhost';
$banco = 'sistema_notas';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
$codigoSQL =  "SELECT `valor`, `id_turma` FROM `notas` WHERE `id_aluno` = :id_alunos";

    try {
        $comando = $conexao->prepare($codigoSQL);
        $resultado = $comando->execute(array('id_alunos' => $_GET['id_aluno']));
        
        if($resultado){
            ?>
            <table border="1">
            <tr>
            <th>Notas</th>
            <th>ID Turma Referente</th> 
            </tr>
            <?php  
            while ($linha = $comando->fetch()) {
            ?>
                    <tr>
                        <td><?php echo $linha['valor']; ?></td>
                        <td><?php echo $linha['id_turma']; ?></td>
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

        //header("Location: form_nota_aluno_exibir.php");
?>