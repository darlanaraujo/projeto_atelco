<?php
//Importação dos parametos de acesso ao banco de dados.
include_once("conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";

//Criação da variável que vai fazer uma busca dentro da tabela usuarios no banco de dados.
$sql = "SELECT * FROM clientes WHERE nome like '%$filtro%'";

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

		<link rel="stylesheet" type="text/css" href="css/estilo_usuarios.css">
	</head>
	<body>
		<div class="container">
			<nav>
				<a href="index.php"><img src="imagens/logo.png" alt="Atelco" title="Atelco"></a>
				<ul class="menu">
					<a href="usuarios.php"><li>Usuários</li></a>
					<a href="fornecedores.php"><li>Fornecedores</li></a>
					<a href="clientes.php"><li>Clientes</li></a>
					<a href="index.php"><li>Sair</li></a>
				</ul>
			</nav>
			<section>
				<h1>Cadastro de Clientes</h1><br>
				<hr><br>
                
                <!--Pesquisa -->
                <form method="get" action="">
                    Pesquisar Clientes: <input type="text" name="filtro" class="campo" placeholder="Nome do Clientes">
                    <input type="submit" value="Pesquisar" class="btn"><br><br>
                </form>

                <?php
                
                print "Resultado da pesquisa com a palavra <strong>$filtro</strong>.<br><br>";
                
                print "$registros registros encontrados";

                print "<br><br>";

                while($exibirRegistros = mysqli_fetch_array($consultas)){

                    $codigo = $exibirRegistros[0];
                    $cpf = $exibirRegistros[1];
                    $nome = $exibirRegistros[2];
                    $email = $exibirRegistros[11];
                    $celular = $exibirRegistros[13];


                    print "<article>";

                    print "<strong>Código:</strong> $codigo<br>";
                    print "<strong>CPF:</strong> $cpf<br>";
                    print "<strong>Nome:</strong> $nome<br>";
                    print "<strong>E-mail:</strong> $email<br>";
                    print "<strong>Celular:</strong> $celular";

                    print "</article>";

                }
                
                //Comando para fechar a conexão com o banco de dados!
                mysqli_close($conexao);

                ?>            
                
			</section>
		</div>
		<dir class="rodape">
			<footer><p>Sistema desenvolvido por Darlan Araujo - Copyright © 2020</p></footer>
		</dir>
		
	</body>
</html>