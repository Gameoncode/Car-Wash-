<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Wash</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-top: 30px;
            color: #333;
        }
        form {
            text-align: center;
            margin-top: 20px;
        }
        label {
            display: block;
            font-size: 18px;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .result-container {
            margin-top: 30px;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .result-heading {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .result-info {
            margin-bottom: 10px;
            font-size: 16px;
            color: #555;
        }
        .promotion {
            background-color: #dff0d8;
            border: 1px solid #c3e6cb;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .comment {
            background-color: #d9edf7;
            border: 1px solid #bcdff1;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Car Wash</h1>
        
        <form method="post">
            <label for="tipo_lavado">Tipo de Lavado:</label>
            <select name="tipo_lavado" id="tipo_lavado">
                <option value="basico">Básico</option>
                <option value="intermedio">Intermedio</option>
                <option value="completo">Completo</option>
            </select>
            
            <label for="dia">Día:</label>
            <input type="text" name="dia" id="dia" placeholder="Escribe el día (ej: lunes)">
            
            <input type="submit" value="Enviar">
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tipoLavado = $_POST["tipo_lavado"];
            $dia = strtolower($_POST["dia"]);
            
            echo "<div id='resumenLavado' class='result-container'>";
            echo "<h2 class='result-heading'>Resumen del lavado:</h2>";
            echo "<p class='result-info'>Tipo de Lavado: $tipoLavado</p>";
            echo "<p class='result-info'>Día: $dia</p>";
            echo "</div>";
            
            echo "<div id='promocionDia' class='result-container'>";
            switch ($dia) {
                case "lunes":
                    echo "<div class='promotion'><p class='result-info'>Promoción del Día: 10% de descuento en lavados completos.</p></div>";
                    break;
                case "martes":
                    echo "<div class='promotion'><p class='result-info'>Promoción del Día: 2x1 en lavados básicos.</p></div>";
                    break;
                default:
                    echo "<div class='promotion'><p class='result-info'>No hay promoción para este día.</p></div>";
            }
            echo "</div>";
            
            echo "<div id='comentariosSatisfaccion' class='result-container'>";
            echo "<h2 class='result-heading'>Comentarios de Satisfacción:</h2>";
            $contador = 1;
            while ($contador <= 5) {
                echo "<div class='comment'><p class='result-info'>Comentario $contador: Satisfecho 100%</p></div>";
                $contador++;
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
