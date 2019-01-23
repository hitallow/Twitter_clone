<?php 
    session_start();
    require_once('db.class.php');

    $BD = new db();
    $conn = $BD->connMysql();


    $id_user = $_SESSION['id_user'];
    $nome_user = $_POST['nome_pessoa'];
    $sql = "
        SELECT * FROM usuarios WHERE username LIKE '%$nome_user%' AND id <> $id_user
    ";
    $result_query =mysqli_query($conn,$sql); 
    if(!$result_query){
        echo 'erro no sql';
    }
    while($text = mysqli_fetch_array($result_query,MYSQLI_ASSOC)){
        echo "<a href='#' class='list-group-item'>";
            echo "<strong>".$text['username']."</strong><smal>".$text['email']."</small>";
        echo "</a>";
    }


?>