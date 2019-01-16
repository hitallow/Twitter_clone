<?php 
    require_once('db.class.php');
    $user =  $_POST['usuario'];
    $email = $_POST['email'];
    $password =  md5($_POST['senha']);
    $BD = new db();
    $conn = $BD->connMysql();

    // Teste, caso o nome de usuario já esteja em utilização 
    $query = "select * from usuarios where username = '$user'";
    if($result = mysqli_query($conn, $query)){
        $dados = mysqli_fetch_array($result);
        var_dump($dados);
        if(isset($dados['username'])){
            echo "Usuario já cadastrado";
        }
    }else{
        echo "Ocorreu um erro, contate o desenvolvedor";
    }
    // Teste, caso o email já esteja em utilização 
    $query = "select * from usuarios where email = '$email'";
    if($result = mysqli_query($conn, $query)){
        $dados = mysqli_fetch_array($result);
        if(isset($dados['email'])){
            echo '<br> email já cadastrado';
        }
    }else{
        echo 'Ocorreu um erro interno, contate o desenvolvedor!';
    }
    
    // Caso, não entre em nenhum caso passado, fazemos o insert!
    $query = "insert into usuarios(username, email, senha) values ('$user', '$email','$password')" ; 

    if(mysqli_query($conn, $query)){
        echo 'usuario cadastrado';

    }else{
        echo 'Ocorreu um erro';
    }
?>