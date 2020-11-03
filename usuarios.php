<?php
//Importação dos parametos de acesso ao banco de dados.
include_once("conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";

//Criação da variável que vai fazer uma busca dentro da tabela usuarios no banco de dados.
$sql = "SELECT * FROM usuarios WHERE nome like '%$filtro%'";

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
				<h1>Cadastro de Usuários</h1><br>
				<hr><br>
                
                <!--Pesquisa -->
                <form method="get" action="">
                    Pesquisar Usuários: <input type="text" name="filtro" class="campo" placeholder="Nome">
                    <input type="submit" value="Pesquisar" class="btn"><br><br>
                </form>
                
                
                <?php
                
                print "Resultado da pesquisa com a palavra <strong>$filtro</strong>.<br><br>";
                
                print "$registros registros encontrados";

                print "<br><br>";

                while($exibirRegistros = mysqli_fetch_array($consultas)){

                    $codigo = $exibirRegistros[0];
                    $usuario = $exibirRegistros[1];
                    $email = $exibirRegistros[3];
                    $nome = $exibirRegistros[4];
                    
                    if(!$filtro == ""){

                        print "<article>";

                        print "<strong>Código:</strong> $codigo<br>";
                        print "<strong>Nome de Usuário:</strong> $usuario<br>";
                        print "<strong>E-mail:</strong> $email<br>";
                        print "<strong>Nome:</strong> $nome";

                        print "</article>";
                    }

                }
                
                //Comando para fechar a conexão com o banco de dados!
                mysqli_close($conexao);

                ?>
                
                <form method="get" action="consulta_usuarios.php">
                    <input type="submit" value="Pesquisar Todos" class="btn"><br><br>
                </form>
                
                <br><br><hr><br>

				<form method="post" action="processa.php">

					<!--Aqui vamos criar os campos para o usuário fazer os cadastros!
						
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
					
					<!--Botões -->
					<input type="submit" name="salvar" class="btn salvar" value="Salvar">
					<input type="reset" name="limpar" class="btn limpar" value="Limpar">
					<input type="button" name="excluir" class="btn excluir" value="Excluir">
					<input type="button" name="editar" class="btn editar" value="Editar">
					<br><br>

					<!--Formulário de usuários-->
					<label for="usuario">Nome de usuário:*</label><br>
					<input type="text" name="usuario" id="usuario" class="campo" placeholder="Nome de usuário" required autofocus maxlength="40"><br>

					<label for="senha">Senha:*</label><br>
					<input type="password" name="senha" id="senha" class="campo" placeholder="senha" required autofocus minlength="3" maxlength="40"><br>

					<label for="email">E-mail:*</label><br>
					<input type="email" name="email" id="email" class="campo" placeholder="Digite seu email" required><br>

					<label for="nome">Nome completo:*</label><br>
					<input type="text" name="nome" id="nome" class="campo" placeholder="Nome completo" required maxlength="40"><br>
				</form>
			</section>
		</div>
		<dir class="rodape">
			<footer><p>Sistema desenvolvido por Darlan Araujo - Copyright © 2020</p></footer>
		</dir>
		
	</body>
</html>