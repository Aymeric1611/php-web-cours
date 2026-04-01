<?php
$statutOptions = [
    '' => "-- Sélectionner un statut",
    "etudiant" => "Etudiant",
    "enseigant" => "Enseignant",
    "administratif" => "Administratif"
];
//definir une variable par champs du formaulaire
$pseudi = "";
$email = "";
$statut = "";
$erreurs = []; //tableau associatif
//detecter la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    //formulaire soumis
    //recuperer chaque champs
    $pseudo = trim($_POST['pseudo'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $statut = trim($_POST['statut'] ?? '');
}
//validation du pseudo
if ($pseudo === ''){
    //le pseudo n'a pas ete saisi
    $erreurs['pseudo'] = "Le pseudo est obligatoire";
} elseif (mb_strlen($pseudo)<3){
    $erreurs['pseudo'] = "Le pseudo doit être d'au minimum de 3 caractère";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un profil</title>
    <link rel="stylesheet" href="css/style-base.css">
</head>

<body>

    <div class="card">

        <header class="card-header">
            <h1>Créer un profil</h1>
            <hr>
        </header>

        <form action="" method="POST" autocomplete="off">

            <!-- PSEUDO -->
            <div class="form-group">
                <label for="pseudo">Pseudo <span class="required">*</span> :</label>
                <input type="text"
                    id="pseudo"
                    name="pseudo"
                    placeholder="Ex: FL39"
                    required
                    minlength="3">
                <?php if (isset($erreurs['pseudo'])) :?>
                    <div class="erreur-message"><?= $erreurs['pseudo'] ?></div>
                <?php endif; ?>
                <div class="hint">3 caractères minimum</div>
            </div>

            <!-- EMAIL -->
            <div class="form-group">
                <label for="email">Email <span class="required">*</span> :</label>
                <input type="email"
                    id="email"
                    name="email"
                    placeholder="votre@email.fr"
                    required>
            </div>

            <!-- STATUT -->
            <div class="form-group">
                <label for="statut">Statut <span class="required">*</span> :</label>
                <select id="statut" name="statut" required>
                    <!-- remplissage dynamique des options -->
                    <?php foreach ($statutOptions as $valeur => $libelle) :?>
                        <option value="<?= $valeur ?>"><?= $libelle ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <p class="legend">Le caractère <span class="required">*</span> indique un champ obligatoire.</p>

            <button type="submit" class="btn-submit">
                Créer profil
            </button>

        </form>

    </div>

</body>

</html>