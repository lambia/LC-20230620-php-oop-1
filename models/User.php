<?php 

class User
{
	public $nome;
	public $eta;
	public $addresses = [];

	function __construct($nome, $eta, array $addresses)
	{
		$this->nome = $nome;
		$this->eta = $eta;
		$this->addresses = $addresses;

		foreach($addresses as $address) {
			if(!$address instanceof Address){
				die("Gli indirizzi devono essere oggetti Address");
			}
		}
	}

	public function getIndirizzo($i)
	{
		return $this->addresses[$i]->formatAddress();
	}
}

?>