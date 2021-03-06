<?php
    session_start();
    require_once("session.php");
    if (!$prenom) die();
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
</head>
<body onload="resizemenu()" onresize="resizemenu()">
	<?php 
        include("menus.php"); 
	    include("gract.inc");
        include("animateurs.inc");
        include("liOptions.php");
        $postidgr=$_POST['idgroupes'];
        $idgroupes=explode(";",$postidgr);//echo $idgroupes[0]."  ".$idgroupes[1]."<br>";
        $postgr=$_POST['groupes'];
        $tarifA=$_POST['tarifA'];
        $tarifC=$_POST['tarifC'];
        $groupes = explode(";",$postgr);
        $ng = count($groupes);if ($ng<1) $ng=1;
        $ga = new Gracts;
        $ga->gract=array($ng);
        $ga->getpost($ng);//echo "après getpost<br>";
        $ani = new Animateurs;
        $ani->cree();$iact=array($ng);
        for ($i=0;$i<$ng;$i++) {
            $iact[$i]=$ga->gract[$i]->activite;
            $ga->gract[$i]->activite=$activite[intval($ga->gract[$i]->activite)];
            $ga->gract[$i]->animateur = $animateur[intval($ga->gract[$i]->animateur)];
            $ga->gract[$i]->idanimateur=$ani->getid($ga->gract[$i]->animateur);
            $ga->gract[$i]->tarifA=$tarifA;
            $ga->gract[$i]->tarifC=$tarifC;
         }
        if ($_POST['modif']) {
                $rep=true;
                for ($i=0;$i<$ng;$i++) {
                    $rep = ($rep and $ga->gract[$i]->modifie());
                }
    	    if ($rep) echo "</br></br><div class='alerte'>L'activité $ga->activite a bien été modifiée dans la base de données </div>";
    	    else echo "</br></br><div class='alerte'>L'activité $ga->activite n'a pas pu être modifiée dans la base de données !!!</div>";
        } else if ($_POST['supp']) {

        } else if ($_POST['addgr']) {
            $postgr=$_POST['groupes'];
            $groupes = explode(";",$postgr);
            $optionsgroupe="";
            for ($i=1;$i<16;$i++) {
                $trouve=false;$j=0;
                while ((!$trouve)and($j<count($groupes))) {
                    $trouve = ($i == $groupes[$j]);
                    if (!$trouve) $j++;
                }
                if (!$trouve) $optionsgroupe = $optionsgroupe."<option value=$i>$i</option>";
            }
    ?>
    <div class="titre1">Ajout d'un nouveau groupe à l'activité <?php echo $ga->gract[0]->activite ?></div>
<div class="champ">
        <fieldset class="champemprunteurs">
        <form name="formemprunteurs" action="ajoutGroupe.php" method="post">
            <input type="hidden" name="id" value=" <?php echo $ga->gract[0]->id ?>" >
            <input type="hidden" name="activite" value=" <?php echo $iact[0] ?>" >
            <input type="hidden" name="codactivite" value=" <?php echo $ga->gract[0]->codactivite ?>" >
            <input type="hidden" name="tarifA" value=" <?php echo $_POST['tarifA'] ?>" >
            <input type="hidden" name="tarifC" value=" <?php echo $_POST['tarifC'] ?>" >
            <table  class="saisie"> 
                <tr>
                    <th>Animateur</th><th>Groupe</th><th>Lieu</th><th>Jour</th><th>Début</th><th>Fin</th>
                </tr>
                <tr>
                    <td><select name="animateur"> <?php echo $optionsanimateur ?></select></td>
                    <td><select name="groupe"> <?php echo $optionsgroupe ?></select> </td>
                    <td><select name="lieu"> <?php echo $optionslieu ?></select></td>
                    <td><select name="jour"> <?php echo $optionsjour ?></select></td>
                    <td><select name="debut"> <?php echo $optionsdebut ?></select></td>
                    <td><select name="fin"> <?php echo $optionsfin ?></select></td>
                </tr>

            </table></br></br>
            <table>

                <tr>
                    <td> </td>
                    <td><input type="submit" name="annul" value="ANNULER"></td>
                    <td> </td>
                    <td> <input type="submit" name="addgr" value="VALIDER"> </td>
                    <td></td>
                    <td></td>
                </tr>
            </table>

        </form>
    </fieldset> </br>
</div>    
    <?php 
        } else if ($_POST['supgr']) {
            $optionsgroupe="";
            for ($i=0;$i<$ng;$i++) $optionsgroupe = $optionsgroupe."<option value=$groupes[$i]>$groupes[$i]</option>";

    ?>
   <div class="titre1">Suppression d'un groupe à l'activité <?php echo "\"".$ga->activite."\"" ?></div>
<div class="champ">
        <fieldset class="champemprunteurs">
        <form name="formemprunteurs" action="supprimGroupe.php" method="post">
            <input type="hidden" name="activite" value=" <?php echo $iact[0] ?>" >
            <input type="hidden" name="codactivite" value=" <?php echo $ga->gract[0]->codactivite ?>" >
            <input type="hidden" name="idgroupes" value= <?php echo $postidgr ?> >
            <input type="hidden" name="groupes" value= <?php echo $postgr ?> >
            <table  class="saisie"> 
                <tr>
                    <td>Numéro du groupe à supprimer : </td>
                    <td><select name="groupe"> <?php echo $optionsgroupe ?></select> </td>
                    <td></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                </tr>
                <tr>
                    <td><input type="submit" name="annul" value="ANNULER"></td>
                    <td> </td>
                    <td> <input type="submit" name="supgr" value="VALIDER"> </td>
                </tr>
            </table>
        </form>
    </fieldset> </br>
</div>    
    <?php
        } 
    ?>

</body>
</html>