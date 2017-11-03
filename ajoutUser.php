<?php
require('function.php');
if(isset($_SESSION['id']) and isset($_SESSION['mdp'])){

verifInfo();
deconnection()
?>
<html>
	<body>
	<div>Bonjou <?php echo $_SESSION['id']; ?>
		<form method="post" action="index.php">
			<input type="submit" value="Déconnection" name="Déconnection"/>
		</form>
	</div></br>

		<form method="post" action="ajoutUser.php">
				<p> 
					<label>Identifiant </label> :<input type="text" name="id" placeholder="Ex: Toto"/></br>
					<label>Mot de passe </label> :<input type="password" name="mdp" placeholder="Mon mot de passe"/></br>
					<input type="submit" value="Ajouter" name="Ajouter" />
				</p>
		</form>
		<?php
		lireAdmin();
		?>
	</body>
</html>
<?php
}
?>