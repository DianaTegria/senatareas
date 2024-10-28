<?php
include 'includes/header.php'; ?>


<h1>senatareas</h1>

<div class="login">
    <div class="login_logo">
        <img src="/img/sena.jpg" alt="">
    </div>
    <div class="login_form">
        <form action="" method="post"> <!-- especifica la URL de accion -->
            <fieldset>
                <div class="form">

                    <legend>iniciar sesion</legend>

                    <div class="bts">
                        <label for="usu"> Usuario</label>
                        <input type="text" placeholder="example@correo.com" id="usu" required 
                        name="email">
                        <label for="pass">Contraseña</label>
                        <input type="text" name="password" id="pass" placeholder="valide su 
                        usuario" required>
                        <button type="submit">Iniciar sesion</button>
                    </div>
                
                </div>
            </fieldset>
        </form>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"]  == "POST") {
    $correo = $_POST['email'];
    $password = $_POST['password'];
    session_start();
    try {
        require 'includes/conexion_bd.php';
        $sql = "SELECT email, contra, rol FROM usuarios WHERE 
        email='$correo' ";
        $consul = mysqli_query($coneccion, $sql);
        $resul = mysqli_fetch_assoc($consul);

        if ($_POST['password'] == $resul['contra']) {
            $_SESSION['nombre'] = $resul['nombre'];
            $_SESSION['rol'] = $resul['rol'];
            $_SESSION['login']= true;
            header('location: panel_principal.php');
        } else {
            echo ('usuario y/o contraseña no son correctos');
        }
    } catch (\Throwable $th) {
        echo ($th);
    }
}

include 'includes/footer.php';


