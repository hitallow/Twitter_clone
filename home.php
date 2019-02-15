<?php 
		session_start();
		require_once('db.class.php');
    if(!isset($_SESSION['user']))
				header('Location:index.php?error=2');
				
		$sql = " SELECT COUNT(tweet) AS total FROM tweet WHERE id_user =".$_SESSION['id_user'] ; 
		$BD = new db();
		$conn = $BD->connMysql();
		$result = mysqli_query($conn,$sql);
		if(!$result){
			$tweets = 0;
		}else{
			$tweets = mysqli_fetch_array($result)['total'];

		}
		$sql = "SELECT COUNT(*) AS total FROM usuarios_seguidores WHERE id_usuario_seguido = ".$_SESSION['id_user'] ;
		$result = mysqli_query($conn,$sql);
		$seguidores = mysqli_fetch_array($result)['total'];
		echo $_SESSION['id_user'] ;
?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script>
			$(document).ready(
				function(){
					$('#btn_tweet').click(function(){
							if($('#texto_tweet').val().length > 0)
							{
								$.ajax({
									url:'incluir_tweet.php',
									method: 'post',
									data :$('#form_tweet').serialize(),
									success:function(data){
											$('#texto_tweet').val('');
											get_tweet();
									}

								})
							}
					});

				function get_tweet(){
					$.ajax({
							url:'get_tweets.php',
							method :'post',
							success: function(data){
									$('#tweets').html(data);
							}
					});

				};
				get_tweet();
				});
		</script>
	
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img src="imagens/icone_twitter.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    
	    	<div class="col-md-3">
					<div class='panel panel-default'>
						<div class='panel-body'>
							<div>
									<h3><?= $_SESSION['user']?></h3>
							</div>
							<hr/>
							<div class='col-md-6'>
								TWETTES <br/> <?=  $tweets ?>
							</div>
							<div class='col-md-6'>
								SEGUIDORES <br/> <?= $seguidores ?>
							</div>
						</div>	
					</div>
				</div>
	    	<div class="col-md-6">
	    		<div class='panel panel-default'>
						<div class='panel-body'>
							<form id='form_tweet' class='input-group'>
								<input id='texto_tweet' name='texto_tweet' type="text" class='form-control' placeholder='o que está acontentecendo agora?' maxlength='140' >
								<span class='input-group-btn'>
									<button id='btn_tweet'class='btn btn-default'>Tweet</button>
								</span>
							</form>
						</div>
					</div>
					<div id='tweets' class='list-group'>

					</div>
				</div>
				<div class="col-md-3">
					<div class='panel panel-default'>
						<div class='panel-body'>
							<h4> <a href='procurar_pessoas.php'>Procurar por pessoas ...</a></h4>
						</div>
					</div>
				</div>

			</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>