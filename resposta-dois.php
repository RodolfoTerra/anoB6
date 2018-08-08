<?php

namespace App\Normal;

/**
 *  Classe: Bissexto
 *  Verifica se ano é Bissexto
 *  Usando a regra lógica do exercício com as regras para determinar se o ano é bissexto.
 */

class Normal
{

	private $anoAtual = 0;
	private $bissexto = "";

	
	function __construct()
	{
		$this::setAno();
	}

	private function setAno ()
	{
		/* EX: /?ano=2018 */

		if(isset($_REQUEST['ano'])){
			
			$this->anoAtual = $_REQUEST['ano'];

			$this::condicaoAno();
		}else{

			$this->anoAtual = 0;
			
			$this::getNormal();
		}
	}


	private function condicaoAno ()
	{

		$testeUm   = 0;
		$testeDois = 0;
		$testeTres = 0;	

		$testeUm   = $this->anoAtual % 4;
		$testeDois = $this->anoAtual % 100;
		$testeTres = $this->anoAtual % 400;


		if($testeUm === 0 && $testeDois != 0 || $testeTres === 0){
			
			$this->bissexto = "Bissexto";
		}else{

			$this->bissexto = "Normal";
		}
	

		$this::getNormal();
	}


	public function getNormal ()
	{

		if($this->anoAtual > 0){

			print_r($this->anoAtual . " é " . $this->bissexto);
		}else{

			print_r("Adicione o ano com método GET e variável ano como EX: /?ano=2018");
		}


		return $this->bissexto;
	}
}

$anoBissexto = new Normal();
