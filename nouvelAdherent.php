<?php
	session_start();
    require_once("session.php");
	if (!$prenom) die();
	include("liOptions.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Club MGEN</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="bibglobal0.css" type="text/css" rel="stylesheet" media="screen"/>
    <link href="msgBoxLight.css" rel="stylesheet">
    <script src="jquery-2.1.4.min.js"></script>
    <script src="jquery.msgBox.js"></script>
    <script src="fonctions.js"></script>
    <script type="text/javascript"></script>
</head>
<body onload="resizemenu()" onresize="resizemenu()">
	<?php include("menus.php"); ?>
	<div class="titre1">Création d'une fiche adhérent</div>
	<div class="champ">
		<fieldset class="champemprunteurs">
			<form name="nouvelAd" method="post" action="ajoutAdherent.php">
			<table  class="saisie">
				<tr>
					<td><select id="titre" name="titre"><option value="Titre">Titre</option><option value="MME">Mme</option><option value="M.">M.</option></select></td>
					<td><label for="nom">Nom : </label></td>
					<td><input id="nom" type="text" size=40 name="nom" class="fichinput" onfocus="blanc(1)" onblur="test(1)"></td>
					<td><label for="nomjf">Nom de jeune-fille: </label></td>
					<td><input id="nomjf" type="text" size=30 name="nomjf"></td>
					
				</tr>
				<tr>
					<td><select id="qualite" name="qualite"><option value="Qualite">Qualité</option><option value="M">Mutualiste</option><option value="C">Conjoint</option></select> </td>			
					<td><label for="prenom">Prénom : </label></td>
					<td><input id="prenom" type="text" size=40 name="prenom" class="fichinput" onfocus="blanc(2)" onblur="test(2)"></td>
					<td><label for="numMGEN">Numéro MGEN : </label></td>
					<td><input id="numMGEN" type="text" size=10 name="numMGEN" class="fichinput" onfocus="blanc(3)" onblur="test(3)"></td>
				</tr>
				<tr>					
					<td> </td>
					<td><label for="telephone">Téléphone : </label> </td>			
					<td><input id="telephone" type="text" size=15 name="telephone" class="fichinput" onfocus="blanc(4)" onblur="test(4)"></td>
					<td><label for="portable">N° portable : </label></td>
					<td><input id="portable" type="text" size=15 name="portable"></td>
				</tr>
				<tr>					
					<td> </td>			
					<td><label for "adresse">Adresse</label></td>
					<td><input id="adresse" type="text" size=40 name="adresse" class="fichinput" onfocus="blanc(5)" onblur="test(5)"></td>
					<td><label for "compadresse">Complément</label></td>
					<td><input id="compadresse" type="text" size=30 name="compadresse"></td>
				</tr>
				<tr>					
					<td> </td>			
					<td><label for "codepostal">Code postal :</label></td>
					<td><input id="codepostal" type="text" size=10 name="codepostal" class="fichinput" onfocus="blanc(6)" onblur="test(6)"></td>
					<td><label for "ville">Ville :</label></td>
					<td><input id="ville" type="text" size=30 name="ville" value="Paris"></td>
				</tr>
				<tr>					
					<td> </td>			
					<td><label for="courriel">Courriel : </label></td>
					<td><input id="courriel" type="text" name="courriel" size=40></td> 
					<td><label for "profession">Profession</label></td>
					<td><select id="profession" name="profession"><?php echo $optionsprofession ?></select></td>
				</tr>
				<tr>					
					<td> </td>			
					<td><label for "assurance">Assurance :</label></td>
					<td><input id="assurance" type="text" size=30 name="assurance" class="fichinput" onfocus="blanc(7)" onblur="test(7)"></td>
					<td><label for="numeroSS">Numéro S.S. : </label>  </td>
					<td><input id="numeroSS" type="text" name="numeroSS" size=25 class="fichinput" onfocus="blanc(8)" onblur="test(8)"></td>
				</tr>
				<tr>					
					<td> </td>			
					<td><label for="cotisation">Cotisation : </label></td></td>
					<td><input type="radio" name="cotisation" id="cotisationP" value=0>A jour &nbsp;&nbsp;&nbsp;
					<input type="radio" name="cotisation" id="cotisationA" value=1>En attente </td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td> </td>
					<td style="float:right">(groupe) </td>
					<td>Activité(s) </td>
					<td style="float:right">(groupe) </td>
					<td>Activité(s) </td>
				</tr>
				<tr>
					<td> </td>

					<td><select name="groupe1" style="float:right"><?php echo $optionsgroupe ?> </select></td>
					<td><select name="activite1"><?php echo $optionsactivite ?></select></td>
					<td><select name="groupe4" style="float:right"><?php echo $optionsgroupe ?> </select></td>
					<td><select  name="activite4" class="selectoption"><?php echo $optionsactivite ?></select></td>
				</tr>			
				<tr>
					<td> </td>
					<td><select name="groupe2" style="float:right"><?php echo $optionsgroupe ?> </select></td>
					<td><select name="activite2" class="selectoption"><?php echo $optionsactivite ?></select></td>
					<td><select name="groupe5" style="float:right"><?php echo $optionsgroupe ?>  </select></td>
					<td><select  name="activite5" class="selectoption"><?php echo $optionsactivite ?></select></td>
				</tr>			
				<tr>
					<td> </td>
					<td><select name="groupe3" style="float:right"><?php echo $optionsgroupe ?>  </select></td>
					<td><select name="activite3" class="selectoption"><?php echo $optionsactivite ?></select></td>
					<td><select name="groupe6" style="float:right"><?php echo $optionsgroupe ?>  </select></td>
					<td><select  name="activite6" class="selectoption"><?php echo $optionsactivite ?></select></td>
				</tr>			
			</table>
					</br>
					<input id="go" type="hidden" value="CONFIRMER">
			</form>
				<td><button id="bouton0" class="bouton"  onclick="valide()">CREER FICHE</button></td>
	
		</fieldset>
	</div>
	<div id="message"></div>
 </body>
 </html>