<?php
//Appel du fichier function.php avec require
require('function.php');
?>
<html>
    <head>
        <titel><h1>Exo cour php</h1></titel>
    </head>
    <body>
    
    <?php
    //if(isset($_POST['Inscription'])){
    verifInfo();   
?>
    <form method="post" action="index.php">
		<p> 
			<label>Identifiant </label> :<input type="text" name="id" placeholder="Ex: Toto"/></br>
			<label>Mot de passe </label> :<input type="password" name="mdp" placeholder="Mon mot de passe"/></br>
			<input type="submit" value="Connection" name="Connection" />
		</p>
	</form>
    </body>
</html>