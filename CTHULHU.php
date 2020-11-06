<?php
/*
Author : Aymeric aymericherchuelz19
Created Date : 2020-08-27
Aim : learn toto php and html
*/
$titre="Connexion";
?>

<!DOCTYPE html>
<html>
<!--entete avec feuille de style, titre, encodage -->
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
 </head>

 <body>
   <!--message de Bienvenue -->
  <div id="container">
	<?php
// formulaire qui renvoie pseudo et password a la page .php
if ( empty($_GET['deconnexion']))  $_GET['deconnexion']=false ;

			if ( empty($_POST['username']) || $_GET['deconnexion']==true ) //On est dans la page de formulaire
			{
				echo '
				<form method="post" action="CTHULHU.php">
        <h1>cthulhu</h1>
        <label><b>Nom d\'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d\'utilisateur" name="username" required>

        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="password" required>

        <input type="submit" id="submit" value="LOGIN" >
				</form>';
			}
      //si connecter, motivation presenter
			else{
// connecte false jusqu a tant de trouver username dans DB ou tableau PHP
$connect=false;

// Acces BD
$servername = 'localhost';
$username = 'aymeric';
$password = 'LinkinPark19';
$DB='connexion';
  //On établit la connexion
$conn = new mysqli($servername, $username, $password, $DB);
  //On vérifie la connexion
  if($conn->connect_error)
  {
          die('Erreur : ' .$conn->connect_error);
  }
    $result = $conn->query('SELECT username,password FROM compte;');
    //printf('Select a retourné %d lignes.\n', $result->num_rows);
    while ($row = $result->fetch_row()) {
                //printf("%s\n", $row[0]);
                if($row[0]==$_POST['username'] && $row[1]==$_POST['password'])
                {
                  //echo 'Bienvenue : '.$c. ' : ' .$v. '<br>';
                  $connect=true;
                }
            }

    /* Libération du jeu de résultats */
    $result->close();



// Tableau des users et mdp
 $utilisateurs = [
                ['username' => 'chimera', 'password' => 'chimera'],
                ['username' => 'Ben', 'password' => 'Ben']
              ];

foreach($utilisateurs as $nb => $infos){
      foreach ($infos as $c => $v){
          if($v==$_POST['username'] && $v==$_POST['password'])
          {
            //echo 'Bienvenue : '.$c. ' : ' .$v. '<br>';
            $connect=true;
          }
        }
      echo '<br>';
  }
if($connect==true) {
  echo '<h2>Connexion réussie</h2>';
  echo '<h1><FONT size="15pt">cthulhu</h1><img src="image/65dd2b2c16b73b5fe216aa696f8bb156.jpg" /><FONT size="7pt"><p>Cthulhu est une monstrueuse entité cosmique inventée par l écrivain américain Howard Phillips Lovecraft dans sa nouvelle L Appel de Cthulhu, publiée dans le pulp Weird Tales en 1928.

Gigantesque créature extraterrestre endormie depuis des millénaires dans la cité de R\'lyeh engloutie sous les flots de l Océan pacifique, Cthulhu est vénéré tel un dieu par des humains dévoyés et des êtres aquatiques qui lui vouent un culte immémorial par le biais de sculptures antédiluviennes. Celles-ci reproduisent sa forme vaguement humanoïde complétée d une tête de seiche, de tentacules de pieuvre et d ailes semblables à celles d un dragon.

L écrivain August Derleth désigne sous le vocable « mythe de Cthulhu » l ensemble des pastiches littéraires qui s inspirent de l univers fictionnel de Lovecraft. Le terme est resté, contribuant à multiplier les références à la créature dans la culture populaire à travers la littérature, les jeux de rôle et les jeux vidéo. </p>
  <a href="CTHULHU.php?deconnexion=true"><FONT size="10pt"><span>deconnexion</a></br>';
}

else {
  echo '<a href="CTHULHU.php?deconnexion=false"><FONT size="10pt"><span> Vous n\'avez pas les accès-cliquer ici </span></a><img src="image/AnimatedWave.gif" />';
}

 } // fin premier else (si connecter)  ?>



   </div>

    </body>
</html>
