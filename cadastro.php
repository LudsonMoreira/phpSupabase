<?php
    $mensagem = "";
    $tipoMensagem = "";
    $host = "aws-1-sa-east-1.pooler.supabase.com";
    $port = "6543";
    $database = "postgres";
    $user = "postgres.tlitabytsmcfrbhdetno";
    $password = "reQ7RgmSJPcp2wHZ";

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
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $reptsenha = $_POST['reptsenha'];
        
        if($senha !== $reptsenha){
            $mensagem = "As senhas não conferem!";
            $tipoMensagem = "Erro!";
        }else{
            $sql = "INSERT INTO cadastro (nome, email, senha)
            VALUES (:nome, :email, :senha)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':senha' => $senha         
            ]);
            $mensagem = "Cadastro realizado com sucesso!";
            $tipoMensagem = "Sucesso!";
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
    <h1>Cadastro</h1>
    <form method="post" action="">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome"><br/>
        <label for="email">Email</label>
        <input type="email" id="email" name="email"><br/>
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha"><br/>
        <label for="reptsenha">Repetir Senha</label>
        <input type="password" id="reptsenha" name="reptsenha"><br/>
        <input type="submit" value="Entrar">
        <input type="reset" value="Limpar"><br/>
        <a href="index.php">Já é de casa? Entre!</a>
    </form>
        
    <?php if($mensagem !== ""):?>
        <script>
            alert(<?= json_encode($mensagem) ?>)
        </script>
    <?php endif; ?>
</body>
</html>