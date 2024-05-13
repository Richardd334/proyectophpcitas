<?php
    
    session_start();
    if (!array_key_exists('Paso por login', $_SESSION)) {
        header('Location: login.php');
        die;
    }
    require_once "conecction.php";
    $usuarios = mysqli_query($db,"SELECT * FROM admin");
?>
<html>
    <h1> Colaboradores Registrados </h1>
    <h3> <div align="right"><a href="inicio_admin.php">Inicio </a></div></h3>
    <h3> <div align="right"><a href="RegistrarColab.php">Registrar Colaborador </a></div></h3>
    <hr>
<table border = 2 >
    <tr>
        <th width="15%">Nombre</th>
        <th width="15%">Apellidos Paterno</th>
        <th width="15%">Apellidos Materno</th>
        <th width="20%">email</th>
        <th width="10%">Ver completo/ Editar</th>
        <th width="8%">Borrar </th>
    </tr>
<?php
$color = "#EFBEBE";
while ($usua = mysqli_fetch_assoc($usuarios)){
?>
    <tr bgcolor="<?=$color?>">
        <td><?=$usua["nombre"];?></td>
        <td><?=$usua["apellido_paterno"];?></td>
        <td><?=$usua["apellido_materno"];?></td>
        <td><?=$usua["Correo"];?></td>
        <td><center><a href="EditarColab.php?usua=<?=$usua["id_admin"];?>">Editar/Ver</a></center></td>
        <td><center><a href="eborrar.php?usua=<?=$usua["id_admin"];?>">Borrar</a></center></td>
    </tr>
<?php 
    if ($color == "#EFBEBE"){
        $color = "#BEC4EF";
    } else {
        $color="#EFBEBE";
    }
}
?>
</table>
</html>