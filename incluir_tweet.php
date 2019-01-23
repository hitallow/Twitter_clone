<?php 
    session_start();
    require_once('db.class.php');
    $BD = new db();
    $conn = $BD->connMysql();
    $texto_tweet = $_POST['texto_tweet'];
    $id_user = $_SESSION['id_user'];
    
    if($_POST['texto_tweet']=='' ){
        die();
    }

    $sql = "insert into tweet ( id_user,tweet) values('$id_user','$texto_tweet' )";
    $result = mysqli_query($conn, $sql);
    


    
    ##echo $texto_tweet;
?>