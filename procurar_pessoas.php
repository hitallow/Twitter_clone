<?php 
    session_start();
    if(!isset($_SESSION['user']))
        header('Location:index.php?error=2');
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
					$('#btn_search').click(function(){
							if($('#nome_pessoa').val().length > 0)
							{
								$.ajax({
									url:'get_pessoas.php',
									method: 'post',
									data :$('#form_procura_pessoas').serialize(),
									success:function(data){
                                        $('#nome_pessoa').val('');
                                        $("#pessoas").html(data);                                           
									}

								})
							}
					});
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
								TWETTES <br/> 1
							</div>
							<div class='col-md-6'>
								SEGUIDORES <br/> 1
							</div>
						</div>	
					</div>
				</div>
	    	<div class="col-md-6">
	    		<div class='panel panel-default'>
						<div class='panel-body'>
							<form method='post' id='form_procura_pessoas' class='input-group'>
								<input id='nome_pessoa' name='nome_pessoa' type="text" class='form-control' placeholder='Quem você está procurando?' maxlength='140' >
								<span class='input-group-btn'>
									<button id='btn_search' class='btn btn-default'>Buscar</button>
								</span>
							</form>
						</div>
					</div>
					<div id='pessoas' class='list-group'>

					</div>
				</div>
				<div class="col-md-3">
					<div class='panel panel-default'>
						<div class='panel-body'>
							
						</div>
					</div>
				</div>

			</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>