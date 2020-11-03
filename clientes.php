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

                    if(!$filtro == ""){
                        print "<article>";

                        print "<strong>Código:</strong> $codigo<br>";
                        print "<strong>CPF:</strong> $cpf<br>";
                        print "<strong>Nome:</strong> $nome<br>";
                        print "<strong>E-mail:</strong> $email<br>";
                        print "<strong>Celular:</strong> $celular";

                        print "</article>";
                    
                    }

                }
                
                //Comando para fechar a conexão com o banco de dados!
                mysqli_close($conexao);

                ?>
                
                <br>
                
                <form method="get" action="consulta_clientes.php">
                    <input type="submit" value="Pesquisar Todos" class="btn"><br><br>
                </form>
                
                <br><br><hr><br>
                
				<!-- No action está a chamada para o arquivo php que conecta ao banco de dados. -->
				<form method="post" action="processa_clientes.php">

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

					<!--Formulário de fornecedores-->
					<label for="cpf">CPF:*</label><br>
					<input type="tel" name="cpf" id="cpf" class="campo" placeholder="CPF" maxlength="11" required autofocus><br>

					<label for="nome">Nome:*</label><br>
					<input type="text" name="nome" id="nome" class="campo" placeholder="Nome completo" maxlength="40" required><br>
                    
                    <label for="sexo">Sexo:*</label><br>
					<input type="text" name="sexo" id="sexo" class="campo" placeholder="Sexo" maxlength="9" required><br>

					<label for="rua">Lougradouro</label><br>
					<input type="text" name="rua" id="rua" class="campo" placeholder="Endereço" maxlength="40"><br>

					<label for="numero">Número:</label><br>
					<input type="tel" name="numero" id="numero" class="campo" placeholder="Número" maxlength="10"><br>

					<label for="complemento">Complemento:</label><br>
					<input type="text" name="complemento" id="complemento" class="campo" placeholder="Complemento" maxlength="40"><br>
                    
                    <label for="bairro">Bairro/Setor:*</label><br>
					<input type="text" name="bairro" id="bairro" class="campo" placeholder="Bairro/Setor" maxlength="40"><br>
                    
                    <label for="cidade">Cidade:*</label><br>
					<input type="text" name="cidade" id="cidade" class="campo" placeholder="Cidade" maxlength="40" required><br>
                    
                    <label for="estado">Estado:*</label><br>
					<input type="text" name="estado" id="estado" class="campo" placeholder="Exemplo: GO" maxlength="2" required><br>

					<label for="cep">CEP:*</label><br>
					<input type="tel" name="cep" id="cep" class="campo" placeholder="CEP" maxlength="8" required=""><br>

					<label for="email">E-mail:*</label><br>
					<input type="email" name="email" id="email" class="campo" placeholder="Digite seu email" required><br>

					<label for="fixo">Telefone Fixo:</label><br>
					<input type="tel" name="fixo" id="fixo" class="campo" placeholder="(00) 0000-0000" maxlength="10"><br>

					<label for="celular">Celular:*</label><br>
					<input type="tel" name="celular" id="celular" class="campo" placeholder="(00) 90000-0000" maxlength="11" required><br>

				</form>
                
			</section>
		</div>
		<dir class="rodape">
			<footer><p>Sistema desenvolvido por Darlan Araujo - Copyright © 2020</p></footer>
		</dir>
		
	</body>
</html>