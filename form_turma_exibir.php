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
        $comandoSQL = 'SELECT `id`, `nome` FROM `turmas`';
        $comando = $conexao->prepare($comandoSQL);
        $resultado = $comando->execute();
    ?>

<form action="recebe_turma_exibir.php">
    <p>Escolha A Turma Para Exibir Os Alunos:</p>
	
    <label for="id_turma">Escolha a Turma:</label>
    <select name="id_turma" id="id_turma">
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

