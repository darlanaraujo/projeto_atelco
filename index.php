<?php
//Importação dos parametos de acesso ao banco de dados.
include_once("conexao.php");

$login = isset($_GET['login'])?$_GET['login']:"";
$senha = isset($_GET['senha'])?$_GET['senha']:"";

//Criação da variável que vai fazer uma busca dentro da tabela usuarios no banco de dados.
$sql = "SELECT * FROM usuarios WHERE usuario like '$login'";

//Criação da variável que vai colocar o parametro da variavel sql em conexão com o banco de dados (lembrando que a variável conexao passa os dados de acesso ao banco)
$consultas = mysqli_query($conexao, $sql);

//Criação da variável que vai mostrar a quantidade de registro encontrado dentro da consulta, mostrando a quantidade de linhas, consequentimente a quantidade de registro.
$registros = mysqli_num_rows($consultas);


?>


<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Cadastro Login</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device=width, initial-scale=1.0">
		<meta name="description" content="Criando um Formulário">
		<meta name="author" content="Darlan Araujo">

		<link rel="stylesheet" type="text/css" href="css/estilo_index.css">
	</head>
	<body>
		<section>
			<!-- Podemos trabalhar de duas formas, com get que utiliza url ou post que utiliza pacotes.
			o action depois ligamos com uma pagina em PHP para processar os dados.
			-->
			<form method="get" action="capa.php">

				<!--Aqui vamos criar os campos para o usuário fazer login do sistema ou se cadastrar para isso!
						
						type = tipo do campo;
						name = aonde é definido o nome do campo para ser vinculado com o PHP;
						id = vincula o label ao campo;
						maxlength = é a quantidade maxima de caracteres permitido;
						minlength = é a quantidade minima de caracteres permitida;
						size = é o tamanho do campo (mas vamos colocar essa informação no css);
						required = indica que o campo é obrigatório;
						autofocus = indica que ao entrar na página esse campo já fica selecionado para digitação;
						placeholder = você pode digitar alguma informação dentro do campo para o usuário;
					-->

				
				<a href="https://www.atelco.com.br/"><img src="imagens/logo.png" alt="Atelco" title="Atelco"></a>

				<input type="text" name="login" class="campo" placeholder="Login" maxlength="30" required autofocus><br>
				<input type="password" name="senha" class="campo" placeholder="Digite sua senha" required minlength="3" maxlength="20"><br><br>

				<input type="submit" name="btn_entrar" value="LOGIN" class="btn"><br><br>

				<p>
					<a href="cad_login.php">Cadastre-se</a>
				</p>
				
			</form>

			<?php
                

                while($compararRegistros = mysqli_fetch_array($consultas)){

                    $usuario = $compararRegistros[1];
                    $senha = $compararRegistros[2];
    
                    print "Usuário encontrado!";

                }
                
                //Comando para fechar a conexão com o banco de dados!
                mysqli_close($conexao);

                ?>
                
		</section>
	</body>
</html>