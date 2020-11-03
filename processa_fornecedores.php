<!-- Abaixo nos fazemos a chamada para o código PHP dentro do arquivo conexao.php esse arquivo contem as informacões que conecta ao banco de dados -->

<?php
//Importação dos parametos de acesso ao banco de dados.
include_once("conexao.php");

//Abaixo vamos criar as variáveis que iram pegar as informações cadastradas no site, e enviar para o banco de dados.
$cnpj = $_POST['cnpj'];
$empresa = $_POST['empresa'];
$fantasia = $_POST['fantasia'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$cep = $_POST['cep'];
$email = $_POST['email'];
$fixo = $_POST['fixo'];
$celular = $_POST['celular'];
$nome = $_POST['nome'];

//A variável abaixo recebe como parametro as variáveis acima e indica em qual lugar do bando de dados elas devem ser salvas.
$sql = "insert into fornecedores (cnpj, empresa, fantasia, rua, numero, complemento, cep, email, fixo, celular, nome) values ('$cnpj', '$empresa', '$fantasia', '$rua', '$numero', '$complemento', '$cep', '$email', '$fixo', '$celular', '$nome')";

//A variável abaixo salva os dados passados como parametro na variavel sql dentro do banco de dados. Essa conexao acontece devido a variável conexao que está passando os dados do banco de dados.
$salvar = mysqli_query($conexao, $sql);

//Comando para verificar se alguma linha dentro do banco de dados foi alterada, partindo do principil que se o cadastro tiver ocorrido tudo certo é alterado as linhas no banco de dados.
$linhas = mysqli_affected_rows($conexao);

//Comando para fechar a conexão com o banco de dados!
mysqli_close($conexao); 

?>


<!-- RETORNO PARA O SITE DEPOIS DE VALIDAR O CADASTRO -->

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
					<a href="servicos.php"><li>Serviços</li></a>
					<a href="consultas.php"><li>Consultas</li></a>
					<a href="index.php"><li>Sair</li></a>
				</ul>
			</nav>
			<section>
				<h1>Confirmação de Cadastro</h1><br>
				<hr><br>

				<!-- Caso haja algum erro ao cadastrar os dados, abaixo contem um comando em PHP para gerar uma mensagem de erro!
				
				No caso do cadastro de usuários, foi definido que o e-mail não pode ser repetido para mais de 1 usuário. Dessa forma, caso haja uma repetição desse e-mail é gerado uma mensagem com esse erro!

				***Lembrando que esse comando não é para verificação de erro de banco de dados, e sim para erro ao gerar um cadastro em caso de divergencia com os parametros estabelecidos.
				-->

				<?php

					if($linhas == 1){
						print "Cadastro efetuado com sucesso!";
					}else{
						print "Cadastro NÃO efetuado!<br> Já existe um usuário com este CNPJ ou e-mail.";
					}
				?>

			</section>
		</div>
		<dir class="rodape">
			<footer><p>Sistema desenvolvido por Darlan Araujo - Copyright © 2020</p></footer>
		</dir>
		
	</body>
</html>