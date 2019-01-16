<?php
    session_start();
    require_once('db.class.php');

    // recuperando os dados
    $email = $_POST['usuario'];
    $senha = $_POST['senha'];
    
    //Conexão com o data base
    $BD = new db();

    $conn = $BD->connMysql();
    
    // Construindo a query 
    $query = "SELECT username,email FROM usuarios WHERE username= '$email' AND senha ='$senha'";

    $result = mysqli_query($conn, $query);
    

    if(!$result){
        echo "ERRO, contate o desenvolvedor!";
    }else{
        $dados = mysqli_fetch_array($result);
        if(!isset($dados['username'])){
            header('Location: index.php?error=1');
        }else{ 
            $_SESSION['user'] = $dados['username'];
            $_SESSION['email'] = $dados['email'];
            header('Location:home.php');
            //echo "<br/> bem vindo ".$dados['username'];
        }
    }

?> 