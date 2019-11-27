@extends('accueil')
@section('navbar')

@php


session_start();
$valeur = session('id');

if (empty($valeur))
{
    echo '<center><font color="red" size="4"><b>Vous devez vous connecter pour acceder à l\'application</center></font><br />
    <FORM ACTION="/connexion">
      <center><INPUT TYPE="SUBMIT" VALUE="Se connecter" id="submit"></center>
    </FORM>';
}

else
{
    echo "USER : $valeur";
    echo "<div class='description'>
      <br><p class='texteAccueil'>Cette application web permet de gérer l'hébergement des ligues sportive
            durant les rencontres.</p>
      <p class='texteAccueil'>Elle offre les services suivants :</p>
      <ul class='list'>
         <p> - Gérer les établissements (caractéristiques et capacités d'accueil) acceptant d'héberger les groupes de sportifs.<br>
          - Consulter, réaliser ou modifier les attributions des chambres aux groupes dans les établissements.</p>
      </ul>
   </div>";


}

@endphp

@stop
