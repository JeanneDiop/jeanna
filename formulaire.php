<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conversion fcfa en euro</title>
</head>
<body>
  <h1>conversion cfa en euro</h1>
  
<form action="formulaire.php" method="post">
Montant en FCFA : <input type="number" name="montant_fcfa" required><br><br>
                  <input type="submit" value="Convertir"><br><br>
                  <input type="number" name="montant_euro" value=<?=convertirFcfaenEuro($_POST['montant_fcfa'])?>><br><br>
                
                  
 
    
 </form>
  
  <?php
  session_start();

  function convertirFcfaenEuro($montant_conersion){
    if($_SERVER ["REQUEST_METHOD"]=="POST")
     $montant_fcfa=$_POST["montant_fcfa"];
    $somme_convertis=$montant_fcfa/600;
    return $somme_convertis;

  
  }
 

// Vérifier si le tableau de session pour l'historique existe
if (!isset($_SESSION['historique'])) {
  $_SESSION['historique'] = array();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupérer le montant en CFA soumis dans le formulaire
  $montant_fcfa = $_POST["montant_fcfa"];

  // Appeler la fonction de conversion
  $montant_euro = convertirFcfaenEuro($montant_fcfa);

  // Ajouter la conversion à l'historique
  $_SESSION['historique'][] = array(
      'montant_fcfa' => $montant_fcfa,
      'montant_euro' => $montant_euro
  );

  echo "Le montant en euro est : $montant_euro" . "<br>";
}

// Afficher l'historique
echo "<h2>Historique de conversion en euro :</h2>";
echo "<ul>";
foreach ($_SESSION['historique'] as $conversion) {
  echo "<li>Montant en CFA : " . $conversion['montant_fcfa'] . ";   Montant en Euro : " . $conversion['montant_euro'] . "</li>";
}
echo "</ul>";
  
  ?>  
</body>
</html>