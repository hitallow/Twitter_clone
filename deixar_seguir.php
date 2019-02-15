<?php 
    session_start();
    require_once('db.class.php');
    $BD = new db();
    $conn = $BD->connMysql();
    
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index.php?error=2');
    }
    
    $id_user = $_SESSION['id_user'];
    
    $id_user_deixar_seguir = $_POST['id_user_deixar_seguir'];
    $sql = "
        DELETE FROM usuarios_seguidores WHERE  id_usuario = $id_user AND id_usuario_seguido = $id_user_deixar_seguir ;
        ";
    
    mysqli_query($conn, $sql);
    
    
?>