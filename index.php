<?php

require __DIR__ . '/models/Address.php';
require __DIR__ . '/models/User.php';

/********************** ESEMPIO 1 ***************************/

//Istanzio un oggetto di tipo Address

$indirizzi = [
	new Address("Via Roma", "Torino", 10135),
	new Address("Viale degli Ulivi", "Torino", 10135)
];

//Istanzio uno User, che ha l'indirizzo precedente
$io = new User("Luca", 33, $indirizzi );

//Cambio città in Address, DOPO aver creato l'utente
$indirizzi[0]->city = "Milano";

echo "<h2>Esempio 1: Dati collegati</h2>";
//Eppure ANCHE l'utente ha l'indirizzo aggiornato. può essere un problema!
var_dump($indirizzi);
var_dump($io);

/********************** ESEMPIO 2 ***************************/

//Creo un utente, e passo 3 argomenti. nome, età e un oggetto "Address" creato al volo
$filippo = new User(
	'Filippo Rossi',
	50,
	[
		new Address("Via Roma", "Torino", 10135),
		new Address("Corso Unione Sovietica", "Torino", 10135),
		// "ciao", //--> errore
		// 42 //--> errore
	]
);

// $filippo->address->city = "Milano";

echo "<h2>Esempio 2: Filippo</h2>";

var_dump($filippo);

//Posso stampare direttamente proprietà dello user
echo "NOME: " . $filippo->nome . "<br>";

//Anche l'indirizzo è una proprietà dello user. Stampo la proprietà "city" dell'indirizzo.
echo "CITTA': " . $filippo->addresses[0]->city . "<br>";

//Posso richiamare un metodo dell'oggetto User
$indirizzoCompleto = $filippo->getIndirizzo(0);
echo "INDIRIZZO COMPLETO: " . $indirizzoCompleto;
