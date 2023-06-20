<?php

class Address
{
	public $street;
	public $city;
	public $postcode;

	public function __construct($street, $city, $postcode)
	{
		$this->street = $street;
		$this->city = $city;
		$this->postcode = $postcode;
	}

	public function formatAddress()
	{
		return $this->street . ", " . $this->city;
	}
}

class User
{
	public $nome;
	public $eta;
	public $address;

	function __construct($nome, $eta, Address $address)
	{
		$this->nome = $nome;
		$this->eta = $eta;
		$this->address = $address;
	}

	public function getIndirizzo()
	{
		return $this->address->formatAddress();
	}
}

/********************** ESEMPIO 1 ***************************/

//Istanzio un oggetto di tipo Address
$mioIndirizzo = new Address("Via Roma", "Torino", 10135);

//Istanzio uno User, che ha l'indirizzo precedente
$io = new User("Luca", 33, $mioIndirizzo);

//Cambio città in Address, DOPO aver creato l'utente
$mioIndirizzo->city = "Milano";

echo "<h2>Esempio 1: Dati collegati</h2>";
//Eppure ANCHE l'utente ha l'indirizzo aggiornato. può essere un problema!
var_dump($mioIndirizzo);
var_dump($io);

/********************** ESEMPIO 2 ***************************/

//Creo un utente, e passo 3 argomenti. nome, età e un oggetto "Address" creato al volo
$filippo = new User(
	'Filippo Rossi',
	50,
	new Address("Via Roma", "Torino", 10135)
);

echo "<h2>Esempio 2: Filippo</h2>";

var_dump($filippo);

//Posso stampare direttamente proprietà dello user
echo "NOME: " . $filippo->nome . "<br>";

//Anche l'indirizzo è una proprietà dello user. Stampo la proprietà "city" dell'indirizzo.
echo "CITTA': " . $filippo->address->city . "<br>";

//Posso richiamare un metodo dell'oggetto User
$indirizzoCompleto = $filippo->getIndirizzo();
echo "INDIRIZZO COMPLETO: " . $indirizzoCompleto;
