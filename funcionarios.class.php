<?php


//chamando as outras classes
require_once 'conexao.class.php';
require_once 'funcoes.class.php';

class Funcionario
{
	//criando os atributos
	private $con;
	private $objFunc;
	private $idFuncionario;
	private $email;
	private $senha;
	private $dataCadastro;

	//construtor
	public function __construct(){
		$this-> new conexao();
		$this-> new Funcoes();
	}

	public function __set($atributo,$valor){
		$thid->$atributo = $valor;
	}
	public function __get($atributo){
		return $this->$atributo;
	}
	//Selecionar os dados para fazer alterações etc.
	public function querySeleciona($dados){
		try {
			
		} catch (PDOException $e) {
			
		}
	}
	//Listar os registros
	public function querySelect($dados){
		try {
			
		} catch (PDOException $e) {
			
		}
	}
	//Inserir no banco
	public function queryInsert($dados){
		try {
			
		} catch (PDOException $e) {
			
		}
	}
	//Atualização no banco
	public function queryUpdate($dados){
		try {
			
		} catch (PDOException $e) {
			
		}
	}
	//Deletar do banco 
	public function queryDelete($dados){
		try {
			
		} catch (PDOException $e) {
			
		}
	}

}
?>