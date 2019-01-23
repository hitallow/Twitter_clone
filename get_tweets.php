<?php 
    session_start();
    require_once('db.class.php');

    $BD = new db();
    $conn = $BD->connMysql();


    $id_user = $_SESSION['id_user'];

    $sql = "
        SELECT DATE_FORMAT(t.data_inclusao,'%d %b %Y %T') AS data_inclusao,t.tweet,u.username 
        FROM tweet AS t JOIN usuarios AS u ON(t.id_user = u.id)
        WHERE id_user = '$id_user' ORDER BY data_inclusao DESC
    ";
    $result_query =mysqli_query($conn,$sql); 
    if(!$result_query){
        echo 'erro no sql';
    }
    while($text = mysqli_fetch_array($result_query,MYSQLI_ASSOC)){
        echo "<a href='#' class='list-group-item'>";
            echo "<h4 class='list-group-heading'>".$text['username']."<small> -".$text['data_inclusao']."</small></h4>";
            echo "<p class='list-group-item-text'>".$text['tweet']."</p>";
        echo "</a>";
    }


?>