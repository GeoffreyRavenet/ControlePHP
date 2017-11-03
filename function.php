<?php
session_start();
//fonction verification que le champ sois remplie
function verifInfo(){
            //Verification du clique
            if(isset($_POST['Connection']) or isset($_POST['Ajouter'])){
                //Verification que le champ id et mod de passe soit bien remplie
                if(empty($_POST['id'])){
                    echo "Vous devez rempire le champ identifiant";
                }
                else if(empty($_POST['mdp'])){
                    echo "Vous devez rempire le champ mot de passe";
                }
                else{
                stockAdmin($_POST['id'],$_POST['mdp']);
                verifAdmin($_POST['id'],$_POST['mdp']);
                }
            
            }
}
//fonction pour stoker les donnees du formulaire dans un csv
function stockAdmin($id,$mdp){
    //On recuper les donnes du formulaire pour les stockes dans un tableau 
    $Donne[] = array($id,$mdp);
    //on creer un fichier csv avec les droits de lecture et ecriture
    $fp = fopen('file.csv', 'a+');
    foreach ($Donne as $stock){
        fputcsv($fp, $stock);
    }
    fclose($fp);
}
//Fonction pour verifier que l'utilisateur existe
function verifAdmin($id,$mdp){
    $verif = fopen('file.csv', 'r');
	while ($data =  fgetcsv($verif,",")){
        if($data[0] == $id and $data[1] == $mdp){
        $_SESSION['id']=$id;
        $_SESSION['mdp']=$mdp;
        header('Location: ajoutUser.php');  
       }
    }
    fclose($verif);
}
//fonction pour lire et afficher mon fichier csv
function lireAdmin(){
    $lire = fopen('file.csv', 'r');
    $num = 1;
    echo "<form method='post' action='ajoutUser.php'>
            <table>
                <tr>
                    <th>Identifient</th>
                    <th>Mot de passe</th>
                </tr>";
    while ($data =  fgetcsv($lire,",")){
        
        if($data[0]){
            echo '<tr><td><input type="text" value="'.$data[0].'"></td>';
        }
        if($data[1]){
            echo '<td><input type="text" value=""></td>';
            echo '<input type=hidden value="'.$num.'">';
            echo '<td><input type="submit" value="Supprimer" name="Supprimer"/></td></tr>';
            $num+=1;
        }
        
    }
    echo '</table><input type="submit" value="Modifier" name="Modifier"/></form>';
}
//Fonction pour supprimer ta session
function deconnection(){
    if(isset($_POST['Déconnection'])){
       session_destroy(); 
    }
    
} 
/*function supprimeLigne(){
    $Supp = fopen('file.csv', 'a+');
    if(isset($_POST['Supprimer'])){
        while ($data =  fgetcsv($Supp,",")){
            
        }
    }
}*/

function modifTableau($id,$mdp,$num){
    $modif = fopen('file.csv', 'a+');
    $valeur_orgine;
    while ($ligne = fgetcsv($modif,','))
    {
    $valeur_origine[] = array($ligne[0],$ligne[1],$ligne[2]);
    } 
    if(isset($_POST['Modifier'])){
        while ($data =  fgetcsv($modif,",")){
            $csv[] = $data;
            if($_POST[1]== $num){
                echo 'coucou';
            }
        }
        
        //foreach($csv as )
    }


}

?>