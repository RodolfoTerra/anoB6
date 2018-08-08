<?php

namespace App\Simples;

/**
 *  Classe: Bissexto
 *  Verifica se ano é Bissexto
 *  Usando uma função nativa do PHP para contar quantos dias existem em um determinado mês.
 */

class Simples
{

	private $anoAtual = 0;
	private $bissexto = "";
	private $diasMes  = 0;
	
	function __construct()
	{
		
		$this::setAno();
	}

	private function setAno ()
	{
		/* EX: /?ano=2018 */
		
		if(isset($_REQUEST['ano'])){
			
			$this->anoAtual = $_REQUEST['ano'];

			$this::setDias();
		}else{

			$this->anoAtual = 0;

			$this::getSimples();
		}
		
	}


	private function setDias ()
	{

		$this->diasMes = cal_days_in_month(CAL_GREGORIAN, 2, $this->anoAtual);

		$this::getSimples();
	}


	public function getSimples ()
	{


		switch ($this->diasMes) {
			case 29:

				$this->bissexto = "Bissexto";

				break;
			
			default:

				$this->bissexto = "Normal";

				break;
		}	

		if($this->anoAtual > 0){

			print_r($this->anoAtual . " é " . $this->bissexto);
		}else{

			print_r("Adicione o ano com método GET e variável ano como EX: /?ano=2018");
		}


		return $this->bissexto;
	}
}

$anoBissexto = new Simples();
