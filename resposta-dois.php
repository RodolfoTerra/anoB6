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
		$this->anoAtual = $_REQUEST['ano'];

		$this::condicaoAno();
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

		print_r($this->anoAtual . " é " . $this->bissexto);

		return $this->bissexto;
	}
}

$anoBissexto = new Normal();
