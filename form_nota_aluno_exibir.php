<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir Alunos</title>
</head>
<body>
    <?php
        
        $servidor = 'localhost';
        $banco = 'sistema_notas';
        $usuario = 'root';
        $senha = '';

        $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
        $comandoSQL = 'SELECT `id`, `nome` FROM `alunos`';
        $comando = $conexao->prepare($comandoSQL);
        $resultado = $comando->execute();
    ?>

<form action="recebe_nota_aluno_exibir.php">
    <p>Escolha O Auno Para Exibir As Notas:</p>
	
    <label for="id_turma">Escolha o Aluno:</label>
    <select name="id_aluno" id="id_aluno">
    <?php
    while ($linha = $comando->fetch()) {
        echo  "<option value='{$linha['id']}'>{$linha['nome']}</option>";

        }
    ?>
    </select>
	<input type="submit">
    </form>
    <?php 
    $conexao = null;
    ?>
</body>
</html>

