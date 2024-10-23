<?php

$servidor = 'localhost';
$banco = 'sistema_notas';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL =  "SELECT `id` FROM `turmas`";
$comando = $conexao->prepare($codigoSQL);
$resultado= $comando->execute();

$codigoSQL1 =  "SELECT `id` FROM `alunos`";
$comando1 = $conexao->prepare($codigoSQL1);
$resultado1 = $comando1->execute();

$confere = 0;
$nota = 0;

while ($linha=$comando->fetch()){
if($linha['id']==$_GET['id_turma'])
$confere++;
}
while ($linha=$comando1->fetch()){
if($linha['id']==$_GET['id_aluno'])
$confere++;
}
if (isset($_GET['valor'])) {
    $nota = intval($_GET['valor']);
}
if($nota > -1 && $nota < 11){
    $confere++;
}

if($confere != 3){
    header("Location: form_dados_notas_alunos.php");
} else {

$codigoSQL = "INSERT INTO `notas` (`id`, `valor`, `id_aluno`, `id_turma`) VALUES (NULL, :notaaluno, :idaluno, :idturma);";

    try {
        $comando = $conexao->prepare($codigoSQL);

        $resultado = $comando->execute(array('notaaluno' => $_GET['valor'], 'idaluno' => $_GET['id_aluno'], 'idturma' => $_GET['id_turma']));
        

        if($resultado){
            echo "Nota Cadastrada Com Sucesso!";
        } else {
            echo "Erro ao executar o comando!";
        }
    } catch (Exception $e) {
        echo "Erro $e";
        }
        
        $conexao = null;
    }
?>
