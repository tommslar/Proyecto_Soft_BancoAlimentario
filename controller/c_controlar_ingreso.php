<?php
require_once ('../model/m_usuario.class.php');
$info = Usuario::buscar_usuario($_POST['nombreusuario'],$_POST['password'] );
if(isset($_POST['nombreusuario']) && isset($_POST['password'])){  
  if($info > 0){ 
	    $act = $info["activo"];
		$nyp = $info["nomyape"];
	    $usu = $info["nombreusuario"];
		$p = $info["perfil"];		
	   if($act == 1){ 
	      include "../controller/c_ingreso_correcto.php";
       }
       else{
		    header("location:c_cuenta_bloqueada.php");
	   }	   
    }
    else{
        header("location:c_no_autorizado.php");
	   }
}	   
else {     header("location:c_login.php");	}	 
?>