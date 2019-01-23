<?php

class conexao{
	private $servidor;
	private $usuario;
	private $senha;
	private $banco;
	private static $pdo;

	public function __construct(){
		$this->servidor = "127.0.0.1";
		$this->usuario = "root";
		$this->senha = "root"
		$this->banco = "cadastroloja";
	}

	public function conectar(){
		try {
			if (is_null(self::$pdo)) {
				self::$pdo = new PDO("mysql:host". $this->servidor . ":bdname". $this->banco . $this->usuario . $this->senha);
			}
			return self::$pdo;
			
		} catch (PDOException $e) {
			$e->show
			
		}
	}
}

?>