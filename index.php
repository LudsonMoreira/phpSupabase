<?php
    $mensagem = "";
    $tipoMensagem = "";
    $host = "";
    $port = "6543";
    $database = "postgres";
    $user = "postgres.tlitabytsmcfrbhdetno";
    $password = "";

    try{
        $dsn = "pgsql:host=$host;port=$port;dbname=$database;sslmode=require";
        $pdo = new PDO($dsn, $user, $password);
        $mensagem = "Conectado com sucesso!";
        $tipoMensagem = "Sucesso!";
    }catch(PDOException $e){
        die("Erro ao conectar no Supabase: " . $e->getMessage());
        $mensagem = "Falha ao conectar ao Supabase!";
        $tipoMensagem = "Erro!";
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT email, senha FROM cadastro WHERE 
        email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':email' => $email
        ]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if($usuario['senha'] == $senha){
            header('Location: dashboard.php');
            exit;
        }else{
            $mensagem = "Usuário ou senha incorretos!";
            $tipoMensagem = "Erro!";
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="">
        <label for="email">Email</label>
        <input type="email" id="email" name="email"><br/>
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha"><br/>
        <input type="submit" value="Entrar">
        <input type="reset" value="Limpar"><br/>
        <a href="cadastro.php">Novo por aqui? Cadastre-se</a>
    </form>
</body>
</html>