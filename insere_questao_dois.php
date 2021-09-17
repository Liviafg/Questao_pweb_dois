<?php 

if (!isset($_SESSION)) {

    session_start(); //precisa ser no começo logo pra nao dar erro

}

    require "classe.usuario.questaodois.php";

    $usuario = new Usuario ($_POST['nome'], $_POST['telefone']);

    $nome = $usuario->getNome();
    $telefone = $usuario->getTelefone();

    $_SESSION['nome'] = $usuario->getNome();// a sessao recebendo os dados 
    $_SESSION['telefone'] = $usuario->getTelefone();
   
    $id = session_id(); 

    $username = "root";
    $password = "";

  try {

    $conexao = new PDO('mysql:host=localhost;dbname=questao_recuperacao', $username, $password);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conexao->prepare('SELECT nome, telefone FROM usuarios_rec WHERE  
 		nome = :nome AND
         telefone = :telefone'
);

                $stmt->bindValue(':nome', $usuario->getNome(), PDO::PARAM_STR);

                $stmt->bindValue(':telefone', $usuario->getTelefone(), PDO:: PARAM_STR);


    $stmt->execute();

    $resultado = $stmt->fetchAll();


    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
}

    echo "Seus dados foram armazenados";


    
    ?>


    <html>

 <a href = "dados_usuario_rec.php"> Veja seus dados </a>

	</html>
