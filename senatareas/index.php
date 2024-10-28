<?php 
include 'includes/header.php';

?>


<div class="hero">
    <div class="contenido_hero">
        <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, 
        cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. 
        No sólo sobrevivió 500 años, sino que también ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con 
        la creación de las hojas "Letraset", las cuales contenían pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye 
        versiones de Lorem Ipsum.</p>
        
        <?php
        
        try {
            require 'includes/conexion_bd.php';
            // Consulta SQL para obtener las frases
            $sql = "SELECT frases FROM frases_motivadoras ORDER BY RAND() LIMIT 1"; //Llamando la tabla y la columna frases
            $consul = mysqli_query($coneccion, $sql);

            // resultados
            if (mysqli_num_rows($consul) > 0) {
                // Mostrar cada frase
                while ($row = mysqli_fetch_assoc($consul)) {
                    echo "<p><strong>" . htmlspecialchars($row['frases']) . "</strong>";
                }
            } else {
                echo "<p>No se encontraron frases motivadoras.</p>";
            }

            // Cerrar la conexión
            mysqli_close($coneccion);
        } catch (\Throwable $th) {
            var_dump($th);
        }
        ?>
    </div>
</div>


<?php include 'includes/footer.php' ?>




