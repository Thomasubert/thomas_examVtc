<?php

class PagesController {

    public function home() {

        view('pages.home');

    }

    public function divers() {

        echo "<hr>Afficher le nombre de conducteurs.";
        var_dump(Divers::nombreConducteurs());
        echo "<hr>Afficher le nombre de véhicules.";
        var_dump(Divers::nombreVehicules());
        echo "<hr>Afficher le nombre d'associations.";
        var_dump(Divers::nombreAssociations());
        echo "<hr>Afficher les véhicules n'ayant pas été loués.";
        var_dump(Divers::vehiculesPasLoues());
        echo "<hr>Afficher les conducteurs n'ayant pas loué de voiture.";
        var_dump(Divers::conducteursPasloueurs());
        echo "<hr>Afficher toutes les voitures louées par 1 conducteur.";
        var_dump(Divers::vehiculesEmpruntesParTelConducteur());
        echo "<hr>Afficher tous les conducteurs ainsi que les voitures.";
        var_dump(Divers::tousLesConducteursPlusVehicules());
        echo "<hr>Afficher les voitures (meme celles qui n'ont pas été louées), ainsi que les conducteurs";
        var_dump(Divers::tousLesVehiculesPlusConducteurs());
    }
}