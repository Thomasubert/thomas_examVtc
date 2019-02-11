<?php

class Divers extends Db {

    // Afficher le nombre d'abonnés.
    public static function nombreConducteurs() {
        $req = 'SELECT COUNT(*)
                FROM conducteur';

        return Db::dbQuery($req);
    }

    // Afficher le nombre d'ouvrages.
    public static function nombreVehicules() {
        $req = 'SELECT COUNT(*)
                FROM vehicule';

        return Db::dbQuery($req);
    }

    // Afficher le nombre d'associations.
    public static function nombreAssociations() {
        $req = 'SELECT COUNT(*)
                FROM association_vehicule_conducteur';

        return Db::dbQuery($req);
    }

    // Afficher les ouvrages n'ayant pas été empruntés.
    public static function vehiculesPasLoues() {
        $req = 'SELECT *
                FROM vehicule
                LEFT JOIN association_vehicule_conducteur ON association_vehicule_conducteur.id_vehicule = vehicule.id
                WHERE id_conducteur IS NULL';

        return Db::dbQuery($req);
    }

    // Afficher les abonnés n'ayant pas emprunté de livre.
    public static function conducteursPasLoueurs() {
        $req = 'SELECT *
                FROM conducteur
                LEFT JOIN association_vehicule_conducteur ON association_vehicule_conducteur.id_conducteur = conducteur.id
                WHERE id_vehicule IS NULL';

        return Db::dbQuery($req);
    }

    // Afficher tous les ouvrages empruntés par 1 abonné, trouvé par son nom (le WHERE doit contenir le nom et pas l'ID, de l'abonné de votre choix).
    public static function vehiculesEmpruntesParTelConducteur() {
        $req = 'SELECT marque, modele
                FROM vehicule
                INNER JOIN association_vehicule_conducteur ON association_conducteur_vehicule.id_vehicule = vehicule.id
                INNER JOIN abonne ON association_vehicule_conducteur.id_conducteur = conducteur.id';

        return Db::dbQuery($req);
    }

    // Afficher tous les abonnés (meme ceux qui n'ont pas emprunté) ainsi que les ouvrages - pour ceux qui ont emprunté.
    public static function tousLesConducteursPlusVehicules() {
        $req = 'SELECT *
                FROM conducteur
                LEFT JOIN association_vehicule_conducteur ON conducteur.id = association_vehicule_conducteur.id_conducteur
                LEFT JOIN vehicule ON vehicule.id = association_vehicule_conducteur.id_vehicule';

        return Db::dbQuery($req);
    }

    // Afficher les ouvrages (meme ceux qui n'ont pas été empruntés), ainsi que les abonnés - pour ceux qui ont été empruntés.
    public static function tousLesVehiculesPlusConducteurs() {
        $req = 'SELECT *
                FROM vehicule
                LEFT JOIN association_vehicule_conducteur ON vehicule.id = association_vehicule_conducteur.id_vehicule
                LEFT JOIN conducteur ON conducteur.id = association_vehicule_conducteur.id_conducteur';

        return Db::dbQuery($req);
    }

}