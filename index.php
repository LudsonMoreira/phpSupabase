<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Projeto PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f0f4f8;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 500px;
        }
        h1 {
            color: #4f46e5;
            margin-bottom: 10px;
        }
        p {
            color: #555;
            line-height: 1.6;
        }
        .info {
            background: #f0f4ff;
            border-left: 4px solid #4f46e5;
            padding: 12px 16px;
            margin-top: 20px;
            border-radius: 4px;
            text-align: left;
        }
        .info span {
            font-weight: bold;
            color: #4f46e5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo ao PHP!</h1>
        <p>Seu ambiente PHP com Apache está funcionando corretamente.</p>
        <div class="info">
            <p><span>Versão PHP:</span> <?php echo phpversion(); ?></p>
            <p><span>Servidor:</span> <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Apache'; ?></p>
            <p><span>Data/Hora:</span> <?php echo date('d/m/Y H:i:s'); ?></p>
        </div>
    </div>
</body>
</html>
