# Calculadora Avanzada en PHP

Esta es una calculadora avanzada desarrollada en PHP que soporta una variedad de operaciones matemáticas, incluyendo funciones trigonométricas, logarítmicas y matemáticas avanzadas.

## Requisitos

- Un servidor web que soporte PHP (por ejemplo, XAMPP, WAMP, LAMP, etc.)
- PHP 7.0 o superior

## Instalación

1. **Descarga** o **clona** el repositorio del proyecto.
2. Coloca el archivo PHP en el directorio raíz de tu servidor web.
3. Asegúrate de que el servidor web esté corriendo y accede al archivo PHP a través de tu navegador.

## Uso

1. **Abre tu navegador** y dirígete a la dirección del archivo PHP en tu servidor web local, por ejemplo, `http://localhost/nombre_de_la_carpeta/index.php`.

2. **Operaciones**:
   - **Número**: Ingresa números y operadores en el campo de operación.
   - **Botones de operaciones**: Usa los botones para realizar operaciones matemáticas y funciones especiales.
   - **Calcular**: Presiona el botón "Calcular" para obtener el resultado.
   - **Limpiar**: Presiona el botón "C" para borrar la operación actual y el resultado.

## Funcionalidades

La calculadora soporta las siguientes operaciones y funciones matemáticas:

- **Operaciones básicas**: `+`, `-`, `*`, `/`
- **Funciones matemáticas avanzadas**:
  - **Logaritmos**: `ln`, `log10`, `log2`, `log3`
  - **Trigonometría**: `sin`, `cos`, `tan`, `sec`, `cosec`, `cot`
  - **Ángulos**: Convertir entre radianes, gradianes y grados (`radianes`, `gradianes`, `sexagesimales`)
  - **Factorial**: `!`
  - **Exponentes**: `exp`, `^`, `pow2`, `pow3`, `pow-1`
  - **Raíces**: `sqrt`, `rad2` (raíz cuadrada), `rad3` (raíz cúbica)
  - **Funciones inversas**: `arcsin`, `arccos`, `arctan`
  - **Constantes**: `pi`, `e`
  - **Ans**: Usa el resultado anterior (`ans`)

## Código

### Archivo PHP (`index.php`)

- **Inicialización**:
  - Las variables `$operacion` y `$resultado` se utilizan para almacenar la operación actual y el resultado, respectivamente.
  
- **Funciones**:
  - `factorial($n)`: Calcula el factorial de un número entero no negativo.
  
- **Formulario HTML**:
  - Un formulario se utiliza para capturar la entrada del usuario y enviar datos a través del método POST.
  - Se utiliza una tabla HTML para organizar los botones de la calculadora.

- **Operaciones**:
  - Las operaciones se procesan en el servidor mediante la función `eval()` para evaluar la expresión matemática construida.
  - Las operaciones especiales se convierten a expresiones PHP antes de la evaluación.

## Ejemplo

Para calcular el seno de 45 grados, ingresa `45` en el campo de operación y presiona el botón `sin`, luego haz clic en `Calcular`.
