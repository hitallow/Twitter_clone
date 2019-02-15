<?php 
    session_start();
    require_once('db.class.php');

    $BD = new db();
    $conn = $BD->connMysql();


    $id_user = $_SESSION['id_user'];
    $nome_user = $_POST['nome_pessoa'];
    $sql = "

    SELECT u.*, us.data_registro from usuarios as u 
    LEFT JOIN usuarios_seguidores as us 
    ON(us.id_usuario =  $id_user AND u.id = us.id_usuario_seguido) 
    WHERE u.username LIKE '%a%' and u.id <>  $id_user;
    ";


    $result_query =mysqli_query($conn,$sql); 
    if($result_query){
        while($text = mysqli_fetch_array($result_query,MYSQLI_ASSOC))
        {
            echo '<a href="#" class="list-group-item">';

                echo '<strong>' . $text['username'] . '</strong> <small> - ' . $text['email'] . ' </small>';

                echo '<p class="list-group-item-text pull-right">';
                    
                    if((isset($text['data_registro'])) && (!empty($text['data_registro']))){
                        echo '<button type="button" id="btn_deixar_seguir'.$text['id'].'" class="btn btn-primary btn_deixar_seguir" data-id_usuario="' .$text['id']. '">Deixar de seguir</button>';
                        echo '<button style="display:none" type="button" id="btn_seguir'.$text['id'].'"   class="btn btn-default btn_seguir" data-id_usuario="' . $text['id'] . '">Seguir</button>';
                    }
                    else{
                        echo '<button style="display:none" type="button" id="btn_deixar_seguir'.$text['id'].'" class="btn btn-primary btn_deixar_seguir" data-id_usuario="' .$text['id']. '">Deixar de seguir</button>';
                        echo '<button type="button" id="btn_seguir'.$text['id'].'"   class="btn btn-default btn_seguir" data-id_usuario="' . $text['id'] . '">Seguir</button>';
                    }
                echo '</p>';

                echo '<div class="clearfix"></div>';

            echo '</a>';
        }
        
        
    }else{
        echo 'erro no sql';
    }
    
    

?>