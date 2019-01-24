<?php

//chamando as outras classes
require_once 'conexao.class.php';
require_once 'funcoes.class.php';

class Funcionario
{
	//criando os atributos
	private $con;
    private $objFc;
    private $idFuncionario;
    private $nome;
    private $email;
    private $senha;
    private $dataCadastro;

	//construtor
	public function  __construct(){
		$this->con =  new conexao();
		$this->objFc =  new funcoes();
	}

	public function __set($atributo,$valor){
		$this->$atributo = $valor;
	}
	public function __get($atributo){
		return $this->$atributo;
	}
	//Selecionar os dados para fazer alterações etc.
	public function querySeleciona($dados){
		try {
			$this->idFuncionario =$this->objFc->base64($dados,2);
			$cst = $this->con->conectar()->prepare("SELECT 'idFuncionario', 'nome', 'email' FROM Funcionario WHERE 'idFuncionario' = :objFc");
			//usando parametro para jogar dentro da query
			$cst->bindParam(":objFc",$this->idsuarios,PDO::PARAM_INT);
			//excutar a query
			$cst->execute();
			//retornar o dados nas posições a partit do fecth PDO
			return $cat->fetch();
		} catch (PDOException $e) {
			return 'error' . $e->getMessage();
		}
	}
	//Listar os registros
	public function querySelect($dados){
		try {
			$cst = $this->con->conectar()->prepare("SELECT 'idFuncionario', 'nome', 'email' FROM 'Funcionario';");
			$cst->execute();
			//fetchAll trás os registros em ARRAY
			return $cst->fetchAll();
		} catch (PDOException $e) {
			return 'error' . $e->getMessage();
		}
	}
	//Inserir no banco
	public function queryInsert($dados){
		try {
			//tratarCaracter para ser inseridos no banco com caracteres especiais 
				$this->nome = $this->objFc->tratarCaracter($dados['nome'],1);
 				$this->email = $dados['email'];	//sha1 deixar a senha mais segura
				$this->senha = sha1($dados['senha']);//usando o 2 que vem o switch para usar a a data e hrs p/ cadastrar
				$this->dataCadastro = $this->objFc->dataAtual(2);
			$cst = $this->con->conectar()->prepare("INSERT INTO funcionario (nome, email, senha, data_cadastro) VALUES (:nome,:email,:senha,:dt);");
			//bindParam passando os parametros em PDO, PARAM_SRT=so vai inserir info de texto
			$cst->bindParam(":nome",$this->nome, PDO::PARAM_STR);
			$cst->bindParam(":email",$this->email, PDO::PARAM_STR);
			$cst->bindParam(":senha",$this->senha, PDO::PARAM_STR);
			$cst->bindParam(":dt",$this->dataCadastro, PDO::PARAM_STR);
			if ($cst->execute()){
				return 'ok';
			}else{
				return 'erro';
			}

		} catch (PDOException $ex) {	
			return 'erro'.$ex->getMessage();
		}
	}

	 // public function queryInsert($dados){
  //       try{
  //           $this->nome = $this->objFc->tratarCaracter($dados['nome'], 1);
  //           $this->email = $dados['email'];
  //           $this->senha = sha1($dados['senha']);
  //           $this->dataCadastro = $this->objFc->dataAtual(2);
  //           $cst = $this->con->conectar()->prepare("INSERT INTO funcionario (nome, email, senha, data_cadastro) VALUES (:nome, :email, :senha, :dt);");
  //           $cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
  //           $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
  //           $cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);
  //           $cst->bindParam(":dt", $this->dataCadastro, PDO::PARAM_STR);
  //           if($cst->execute()){
  //               return 'ok';
  //           }else{
  //               return 'erro';
  //           }
  //       } catch (PDOException $e) {
  //           return 'error '.$e->getMessage();
  //       }
  //   }

	//Atualização no banco
	public function queryUpdate($dados){
		try {
			//bade64 esta descodificando o id do banco
				$this->idFuncionario = $this->objFc->base64($dados['func'],2);
				$this->nome = $this->objFc->tratarCaracter($dados['nome'],1);
				$this->email = $dados['email'];
			$cst = $this->con->conectar()->prepare("UPDATE 'funcionario' SET 'nome' = :nome,'email' = :email  WHERE 'idFuncionario' = :objFc;");
			$cst->bindParam(":objFc",$this->idFuncionario,PDO::PARAM_INT);
			$cst->bindParam(":nome",$this->nome,PDO::PARAM_STR);
			$cst->bindParam(":email",$this->email,PDO::PARAM_STR);
			if ($cst->execute()){
				return 'ok';
			}else{
				return 'erro';
			}
		} catch (PDOException $e) {
			return 'erro' . $e->getMessage();
		}
	}
	//Deletar do banco 
	public function queryDelete($dados){
		try {
			$this->idFuncionario = $this->objFunc->base64($dados,2);
				$cst = $this->con->conectar()->prepare("SELECT FROM 'Funcionario' = objFc");
				$cst->bindParam(":objFc", $this->idFuncionario, PDO::PARAM_INT);
				if ($cst->execute){
							return 'ok';
						}else{
							return 'erro';
						}
		} catch (PDOException $e) {
			return 'erro' . $e->getMessage();
		}
	}

}
?>