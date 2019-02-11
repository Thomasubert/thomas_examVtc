<?php

class LocationsController {

    public function index() {
        $locations = Locations::findAll();
        view('locations.index', compact('locations'));

    }

    public function add() {

        $conducteurs = Conducteur::findAll();
        $vehicules = Vehicule::findAll();
        view('locations.add', compact('conducteurs', 'vehicules'));

    }

    public function save() {

        $locations = new Locations($_POST['id_conducteur'], $_POST['id_vehicule'], $_POST['id_vehicule_conducteur']);
        $locations->save();

        Header('Location: '. url('locations'));
        exit();

    }

    public function delete() {

    }

}