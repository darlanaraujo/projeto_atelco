<?php
//Importação dos parametos de acesso ao banco de dados.
include_once("conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";

//Criação da variável que vai fazer uma busca dentro da tabela usuarios no banco de dados.
$sql = "SELECT * FROM fornecedores WHERE fantasia like '%$filtro%'";

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
				<h1>Cadastro de Fornecedores</h1><br>
				<hr><br>
                
                <!--Pesquisa -->
                <form method="get" action="">
                    Pesquisar Fornecedores: <input type="text" name="filtro" class="campo" placeholder="Nome da Empresa">
                    <input type="submit" value="Pesquisar" class="btn"><br><br>
                </form>

                <?php
                
                print "Resultado da pesquisa com a palavra <strong>$filtro</strong>.<br><br>";
                
                print "$registros registros encontrados";

                print "<br><br>";

                while($exibirRegistros = mysqli_fetch_array($consultas)){

                    $codigo = $exibirRegistros[0];
                    $cnpj = $exibirRegistros[1];
                    $fantasia = $exibirRegistros[3];
                    $email = $exibirRegistros[8];
                    $fixo = $exibirRegistros[9];
                    $nome = $exibirRegistros[11];


                    print "<article>";

                    print "<strong>Código:</strong> $codigo<br>";
                    print "<strong>CNPJ:</strong> $cnpj<br>";
                    print "<strong>Nome Fantasia:</strong> $fantasia<br>";
                    print "<strong>E-mail:</strong> $email<br>";
                    print "<strong>Telefone:</strong> $fixo<br>";
                    print "<strong>Nome do contato:</strong> $nome";

                    print "</article>";

                }
                
                //Comando para fechar a conexão com o banco de dados!
                mysqli_close($conexao);

                ?>
                
                <br><br><hr><br>

			</section>
		</div>
		<dir class="rodape">
			<footer><p>Sistema desenvolvido por Darlan Araujo - Copyright © 2020</p></footer>
		</dir>
		
	</body>
</html>