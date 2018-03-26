<?php
require 'autoload.php';

$config = parse_ini_file('config.ini');

$username = $config['username'];
$password = $config['password'];
$host = $config['host'];
$port = $config['port'];
$charset = $config['charset'];
$db = $config['db'];

$dsm = "mysql:host=$host;dbname=$db;port=$port;charset=$charset";
$connexion = new PDO($dsm, $username, $password);
$dao = new personnageDAO($connexion);
$listeDeTousLesPersonnages = $dao -> findAllPersonnage();

$messageErreurCreation = null;
$messageErreurSuppression = null;

$activation = "disabled";


// Afficher le tableau de tous les élements personnages déja creer.




// 1. Je recolte les données du formulaire dans des variables
// Si un nom a été rentré dans le champ nickname, il est attribué a la variable £nickname, si vide c'est null qui est attribué
$nickname = isset($_POST['nickname']) ? $nickname = $_POST['nickname'] : $nickname = null; 
$power = isset($_POST['power']) ? $power = $_POST['power'] : $power = null;
$localisation = isset($_POST['loc']) ? $localisation = $_POST['loc'] : $localisation = null;

$creer = isset($_POST['creer']) ? $creer = $_POST['creer'] : $creer = null;
$modifier = isset($_POST['modifier']) ? $modifier = $_POST['modifier'] : $modifier = null;
$selectionner = isset($_POST['selectionner']) ? $selectionner = $_POST['selectionner'] : $selectionner = null;
$supprimer = isset($_POST['supprimer']) ? $supprimer = $_POST['supprimer'] : $supprimer = null;



// 2.a) Condition sur l'action Creer un nouveau personnage

if (isset($creer)) {
    
    if (!$dao ->findOnePersonnageIfExist($nickname)) { /* Si ce personnage n'existe pas fait ce qui vient*/
    $personnage = new personnage();
    $personnage -> setNickname($nickname);
    $personnage -> setPower($power);
    $personnage -> setLoc($localisation);
    
    $dao -> addPersonnage($personnage); 
    } else {                                           /* Si ce personnage existe execute le code suivant*/
        $messageErreurCreation = "Ce personnage existe deja";
        $nickname = null;
        $power = null;
        $localisation = null;
    }
}

// 2.b) Condition sur l'action supprimer un personnage

if (isset($supprimer)) {
    
    if (!$dao ->findOnePersonnageIfExist($nickname)) {
        $messageErreurSuppression = "Ce personnage n'existe pas" ;
    }
    
    else { 
        $dao -> deletePersonnageByNickname($nickname);
        
    }
}

// 2.c) Condition sur l'action de modifier un personnage

if (isset($modifier)) {
    
    if (!$exist = $dao -> findPersonnageByNickname($nickname)) {
        $messageErreurSuppression = "Ce personnage n'existe pas" ;
        
    } else {
    
        $existe = $dao -> findPersonnageByNickname($nickname);
        $existe -> setNickname($nickname);
        $existe -> setPower($power);
        $existe -> setLoc($localisation);    
    
        $dao -> majPersonnageById($existe);}
}

// 2.d) Condition sur l'action de selectionner un personnage


if (isset($selectionner)) {
    if($resulatSelection = $dao -> findPersonnageByNickname($nickname)) {
    
    $nickname = $resulatSelection -> getNickname();
    $power = $resulatSelection -> getPower();
    $localisation = $resulatSelection -> getLoc();
    $activation = "enabled";
    } else {
        $activation = "disabled";
    }
}


?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creer votre personnage</title>
  <link rel="stylesheet" href="">
  <style>
  form {
	display:block;
	width:300 px;
	margin:0 auto;
}

table {
    margin: 25px auto;
    padding: 10px;
    background-color: rgba(34,34,34,0.6);
}

form label {
    display: block;
    margin: 0 auto;
    width: 300px;
    text-align: center;
    font-weight:800;
}

form input {
    margin: 10px auto;
    width: 200px;
    display: block;
    padding: 5px;
}
  
  </style>
  
</head>

<body>


<table>
	<thead>
		<tr>
			<td>Identifiant </td>
    		<td>Pseudo</td>
    		<td>Force</td>
    		<td>Experience</td>
    		<td>Localisation</td>
    		<td>Degats</td>
		</tr>
	</thead>
	<tbody>
		<?php $incrementationId = 0;
		foreach ($listeDeTousLesPersonnages as $personnage) { ?>
			
		    <tr>
		    <td><?php echo $personnage -> getId();?></td>
		    <td><?php echo $personnage -> getNickname();?></td>
		    <td><?php echo $personnage -> getPower();?></td>
		    <td><?php echo $personnage -> getExp();?></td>
		    <td><?php echo $personnage -> getLoc();?></td>
		    <td><?php echo $personnage -> getDegats();?></td></tr>
    
		<?php } ?>
		
		
		
	</tbody>

</table>


<form action="admin.php" method="post">

<label>Quel sera le nom de votre personnage :</label>
<input type="text" name="nickname" value="<?php echo $nickname;?>"><br>
<span><?php echo $messageErreurCreation; echo $messageErreurSuppression;?></span>
 
<label>Force de votre personnage :</label>
<input type="text" name="power" value="<?php echo $power;?>"><br>

<label>Dans quelle ville commencera t'il son aventure :</label>
<input type="text" name="loc" value="<?php echo $localisation; ?>"><br>

<input type="submit" name="creer" value="Creer">
<input type="submit" name="selectionner" value="Selectionner">
<input type="submit" name="modifier" value="Modifier"  <?php echo $activation; ?>>
<input type="submit" name="supprimer" value="Supprimer"  <?php echo $activation; ?>>

<?php 

$roger = new personnage();
$roger -> setNickname("Roger");
$zobe = new magicien();
$zobe -> setNickname("Zobe");

$zobe -> bouleDeFeu($roger);
$roger -> showMeYourSwag();



?>

</form>

</body>
</html>

