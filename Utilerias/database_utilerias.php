
<?php

//Archivo para el acceso a base de datos del proyecto
//JVTT                     14/02/2018
define('DB_HOST', 'localhost');
define('DB_DATABASE', 'appcita');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
include("./adodb5/adodb.inc.php");

$Cn = NewADOConnection('mysqli');
$Cn->Connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

function Ejecuta($sentencia)
{
    global $Cn;
    if ($Cn->Execute($sentencia) == false)
    return 'error al insertar'.$Cn->ErrorMsg().'<BR>';
    else
        return "1";    
}
//validacion del usuario al momento de ingresar 
function valduser($correo)
{
    global $Cn;
    $sql ="select idUsuario,NomUsuario,Correo,Telefono,Password,idRole from usuario where Correo ='{$correo}'";
    return $Cn->Execute($sql);
}

// funcion de agregado desde la parte del index (login)
function agregaruser($nom,$corr,$cont,$dom,$telf,$telm,$curp)
{
    $pwdEnc =password_hash($cont,PASSWORD_DEFAULT);
    $sql ="insert into usuario(IdRole,NomUsuario,Correo,Contrasena,Domicilio,TelefonoFijo,TelefonoMovil,CURP,Estado)value(2,'{$nom}','{$corr}','{$pwdEnc}','{$dom}','{$telf}','{$telm}','{$curp}',1)";
    return ejecuta($sql);
    
}


function RecoverPassword($corr)
{
    global $Cn;
    $sql = "SELECT Correo,Password From Usuario where Correo='{$corr}'";
    return $Cn->query($sql);
}










//------------- Catálogo de Usuario-----------------------
function consultaUsu($id){
	global $Cn;
	$sql = "SELECT NomUsuario,Correo,Domicilio,TelefonoFijo,TelefonoMovil,CURP From usuario where IdUsuario={$id} order By NomUsuario";
	return $Cn->Execute($sql);
}


function consultaUsuario()
{
	global $Cn;
	$sql = "SELECT IdUsuario,NomUsuario,Correo,Contrasena,Domicilio,TelefonoFijo,TelefonoMovil,CURP, Estado, FechaCU,IdRole From usuario order By NomUsuario";
	return $Cn->Execute($sql);
}

function agregarUsuario($NomUsu,$Corre,$Contr,$Domi,$TF,$TM,$curpUsu,$Estado,$idRole)
{
 
    $sql = "Insert into usuario(NomUsuario,Correo,Contrasena,Domicilio,TelefonoFijo,TelefonoMovil,CURP,Estado,IdRole) values('{$NomUsu}','{$Corre}','{$Contr}','{$Domi}',{$TF},{$TM},'{$curpUsu}', {$Estado},{$idRole})";
   return Ejecuta ($sql);    
}



function actualizaUsuario($idUsu,$NomUsu,$Corre,$Contr,$Domi,$TF,$TM,$curpUsu,$Estado,$idRole)
{

    $sql = "Update usuario set NomUsuario='{$NomUsu}',Correo='{$Corre}', Contrasena='{$Contr}',Domicilio='{$Domi}',TelefonoFijo={$TF},TelefonoMovil={$TM},CURP='{$curpUsu}',Estado=$Estado, IdRole={$idRole} where IdUsuario={$idUsu}";
    return Ejecuta ($sql);
}
function borraUsuario($idUsu)
{
    global $Cn;
    $sql = "Delete from usuario where idUsuario={$idUsu}";
    return Ejecuta ($sql);
}





//------------- Catálogo de Role-----------------------
function consultaRole()
{
	global $Cn;
	$sql = "SELECT IdRole,NomRole,Estado,FechaCR From role where Estado=1 Order By NomRole";
	return $Cn->Execute($sql);
    print $sql;
}

function agregarRole($NomRole, $Estado)
{
    
    $sql = "Insert into Role(NomRole,Estado) values('{$NomRole}', {$Estado})";
    return Ejecuta ($sql);
}
function actualizaRole($idRole,$NomRole,$Estado)
{
    global $Cn;
    $sql = "Update role set NomRole='{$NomRole}', Estado=$Estado where idRole={$idRole}";
    return Ejecuta ($sql);
}
function borraRole($idRole)
{
    global $Cn;
    $sql = "Delete from Role where idRole={$idRole}";
    return Ejecuta ($sql);
}



//------------- Catálogo deCitas-----------------------
function consultaCita()
{
    global $Cn;
    //$sql = "SELECT idCita,NomPersona,FechaCita,HoraCita,idLocacion,idUsuario From Cita where Status=1 Order By FechaCita";
    $sql ="SELECT idCita,NomPersona,FechaCita,HoraCita,NomLocacion,NomUsuario from cita A INNER JOIN locacion B on(A.idlocacion=B.idLocacion) inner join usuario C on(A.idUsuario= C.idUsuario) where A.Status= 0 ORDER by FechaCita";
    return $Cn->Execute($sql);
    print $sql;
}

function QueryDates()
{
    global $Cn;
    //$sql = "SELECT idCita,NomPersona,FechaCita,HoraCita,idLocacion,idUsuario From Cita where Status=1 Order By FechaCita";
    $sql ="SELECT idCita,NomPersona,FechaCita,HoraCita,NomLocacion,NomUsuario from cita A INNER JOIN locacion B on(A.idlocacion=B.idLocacion) inner join usuario C on(A.idUsuario= C.idUsuario) where A.Status= 1 ORDER by FechaCita";
    return $Cn->Execute($sql);
    print $sql;
}



//-----------------Notificaciones------------------------//


function Status($Date)
{
    global $Cn;
    $sql = "Update cita set Status='3' where idCita={$Date}";
    return Ejecuta ($sql);
   print $sql;
}

function DateStatus($Date)
{
    global $Cn;
    $sql = "Update cita set Status='1' where idCita={$Date}";
    return Ejecuta ($sql);
   print $sql;
}

function QueryLocation()
{
    global $Cn;
    $sql = "SELECT idLocacion,Nomlocacion,FechaCL,Latitud,Longitud From locacion where Status=1 Order By NomLocacion";
    return $Cn->Execute($sql);
}