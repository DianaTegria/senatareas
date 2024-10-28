

<?php



require '../crear_cuenta.php';
$insertar_datos = capturarDatos();

$identificacion = $insertar_datos['identifica'];
$identificacion = intval($identificacion);
$nombre1 = $insertar_datos['primer_nombre'];
$nombre2 = $insertar_datos['segundo_nombre'];
$apellido1 = $insertar_datos['primer_apellido'];
$apellido2 = $insertar_datos['segundo_apellido'];
$email = $insertar_datos['email'];
$contra = $insertar_datos['contra'];
$rol = $insertar_datos['rol'];

require '../includes/conexion_bd.php';

$sql = 'INSERT INTO usuarios (cod, primer_nombre, segundo_nombre, primer_apellido, 
segundo_apellido, email, contra, rol) VALUES (' .$identificacion . ', "' . $nombre1 . 
'", "' . $nombre2 . '", "' . $apellido1 . '", "' . $apellido2 . '", "' . $email . '", 
"' . $contra . '", "' . $rol . '"); ';

$consul=mysqli_query($coneccion,$sql);
var_dump($consul);
header("Location: ../login.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
El error que estás viendo indica que estás intentando insertar un registro en una tabla de tu base de datos (en este caso, parece ser la tabla `aprendices`), pero el campo `rol` no tiene un valor por defecto y no se le está proporcionando un valor durante la inserción.

Aquí tienes algunos pasos que puedes seguir para resolver el problema:

1. **Revisar la estructura de la tabla**:
   Asegúrate de que el campo `rol` esté definido correctamente en tu tabla. Si debe tener un valor por defecto, puedes alterarlo para agregar un valor por defecto usando SQL:
   ```sql
   ALTER TABLE aprendices MODIFY rol VARCHAR(255) DEFAULT 'valor_por_defecto';
   ```
   Asegúrate de reemplazar `'valor_por_defecto'` por el valor que desees.

2. **Modificar el código de inserción**:
   Asegúrate de que cuando hagas la inserción, estás proporcionando un valor para el campo `rol`. Por ejemplo, si tu consulta de inserción es algo así:
   ```php
   $query = "INSERT INTO aprendices (nombre, email, rol) VALUES ('$nombre', '$email', '$rol')";
   ```
   Asegúrate de que `$rol` tenga un valor definido antes de ejecutar la consulta. Si no tiene un valor y no quieres establecer un valor por defecto en la base de datos, debes asegurarte de que el campo `rol` siempre tenga un valor al insertar.

3. **Ejemplo de inserción**:
   Aquí hay un ejemplo simple de cómo podrías hacer la inserción asegurándote de que todos los valores necesarios están presentes:
   ```php
   $nombre = 'John Doe'; // Asigna el valor apropiado
   $email = 'john@example.com'; // Asigna el valor apropiado
   $rol = 'aprendiz'; // Asegúrate de que este valor esté definido

   $query = "INSERT INTO aprendices (nombre, email, rol) VALUES ('$nombre', '$email', '$rol')";
   if (mysqli_query($conexion, $query)) {
       echo "Registro insertado correctamente.";
   } else {
       echo "Error: " . mysqli_error($conexion);
   }
   ```

4. **Depurar**:
   Si sigues teniendo problemas, intenta imprimir el valor de `$rol` antes de la consulta para asegurarte de que se está definiendo correctamente.

Si sigues teniendo problemas después de revisar estos pasos, no dudes en compartir más detalles sobre tu código o estructura de base de datos para que pueda ayudarte mejor.

?>