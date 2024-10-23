<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Notas Aluno</title>
</head>
<body>
    <?php
        $servidor = 'localhost';
        $banco = 'sistema_notas';
        $usuario = 'root';
        $senha = '';
        $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

        $comandoSQL = 'SELECT `id`, `nome`, `id_turma` FROM `alunos`';
        $comando = $conexao->prepare($comandoSQL);
        $resultado = $comando->execute();

        $comandoSQL1 = 'SELECT `id`, `nome` FROM `turmas`';
        $comando1 = $conexao->prepare($comandoSQL1);
        $resultado1 = $comando1->execute();
    ?>
<form action="recebe_notas_alunos.php">
    <p>Registro de Notas:</p>
	<label for="valor">Nota Do Aluno:</label>
	<input type="number" name="valor"><br>
    <label for="id_aluno">Escolha o Aluno:</label>
    <select name="id_aluno" id="id_aluno">
    <?php
    while ($linha = $comando->fetch()) {
        echo  "<option value='{$linha['id']}'>{$linha['nome']} Turma: {$linha['id_turma']}</option>";
        }
    ?>
    </select>
    <label for="id_turma">Escolha a Turma:</label>
    <select name="id_turma" id="id_turma">
    <?php
    while ($linha = $comando1->fetch()) {
        echo  "<option value='{$linha['id']}'>{$linha['nome']} ID: {$linha['id']}</option>";
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

