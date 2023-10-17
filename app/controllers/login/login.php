<?php

include('../../config.php');

$contador=0; //este sujeto nos dira si los datos estan correctos o no
$email=$_POST['email_iLogin'];
$password_user=$_POST['password_user_iLogin'];	
$Rol=$_POST['opciones_iLogin'];
// echo $Rol;

try {
    $sql = "SELECT usuario.correo,
     usuario.contraseña, 
     rol.nombre AS nombre_rol, 
     usuario.nombreUsuario, 
     usuario.Nombres, 
     usuario.fechaNacimiento, 
     usuario.Sexo, 
     usuario.Imagen, 
     usuario.fechaCreacion
            FROM usuario
            INNER JOIN rol ON usuario.ID_rol = rol.ID_Rol
            WHERE usuario.correo = '$email' AND usuario.contraseña = '$password_user' AND usuario.ID_rol ='$Rol'";

    $query = $pdo->prepare($sql);
    // $query->bindParam('email', $email, PDO::PARAM_STR);
    // $query->bindParam('password_user', $password_user, PDO::PARAM_STR);
    // $query->bindParam('Rol', $Rol, PDO::PARAM_INT);

    $query->execute();

    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($usuarios as $usuario) {
        $contador=$contador+1;
        //echo $email_BD = $usuario['correo'];
        //echo $nombre_rol = $usuario['nombre_rol'];
        $nombresDusuario_BD = $usuario['nombreUsuario'];
        //echo $sexo_BD=$usuario['Sexo'];
        //echo $nombres_BD=$usuario['Nombres'];
        //echo $fechaNacimiento_BD=$usuario['fechaNacimiento'];
        //echo $fechaCreacion_BD=$usuario['fechaCreacion'];
        
    }

if($contador==0){
    echo" Datos incorrectos, vuelva a intentarlo";
    session_start();
    $_SESSION['mensje']="Error, Datos incorrecto";
    header('Location:'.$URL.'/Login/index.php');

}else{
    if($Rol==1){       //ADMINISTRADOR
    echo"Inicio Sesion Exitoso";
    session_start();
    $_SESSION['sesion_email']=$email;
    header('Location:'.$URL.'/Home/Home.php');
    }else{
        if($Rol==2){          //VENDEDOR
            echo"Inicio Sesion Exitoso";
            session_start();
            $_SESSION['sesion_email']=$email;
            header('Location:'.$URL.'/Home/Home.php');
            }else{
                if($Rol==3){          //PRIVADO
                    echo"Inicio Sesion Exitoso";
                    session_start();
                    $_SESSION['sesion_email']=$email;
                    header('Location:'.$URL.'/Home/Home.php');
                    }else{
                        if($Rol==4){          //PUBLICO
                            echo"Inicio Sesion Exitoso";
                            session_start();
                            $_SESSION['sesion_email']=$email;
                            header('Location:'.$URL.'/Home/Home.php');
                            }
                    }
            }
    }
        
}



} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}