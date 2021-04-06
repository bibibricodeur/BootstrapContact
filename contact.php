<?php

// Vérfication réalité données envoyées par le formulaire
if (isset($_POST['formNom']) && !empty($_POST['formNom'])
AND isset($_POST['formCourriel']) && !empty($_POST['formCourriel'])
AND isset($_POST['formSujet']) && !empty($_POST['formSujet'])
AND isset($_POST['formRuse']) && empty($_POST['formRuse'])
AND isset($_POST['formMessage']) && !empty($_POST['formMessage'])) 
{
    extract($_POST);
    
    // Nettoyage et affectations variables
    $formNom        = htmlspecialchars($_POST['formNom']);
    $formCourriel   = htmlspecialchars($_POST['formCourriel']);
    $formSujet      = htmlspecialchars($_POST['formSujet']);
    $formMessage    = htmlspecialchars($_POST['formMessage']);

    // Préparation envoi
    $courrielNom    = $formNom;
    $courrielPour   = 'bibibricodeur@gmail.com';
    $courrielSujet  = $formSujet;
    $courrielEmail  = $formCourriel;
    $courrielMessage= 'De la part de: ' . $formNom . "\r\n" .  'Message: ' . $formMessage;

    // Envoi
    $courrielEntete = 'Répondre à: ' . $courrielEmail;
    mail($courrielPour, $courrielSujet, $courrielMessage, $courrielEntete);

    // Redirection si envoi OK
    header('Location: https://github.com/bibibricodeur');

} else {
    // Redirection si envoi KO => CHANGER OBLIGATOIREMENT EN PRODUCTION !!!
    var_dump($_POST);
}

?>