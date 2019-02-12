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
    
    $id_user_seguir = $_POST['id_user_seguir'];
    $sql = "
        
        insert into usuarios_seguidores( id_usuario , id_usuario_seguido) values ($id_user, $id_user_seguir );
        ";
    
    echo mysqli_query($conn, $sql);
    echo $sql;
    


    
    ##echo $texto_tweet;
?>