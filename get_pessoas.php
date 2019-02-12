<?php 
    session_start();
    require_once('db.class.php');

    $BD = new db();
    $conn = $BD->connMysql();


    $id_user = $_SESSION['id_user'];
    $nome_user = $_POST['nome_pessoa'];
    $sql = "
        SELECT * from usuarios WHERE username LIKE '%$nome_user%' and id <> $id_user
    ";

    
    $result_query =mysqli_query($conn,$sql); 
    if($result_query){
        while($text = mysqli_fetch_array($result_query,MYSQLI_ASSOC))
        {
            echo '<a href="#" class="list-group-item">';

                echo '<strong>' . $text['username'] . '</strong> <small> - ' . $text['email'] . ' </small>';

                echo '<p class="list-group-item-text pull-right">';

                    echo '<button type="button" class="btn btn-default btn_seguir" data-id_usuario="' . $text['id'] . '">Seguir</button>';
                
                echo '</p>';

                echo '<div class="clearfix"></div>';

            echo '</a>';
        }
        
        
    }else{
        echo 'erro no sql';
    }
    
    

?>