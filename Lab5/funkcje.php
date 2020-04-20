<?php 

class Osoba {
    public $login;
    public $haslo;
    public $imieNazwisko;
}

$osoba1 = new Osoba;
$osoba1->login = "adam";
$osoba1->haslo = "adam2020";
$osoba1->imieNazwisko = "Adam Kowalski";

$osoba2 = new Osoba;
$osoba2->login = "agata";
$osoba2->haslo = "2020agata";
$osoba2->imieNazwisko = "Agata Nowak";

$osoby = 
    array(
        $osoba1->login => $osoba1, 
        $osoba2->login => $osoba2
    );

function try_login($login, $pwd, &$osoba)
{
    global $osoby;
    $tmp_osoba = $osoby['adam'];
    echo $tmp_osoba->haslo;
    if(isSet($tmp_osoba))
    {
        if($tmp_osoba->login == $login && $tmp_osoba->haslo == $pwd)
        {
            $osoba = $tmp_osoba;
            return true;
        }
    }
    return false;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
