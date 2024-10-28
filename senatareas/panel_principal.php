

<?php
include 'includes/header.php';


if ($_SESSION['rol'] == 'instructor') {
    echo 'Bienvenido instructor';
    require __DIR__.'/includes/panel_instructor.php';
    
} else {
    echo 'Bienvenido aprendiz';
    require __DIR__.'/includes/panel_aprendiz.php';
    
}

?>