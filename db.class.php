<?php 
    class db{
        //host
        private $host = 'localhost';
        //user
        private $user = 'root';
        // senha
        private $password = '';
        // database
        private $bd = 'twitter_clone' ;

        public function connMysql()
        {
            $conn = mysqli_connect($this->host, $this->user, $this->password, $this->bd);
            mysqli_set_charset($conn, 'utf8');
            if(mysqli_connect_errno()){
                echo "alert('houve um erro ao se conectar com o banco de dados')";
            }
            return $conn;
        }




    }


?>