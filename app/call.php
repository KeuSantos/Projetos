<?php
// SCRIPT DE ACESSO AO BANCO DE DADOS
define('MYSQL_HOST','sistemaentrev.mysql.dbaas.com.br');
define('MYSQL_USER', 'sistemaentrev');
define('MYSQL_PASSWORD','cdxAca737@#X');
define('MYSQL_DB_NAME','sistemaentrev');

// Efetua a conexão ao Banco de Dados
try{
  $con = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD)or die(mysql_error());
}

// Caso a conexão tenha algum tipo de erro...
catch(PDOException $e){
  $error_DB = "Ops! Erro de conexão, contate o administrador.";
}
?>
