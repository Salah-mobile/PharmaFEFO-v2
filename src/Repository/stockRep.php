<?php
namespace Repository;
use config\connection;
class stockRep{
    private $connection;
    public function __construct(){
        $this->connection=connection::getConnection();
    }
    public function getAllProduct(){
        try {
            $sql="SELECT l.id,p.id,p.nom,p.reference,p.prix,l.quantite,l.date_peremption,l.numero_lot,l.statut 
            FROM produits p 
            JOIN lot_stocks l ON P.id=l.produit_id";
            $stm=$this->connection->prepare($sql);
            $stm->execute();
            $res=$stm->fetchAll();
            return $res;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function addNewLot($product_id,$numLot,$quantite,$datePer,$status){
        try {
            $sql="INSERT INTO lot_stocks (produit_id,numero_lot,quantite,date_peremption,statut) 
            values($product_id,$numLot,$quantite,$datePer,$status)";
            $stm=$this->connection->prepare($sql);
            $stm->execute($status);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function updateStatusLots($lot_id,$newSt){
          try {
            $sql="UPDATE lot_stocks set statut=? WHERE lot_stocks.id=?";
            $stm=$this->connection->prepare($sql);
            $stm->execute([$newSt,$lot_id]);
        } catch (PDOException $e) {
            return $e->getMessage();
          }
    }
    public function getPerimiProduct(){
        try {
            $sql ="SELECT * FROM lot_stocks l 
            JOIN produits p on l.produit_id=p.id 
            WHERE l.date_peremption<now()";
            $stm=$this->connection->prepare($sql);
            $stm->execute();
            return $res=$stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }    
}