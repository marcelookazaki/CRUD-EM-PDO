<?php
//CRIANDO A CLASSE DE CONEXAO
class Conexao{
	//ATRIBUTO PRIVADOS
	private $usuario;
	private $senha;
	private $banco;
	private $servidor;
	private static $pdo;
	//CONSTRUTOR
	public function __construct(){		
		$this->servidor = "localhost";
		$this->banco = "crudpdo";
		$this->usuario = "root"; 
		$this->senha = "root";

		// $f = new Funcionario();

		// $f->nome = "";
		
		// $f->setNome("");
		// $f->getNome();

	}
	//METODO PARA CONECTAR
	public function conectar(){
		try{
			if(is_null(self::$pdo)){
				self::$pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco, $this->usuario, $this->senha);
			}
			return self::$pdo;
		}catch(PDOException $e){
			echo 'Error: '.$e->getMessage();
		}
	}
}
?>