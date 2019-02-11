<?php

class Locations extends Db {

    protected $id_association;
    protected $id_conducteur;
    protected $id_vehicule;

    const TABLE_NAME = 'association_vehicule_conducteur';

    public function __construct($id_conducteur, $id_vehicule, $id_association = null) {
        $this->setIdConducteur($id_conducteur);
        $this->setIdVehicule($id_vehicule);
        $this->setId($id_association);
    }
    /**
     * Get the value of id
     */ 
    public function id_association()
    {
        return $this->id_association;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id_association)
    {
        $this->id_association = $id_association;

        return $this;
    }

    /**
     * Get the value of id_abonne
     */ 
    public function idConducteur()
    {
        return $this->id_conducteur;
    }

    /**
     * Set the value of id_abonne
     *
     * @return  self
     */ 
    public function setIdConducteur($id_conducteur)
    {
        $this->id_conducteur = $id_conducteur;

        return $this;
    }

    /**
     * Get the value of id_ouvrage
     */ 
    public function idVehicule()
    {
        return $this->id_vehicule;
    }

    /**
     * Set the value of id_ouvrage
     *
     * @return  self
     */ 
    public function setIdVehicule($id_vehicule)
    {
        $this->id_vehicule = $id_vehicule;

        return $this;
    }

    public static function findOne(int $id_association) {

        $data = Db::dbFind(self::TABLE_NAME, [
            ['id_association' => $id_association]
        ]);

        if(count($data) > 0) $data = $data[0];
        else return;

        $locations = new Locations($data['id_conducteur'], $data['id_vehicule'], $data['id_association']);

        return $locations;

    }

    public static function findAll() {

        $datas = Db::dbFind(self::TABLE_NAME);

        $locations = [];

        foreach($datas as $data) {
            $locations[] = new Locations($data['id_conducteur'], $data['id_vehicule'], $data['id_association']);
        }

        return $locations;

    }
    public function save() {

        $data = [
            "id_conducteur"     => $this->idConducteur(),
            "id_vehicule"    => $this->idVehicule(),
        ];

        if ($this->id_association() > 0) return $this->update();
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);
        return $this;
    }

    public function update() {

        if ($this->id_association > 0) {
            $data = [
                "id_conducteur"     => $this->id_conducteur(),
                "id_vehicule"    => $this->id_vehicule(),
                "id_association"        => $this->id_association()
            ];
            Db::dbUpdate(self::TABLE_NAME, $data, 'id_locations');
            return $this;
        }
        return;
    }

    public function delete() {

        $data = [
            'id_association' => $this->id_association(),
        ];
        
        Db::dbDelete(self::TABLE_NAME, $data);

        // On supprime aussi tous les emprunts !
        Db::dbDelete(Locations::TABLE_NAME, [
            'id_conducteur' => $this->id_association()
        ]);

        return;
    }

    public function conducteur() {

        return Conducteur::findOne($this->id_conducteur());
    }

    public function vehicule() {
        return Vehicules::findOne($this->id_vehicule());
    }
}