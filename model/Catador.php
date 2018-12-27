<?php
class Catador extends Model{
    private $data;
    const entity = 'catador';
    public function addCatador(array $data){
        $this->data = $data;
        $rs = $this->checkCatador($this->data['catadorNome']);
        if($rs == 1):
            $sql = "INSERT INTO " . self::entity . "(catadorNome, catadorApelido, catadorCEP, catadorEndereco,  catadorNum, catadorBairro, catadorCidade, catadorUF, catadorImagem) 
            VALUES(:catadorNome, :catadorApelido, :catadorCEP, :catadorEndereco, :catadorNum, :catadorBairro, :catadorCidade, :catadorUF, :catadorImagem)";
            $sql =  parent::getConn()->prepare($sql);
            $sql->bindValue(':catadorNome', $this->data['catadorNome']);
            $sql->bindValue(':catadorApelido', $this->data['catadorApelido']);
            $sql->bindValue(':catadorCEP', $this->data['catadorCEP']);
            $sql->bindValue(':catadorEndereco', $this->data['catadorEndereco']);
            $sql->bindValue(':catadorNum', $this->data['catadorNum']);
            $sql->bindValue(':catadorBairro', $this->data['catadorBairro']);
            $sql->bindValue(':catadorCidade', $this->data['catadorCidade']);
            $sql->bindValue(':catadorUF', $this->data['catadorUF']);
                    $type = $_FILES['catadorImagem']['type'];
                    if(in_array($type, array('image/jpeg', 'image/png'))):
                        $tmp_name = md5(time().rand(0, 9999)). '.jpg';
                        move_uploaded_file($_FILES['catadorImagem']['tmp_name'], 'assets/dist/images/catadores/' . $tmp_name);
                        list($w,$h) = getimagesize('assets/dist/images/catadores/' . $tmp_name);
                        $rt = $w/$h;
                        $width = 600;
                        $height = 600;
                        if($width/$height > $rt):
                            $width = $height * $rt;
                        else:
                            $height = $width / $rt;
                        endif;
                        $image = imagecreatetruecolor($width, $height);
                        if($type == 'image/jpeg'):
                            $nImage = imagecreatefromjpeg('assets/dist/images/catadores/' . $tmp_name);
                        elseif($type == 'image/png'):
                            $nImage = imagecreatefrompng('assets/dist/images/catadores/' . $tmp_name);
                        endif;
                        imagecopyresampled($image, $nImage, 0, 0, 0, 0, $width, $height, $w, $h);
                        imagejpeg($image, 'assets/dist/images/catadores/' . $tmp_name, 80);
                        $this->data['catadorImagem'] =  $tmp_name;
                        $sql->bindValue(':catadorImagem', $this->data['catadorImagem']);
                endif;
            $sql->execute($this->data);
            if($sql->rowCount() > 0):
                $id = parent::getConn()->lastInsertId();
            endif;
            return 1;
        else:
            return 2;
        endif;
    }

    private function checkCatador(string $catadorNome){
        $sql = "SELECT COUNT(*) AS c FROM " . self::entity ." WHERE catadorNome = :catadorNome";
        $sql =  parent::getConn()->prepare($sql);
        $sql->bindValue(':catadorNome', $catadorNome);
        $sql->execute();
        $rs = $sql->fetch();
        if($rs['c'] == 0):
            return 1;
        endif;
    }
}