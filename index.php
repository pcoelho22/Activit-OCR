<!DOCTYPE html>
<html>
<head>
	<title>Exercice 2</title>
	<meta charset="UTF-8">
</head>
<body>
<?php

// J'initialise mes variables
$lastname = '';
$firstname = '';
$age = '';
$formOk = false;

// Si formulaire soumis
if (!empty($_POST)) {
	//print_r($_POST);
	$formOk = true;
	// Je récupère mes variables en POST
	$lastname = isset($_POST['lastname']) ? trim($_POST['lastname']) : '';
	$firstname = isset($_POST['firstname']) ? trim($_POST['firstname']) : '';
	$age = isset($_POST['age']) ? intval(trim($_POST['age'])) : 0;

	// Je vérifie les variables (non vide + au moins 3 caractères)
	if (empty($lastname)) {
		echo 'Le nom est vide<br>';
		$formOk = false;
	}
	else if (strlen($lastname) < 3) {
		echo 'Le nom est incorrect<br>';
		$formOk = false;
	}
	if (empty($firstname)) {
		echo 'Le prénom est vide<br>';
		$formOk = false;
	}
	else if (strlen($firstname) < 3) {
		echo 'Le prénom est incorrect<br>';
		$formOk = false;
	}
	if ($age <= 0) {
		echo 'L\'age est vide ou incorrect<br>';
		$formOk = false;
	}

	if ($formOk) {
		echo 'Nom : '.$lastname.'<br>';
		echo 'Prénom : '.$firstname.'<br>';
		echo 'Age : '.$age.'<br>';
	}
}

?>

<?php if (!$formOk) : ?>
	<form method="POST">
	    <label for="lastname">Nom</label>
	    <input type="text" placeholder="Nom" id="lastname" name="lastname" value="<?= $lastname ?>"/>
	    
	    <label for="firstname">Prénom</label>
	    <input type="text" placeholder="Prénom" id="firstname" name="firstname" value="<?= $firstname ?>" />

	    <label for="age">Age</label>
	    <input type="number" placeholder="Age" id="age" name="age" value="<?= $age ?>" />

	    <button type="submit">Envoyer</button>
	</form>
<?php endif; ?>
</body>
</html>