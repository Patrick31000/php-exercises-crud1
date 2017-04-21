<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>title</title>

</head>


<body>

<?php
try{
$bdd = new PDO('mysql:host=localhost;dbname=colyseum', 'root', 'root');
}

catch (Exception $e){
    die('Erreur :'.$e->getMessage());
}
?>



<h1>Exo 1 : Affichage de tous les clients :</h1>
<?php

$reponse = $bdd->query('SELECT * FROM clients');
while ($donnees = $reponse->fetch()) 
{	
?>
<p> <?php echo $donnees[lastName]." ".$donnees[firstName]; ?></p>
<?php
}
$reponse->closeCursor();
?>




<h1>Exo 2 : Affichage de tous les types de spectacles possibles :</h1>

<?php

$reponse = $bdd->query('SELECT * FROM showTypes');
while ($donnees = $reponse->fetch()) 
{	
?>
<p> <?php echo $donnees[type]?></p>
<?php
}
$reponse->closeCursor();
?>




<h1>Exo 3 : Afficher les 20 premiers clients :</h1>
<?php

$reponse = $bdd->query('SELECT * FROM clients WHERE Id < 21');
while ($donnees = $reponse->fetch()) 
{	
?>
<p> <?php echo $donnees[lastName]." ".$donnees[firstName]; ?></p>
<?php
}
$reponse->closeCursor();
?>


<h1>Exo 4 : Clients ayant une carte de fidelité :</h1>
<?php

$reponse = $bdd->query('SELECT * FROM clients AS C, cards AS A WHERE C.cardNumber = A.cardNumber AND A.cardTypesId = 1');
while ($donnees = $reponse->fetch()) 
{	
?>
<p> <?php echo $donnees[lastName]." ".$donnees[firstName]; ?></p>
<?php
}
$reponse->closeCursor();
?>




<h1>Exo 5 : Clients dont le nom commence par la lettre M :</h1>
<?php

$reponse = $bdd->query('SELECT * FROM clients WHERE lastName LIKE "M%" ORDER BY lastName ASC');
while ($donnees = $reponse->fetch()) 
{	
?>
<p> <?php echo $donnees[lastName]." ".$donnees[firstName]; ?></p>
<?php
}
$reponse->closeCursor();
?>




<h1>Exo 6 : Liste des spectacles avec artistes, dates et heures :</h1>
<?php

$reponse = $bdd->query('SELECT * FROM shows  ORDER BY title ASC');
while ($donnees = $reponse->fetch()) 
{	
?>
<p> <?php echo $donnees[title]." par ".$donnees[performer]." ,le ".$donnees[date]." à ".$donnees[startTime]; ?></p>
<?php
}
$reponse->closeCursor();
?>



<h1>Exo 7: Liste de tous les clients par noms, prenoms, date de naissance, carte de fidelité, numéro de carte :</h1>
<?php

$reponse = $bdd->query('SELECT * from clients LEFT OUTER JOIN cards ON clients.cardNumber=cards.cardNumber ORDER bY clients.id');
while ($donnees = $reponse->fetch()) 
{	
	// var_dump($donnees);
?>
<p> <?php echo "Nom: ".$donnees[lastName]." ,prenom: ".$donnees[firstName]." ,date de naissance: ".$donnees[birthDate]." ,Numéro de carte: ".$donnees[cardNumber]." ,Carte de fidélité: "; 
if($donnees[cardTypesId] != 1 ){
echo "Non";}
else{
echo "Yes";}

?></p>
<?php
}
$reponse->closeCursor();
?>

</body>

</html>