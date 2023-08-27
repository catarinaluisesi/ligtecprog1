<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de IMC</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Calculadora de IMC</h1>
        <form id="imcForm">
            <div class="form-group">
                <label for="peso">Peso (kg):</label>
                <input type="number" step="any" class="form-control" id="peso" name="peso" required>
            </div>
            <div class="form-group">
                <label for="altura">Altura (m):</label>
                <input type="number" step="any" class="form-control" id="altura" name="altura" required>
            </div>
            <button type="submit" class="btn btn-primary">Calcular IMC</button>
        </form>
        
        <div id="result" class="mt-4"></div>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $peso = floatval($_POST['peso']);
            $altura = floatval($_POST['altura']);
            
            // Calcula o IMC
            $imc = $peso / ($altura * $altura);
            
            // Determina a categoria do IMC
            if ($imc < 17) {
                $categoria = 'Muito Abaixo do Peso';
            } elseif ($imc < 18.5) {
                $categoria = 'Abaixo do Peso';
            } elseif ($imc < 24.9) {
                $categoria = 'Peso Normal';
            } elseif ($imc < 30) {
                $categoria = 'Acima do Peso';
            } elseif ($imc < 35) {
                $categoria = 'Obesidade I';
            } elseif ($imc < 40) {
                $categoria = 'Obesidade II - Severa';
            } else {
                $categoria = 'Obesidade III - Mórbida';
            }
            
            echo "<h2>Resultado do IMC</h2>";
            echo "<p><strong>Peso:</strong> {$peso} kg</p>";
            echo "<p><strong>Altura:</strong> {$altura} m</p>";
            echo "<p><strong>IMC:</strong> " . number_format($imc, 2) . "</p>";
            echo "<p><strong>Categoria:</strong> {$categoria}</p>";
        }
        ?>
        <br>
        <br>
        <a href="index.html" class="btn btn-secondary">Voltar para a Página Inicial</a>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#imcForm').submit(function(e) {
                e.preventDefault();
                
                var peso = $('#peso').val();
                var altura = $('#altura').val();
                
                $.ajax({
                    type: 'POST',
                    url: 'form_imc.php',
                    data: { peso: peso, altura: altura },
                    success: function(result) {
                        $('#result').html(result);
                    }
                });
            });
        });
    </script>
</body>
</html>
