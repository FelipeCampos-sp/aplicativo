<?php
use PHPMailer\PHPMailer\PHPMailer;
class User extends Model{
    private $id;
    private $data;
    const entity = 'user';

    public function logout(){
        if(!empty($_SESSION['fwsp'])):
            unset($_SESSION['fwsp']);
        endif;
    }

    public function addUser(array $data){
        $this->data = $data;
        $rs = $this->checkUser($this->data['userMail']);
        if($rs == 1):
            $sql = "INSERT INTO " . self::entity . "(userName, userMail, userPassword,  userPhone, userImage) VALUES(:userName, :userMail, :userPassword, :userPhone, :userImage)";
            $sql =  parent::getConn()->prepare($sql);
            $sql->bindValue(':userName', $this->data['userName']);
            $sql->bindValue(':userMail', $this->data['userMail']);
            $sql->bindValue(':userPass', $this->data['userPassword']);
            $sql->bindValue(':userPhone', $this->data['userPhone']);
                    $type = $_FILES['userImage']['type'];
                    if(in_array($type, array('image/jpeg', 'image/png'))):
                        $tmp_name = md5(time().rand(0, 9999)). '.jpg';
                        move_uploaded_file($_FILES['userImage']['tmp_name'], 'assets/dist/images/usuarios/' . $tmp_name);
                        list($w,$h) = getimagesize('assets/dist/images/usuarios/' . $tmp_name);
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
                            $nImage = imagecreatefromjpeg('assets/dist/images/usuarios/' . $tmp_name);
                        elseif($type == 'image/png'):
                            $nImage = imagecreatefrompng('assets/dist/images/usuarios/' . $tmp_name);
                        endif;
                        imagecopyresampled($image, $nImage, 0, 0, 0, 0, $width, $height, $w, $h);
                        imagejpeg($image, 'assets/dist/images/usuarios/' . $tmp_name, 80);
                        $this->data['userImage'] =  $tmp_name;
                        $sql->bindValue(':userImage', $this->data['userImage']);
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

    public function userUpdate(array $data){
        $this->data = $data;
            $sql = "UPDATE " . self::entity . " SET userPassword = :up, userCode = :uc, userPhone = :uf WHERE id = :id";
            $sql = parent::getConn()->prepare($sql);
            $sql->bindValue(':up', md5($this->data['userPassword']));
            $sql->bindValue(':uc', $this->data['userCode']);
            $sql->bindValue(':uf', $this->data['userPhone']);
            $sql->bindValue(':id', $this->data['id']);
            if($sql->execute()):
                return true;
            else:
                return false;
            endif;
    } 

    public function userUpdateWithImage(array $data){
        $this->data = $data;
        $sql = "UPDATE " . self::entity . " SET userPassword = :up, userCode = :uc, userImage = :ui, userPhone = :uf  WHERE id = :id";
        $sql = parent::getConn()->prepare($sql);
        $sql->bindValue(':up', md5($this->data['userPassword']));
        $sql->bindValue(':uc', $this->data['userCode']);
        $sql->bindValue(':uf', $this->data['userPhone']);
        $sql->bindValue(':id', $this->data['id']);
            
                $type = $_FILES['userImage']['type'];
                if(in_array($type, array('image/jpeg', 'image/png'))):
                    $tmp_name = md5(time().rand(0, 9999)). '.jpg';
                    move_uploaded_file($_FILES['userImage']['tmp_name'], 'assets/dist/images/usuarios/' . $tmp_name);
                    list($w,$h) = getimagesize('assets/dist/images/usuarios/' . $tmp_name);
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
                        $nImage = imagecreatefromjpeg('assets/dist/images/usuarios/' . $tmp_name);
                    elseif($type == 'image/png'):
                        $nImage = imagecreatefrompng('assets/dist/images/usuarios/' . $tmp_name);
                    endif;
                    imagecopyresampled($image, $nImage, 0, 0, 0, 0, $width, $height, $w, $h);
                    imagejpeg($image, 'assets/dist/images/usuarios/' . $tmp_name, 80);
                        $this->data['userImage'] =  $tmp_name;
                        $sql->bindValue(':ui', $this->data['userImage']);
                endif;
            
        $sql->execute();
        if($sql->rowCount() > 0):
            return true;
        else:
            return false;
        endif;
    }

    public function getUserFromId($id){
        $data = [];
        $sql = "SELECT * FROM " . self::entity ." WHERE id = :id";
        $sql =  parent::getConn()->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0):
            $data = $sql->fetchAll();
        endif;
        return $data;
    }

    public function getUserToAuth(string $userMail, string $userPass){
        $sql = "SELECT * FROM " . self::entity ." WHERE userMail = :userMail AND userPassword = :userPass";
        $sql =  parent::getConn()->prepare($sql);
        $sql->bindValue(':userMail', $userMail);
        $sql->bindValue(':userPass', md5($userPass));
        $sql->execute();
        if($sql->rowCount() > 0):
            $rs = $sql->fetch();
            $_SESSION['fwsp'] = $rs['id']; 
            return true;
        else:
            return false;
        endif;
    }

    public function getUserToMail(string $userMail){
        $data = [];
        $sql = "SELECT * FROM " . self::entity ." WHERE userMail = :userMail";
        $sql =  parent::getConn()->prepare($sql);
        $sql->bindValue(':userMail', $userMail);
        $sql->execute();
        if($sql->rowCount() > 0):
            $data = $sql->fetchAll();
            return $data;
        endif;
    }

    public function userUpdateCode(array $data){
        $this->data = $data;
        $sql = "UPDATE " . self::entity . " SET userCode = :uc WHERE id = :id";
        $sql = parent::getConn()->prepare($sql);
        $sql->bindValue(':uc', $this->data['userCode']);
        $sql->bindValue(':id', $this->data['id']);
        $sql->execute();
        if($sql->rowCount() > 0):
            return true;
        else:
            return false;
        endif;
    }

    // $read = new Read;
    // $read->fullQuery("SELECT userId FROM user WHERE userMail = :u", "u={$mdecode}");
    public function getIdFromMail(string $userMail){
        $data = [];
        $sql = "SELECT id, userCode FROM " . self::entity ." WHERE userMail = :userMail";
        $sql =  parent::getConn()->prepare($sql);
        $sql->bindValue(':userMail', $userMail);
        $sql->execute();
        if($sql->rowCount() > 0):
            // foreach($sql->fetchAll() as $id):
            //     $data = $id['id'];
                $data = $sql->fetchAll();
            // endforeach;
            return $data;
        endif;
    }

    
    public function userUpdatePass(array $data){
        $this->data = $data;
        $sql = "UPDATE " . self::entity . " SET userPassword = :up, userCode = :userCode WHERE id = :id";
        $sql = parent::getConn()->prepare($sql);
        $sql->bindValue(':up', md5($this->data['userPassword']));
        $sql->bindValue(':userCode', $this->data['userCode']);
        $sql->bindValue(':id', $this->data['id']);
        if($sql->execute()):
            return true;
        else:
            return false;
        endif;
        
    }

    // VERIFICAR EMAIL DUPLICADO
    private function checkUser(string $userMail){
        $sql = "SELECT COUNT(*) AS u FROM " . self::entity ." WHERE userMail = :userMail";
        $sql =  parent::getConn()->prepare($sql);
        $sql->bindValue(':userMail', $userMail);
        $sql->execute();
        $rs = $sql->fetch();
        if($rs['u'] == 0):
            return 1;
        endif;
    }
    
}