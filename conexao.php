<!-- Abaixo nos criamos as variáveis que fazem conexão com o banco de dados.
	Como estamos utilizando um servidor local as configurações são padrões,
	ao usar um servidor na web, basta trocar os dados.
-->

<?php

$hostname = "localhost";
$user = "root";
$password = "";
$database = "cadastro";

$conexao = mysqli_connect($hostname, $user, $password, $database); //Variável que conecta ao banco de dados passando as informações de acesso.


//Abaixo fazemos uma verificação de acesso, e em caso de erro, mostra uma mensagem!
if(!$conexao){
	print "Erro ao conectar o banco de dados!";
}

?>