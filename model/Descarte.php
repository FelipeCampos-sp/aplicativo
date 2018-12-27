<?php

class Descarte extends Model{
    private $data ;
    const entity = 'descarte';
    public function addCollectionPoints(array $data){
        $this->data = $data;
        $sql = "INSERT INTO " .self::entity. "(descarteCEP, descarteRua, descarteNumero, descarteBairro, descarteCidade,
         descarteUF, descarteIBGE, descarteDataColeta) 
         VALUES(:descarteCEP, :descarteRua, :descarteNumero, :descarteBairro, :descarteCidade, :descarteUF, :descarteIBGE, :descarteDataColeta)";
         $sql =  parent::getConn()->prepare($sql);
         $sql->bindValue(':descarteCEP', $this->data['descarteCEP']);
         $sql->bindValue(':descarteRua', $this->data['descarteRua']);
         $sql->bindValue(':descarteNumero', $this->data['descarteNumero']);
         $sql->bindValue(':descarteBairro', $this->data['descarteBairro']);
         $sql->bindValue(':descarteCidade', $this->data['descarteCidade']);
         $sql->bindValue(':descarteUF', $this->data['descarteUF']);
         $sql->bindValue(':descarteIBGE', $this->data['descarteIBGE']);
         $sql->bindValue(':descarteDataColeta', $this->data['descarteDataColeta']);
         $sql->execute($this->data);

         if($sql->rowCount() > 0):
            $id = parent::getConn()->lastInsertId();
            return true;
         else: 
            return false;
         endif;
    }
}