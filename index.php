<?php
// Inicializar variables
$operacion = "";
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['operacion'])) {
        $operacion = $_POST['operacion'];
    }

    if (isset($_POST['valor'])) {
        $valor = $_POST['valor'];
        switch ($valor) {
            case '%':
                $operacion .= '/100';
                break;
            case 'ln':
                $operacion = "log($operacion)";
                break;
            case 'log10':
                $operacion = "log10($operacion)";
                break;
            case 'log2':
                $operacion = "log($operacion) / log(2)";
                break;
            case 'log3':
                $operacion = "log($operacion) / log(3)";
                break;
            case 'sqrt':
                $operacion = "sqrt($operacion)";
                break;
            case 'sin':
                $operacion = "sin(deg2rad($operacion))";
                break;
            case 'cos':
                $operacion = "cos(deg2rad($operacion))";
                break;
            case 'tan':
                $operacion = "tan(deg2rad($operacion))";
                break;
            case 'sec':
                $operacion = "1/cos(deg2rad($operacion))";
                break;
            case 'cosec':
                $operacion = "1/sin(deg2rad($operacion))";
                break;
            case 'cot':
                $operacion = "1/tan(deg2rad($operacion))";
                break;
            case 'arcsin':
                $operacion = "rad2deg(asin($operacion))";
                break;
            case 'arccos':
                $operacion = "rad2deg(acos($operacion))";
                break;
            case 'arctan':
                $operacion = "rad2deg(atan($operacion))";
                break;
            case 'rad2':
                $operacion = "pow($operacion, 1/2)";
                break;
            case 'rad3':
                $operacion = "pow($operacion, 1/3)";
                break;
            case 'radianes':
                $operacion = "deg2rad($operacion)";
                break;
            case 'gradianes':
                $operacion = "($operacion * pi()) / 200";
                break;
            case 'sexagesimales':
                $operacion = "($operacion * pi()) / 180";
                break;
            case '!':
                $operacion = factorial($operacion);
                break;
            case 'exp':
                $operacion = "exp($operacion)";
                break;
            case 'pow2':
                $operacion = "pow($operacion, 2)";
                break;
            case 'pow3':
                $operacion = "pow($operacion, 3)";
                break;
            case 'pow-1':
                $operacion = "pow($operacion, -1)";
                break;
            case 'pi':
                $operacion .= pi();
                break;
            case 'e':
                $operacion .= exp(1);
                break;
            case '^':
                $operacion .= '**';
                break;
            case 'ans':
                $operacion .= $resultado;
                break;
            default:
                $operacion .= $valor;
        }
    }

    if (isset($_POST['accion']) && $_POST['accion'] == 'calcular') {
        try {
            $resultado = eval("return $operacion;");
        } catch (Exception $e) {
            $resultado = "Error";
        }
    }

    if (isset($_POST['accion']) && $_POST['accion'] == 'limpiar') {
        $operacion = "";
        $resultado = "";
    }
}

function factorial($n) {
    if ($n < 0) {
        return "Error: El factorial de un número negativo no está definido.";
    }
    $fact = 1;
    for ($i = 2; $i <= $n; $i++) {
        $fact *= $i;
    }
    return $fact;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculadora Avanzada</title>
</head>
<body>
    <form method="post">
        <table>
            <tr>
                <td colspan="4">
                    <input type="text" name="operacion" placeholder="Operación" value="<?php echo htmlspecialchars($operacion); ?>">
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <input type="text" readonly placeholder="Resultado" value="<?php echo htmlspecialchars($resultado); ?>">
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="valor" value="9">9</button></td>
                <td><button type="submit" name="valor" value="8">8</button></td>
                <td><button type="submit" name="valor" value="7">7</button></td>
                <td><button type="submit" name="valor" value="/">/</button></td>
            </tr>
            <tr>
                <td><button type="submit" name="valor" value="6">6</button></td>
                <td><button type="submit" name="valor" value="5">5</button></td>
                <td><button type="submit" name="valor" value="4">4</button></td>
                <td><button type="submit" name="valor" value="*">*</button></td>
            </tr>
            <tr>
                <td><button type="submit" name="valor" value="3">3</button></td>
                <td><button type="submit" name="valor" value="2">2</button></td>
                <td><button type="submit" name="valor" value="1">1</button></td>
                <td><button type="submit" name="valor" value="-">-</button></td>
            </tr>
            <tr>
                <td><button type="submit" name="valor" value="%">%</button></td>
                <td><button type="submit" name="valor" value="0">0</button></td>
                <td><button type="submit" name="valor" value=".">.</button></td>
                <td><button type="submit" name="valor" value="+">+</button></td>
            </tr>
            <tr>
                <td><button type="submit" name="valor" value="ln">ln</button></td>
                <td><button type="submit" name="valor" value="log10">Log10</button></td>
                <td><button type="submit" name="valor" value="log2">Log2</button></td>
                <td><button type="submit" name="valor" value="log3">Log3</button></td>
            </tr>
            <tr>
                <td><button type="submit" name="valor" value="!">!</button></td>
                <td><button type="submit" name="valor" value="sin">Sin</button></td>
                <td><button type="submit" name="valor" value="cos">Cos</button></td>
                <td><button type="submit" name="valor" value="tan">Tan</button></td>
            </tr>
            <tr>
                <td><button type="submit" name="valor" value="pi">π</button></td>
                <td><button type="submit" name="valor" value="sec">Sec</button></td>
                <td><button type="submit" name="valor" value="cosec">Cosec</button></td>
                <td><button type="submit" name="valor" value="cot">Cot</button></td>
            </tr>
            <tr>
                <td><button type="submit" name="valor" value="e">e</button></td>
                <td><button type="submit" name="valor" value="arcsin">Arcsin</button></td>
                <td><button type="submit" name="valor" value="arccos">Arccos</button></td>
                <td><button type="submit" name="valor" value="arctan">Arctan</button></td>
            </tr>
            <tr>
                <td><button type="submit" name="valor" value="exp">Exp</button></td>
                <td><button type="submit" name="valor" value="^">^</button></td>
                <td><button type="submit" name="valor" value="pow2">^2</button></td>
                <td><button type="submit" name="valor" value="pow3">^3</button></td>
            </tr>
            <tr>
                <td><button type="submit" name="valor" value="sqrt">√</button></td>
                <td><button type="submit" name="valor" value="rad2">√x</button></td>
                <td><button type="submit" name="valor" value="rad3">∛x</button></td>
                <td><button type="submit" name="valor" value="pow-1">^-1</button></td>
            </tr>
            <tr>
                <td><button type="submit" name="valor" value="radianes">Rad</button></td>
                <td><button type="submit" name="valor" value="gradianes">Grad</button></td>
                <td><button type="submit" name="valor" value="sexagesimales">Deg</button></td>
                <td><button type="submit" name="valor" value="ans">Ans</button></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="accion" value="calcular">Calcular</button>
                </td>
                <td colspan="2">
                    <button type="submit" name="accion" value="limpiar">C</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
