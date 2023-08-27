<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Notas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Calculadora de Notas</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nota1 = floatval($_POST['nota1']);
            $nota2 = floatval($_POST['nota2']);
            $media = ($nota1 + $nota2) / 2;

            $mensagem = "";
            if ($media >= 6) {
                $mensagem = 'Aprovado<br>';
            } elseif ($media < 4) {
                $mensagem = 'Reprovado<br>';
            } elseif ($media >= 4 && $media < 6) {
                $mensagem = 'Exame final<br>';
            }

            echo '<div class="alert alert-primary mt-3" role="alert">';
            echo 'O valor da média: ' . $media . "<br/>\n";
            echo $mensagem;
            echo '</div>';
        }
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="nome">Nome do Aluno:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="nota1">Nota 1:</label>
                <input type="number" step="any" class="form-control" id="nota1" name="nota1" required>
            </div>
            <div class="form-group">
                <label for="nota2">Nota 2:</label>
                <input type="number" step="any" class="form-control" id="nota2" name="nota2" required>
            </div>
            <button type="submit" class="btn btn-primary" name="calcular">Calcular Média</button>
        </form>
        <br>
        <br>
        <a href="index.html" class="btn btn-secondary">Voltar para a Página Inicial</a>

    </div>
    
</body>
</html>




