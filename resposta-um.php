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
		$this->anoAtual = $_REQUEST['ano'];

		$this::setDias();
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
				# code...
				$this->bissexto = "Bissexto";

				break;
			
			default:
				# code...
				$this->bissexto = "Normal";

				break;
		}	

		print_r($this->anoAtual . " é " . $this->bissexto);

		return $this->bissexto;
	}
}

$anoBissexto = new Simples();
