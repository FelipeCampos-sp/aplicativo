<?php
class HomeController extends Controller {
	public function index() {
		$data = array();
		$user = new User;
		if(!empty($_SESSION['fwsp'])):
			$id =  $_SESSION['fwsp'];
			$u = $user->getUserFromId($id);
			foreach($u as $us):
				$data['id'] = $us['id'];
				$data['userImage'] = $us['userImage'];
				$data['userName'] = $us['userName'];
				$data['userMail'] = $us['userMail'];
				$data['userPhone'] = $us['userPhone'];
				$data['userPassword'] = $us['userPassword'];
			endforeach;
			$POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			
			if(isset($POST['btn-upuser'])):
				$oldUserPassword = $POST['oldUserPassword'];
				$passwordCompare = $POST['passwordCompare'];
				
				unset($POST['oldUserPassword'], $POST['passwordCompare'], $POST['btn-upuser']);
				if(!empty($_FILES['userImage']['name'])):
					$POST['userImage'] = $_FILES['userImage'];
					
					$saveToDB = [ 
						'id' => strip_tags(trim($POST['id'])), 
						'userPassword' => strip_tags(trim($POST['userPassword'])), 
						'userCode' => '', 
						'userImage' =>   $POST['userImage'], 
						'userPhone' => strip_tags(trim($POST['userPhone']))
						];
						if($oldUserPassword != $data['userPassword']):
							$data['error'] = "<div class=\"warning\">Sua senha atual está incorreta, verifique!</div>";
						else:
							if($user->userUpdateWithImage($saveToDB)):
								$data['error'] = "<div class=\"accept\">Dados alterados com sucesso !</div>"; 
								header('Location: ' . HOME . '/home');
							else:
								$data['error'] = "<div class=\"warning\">Não foi possível atualizar!</div>";
							endif;
						endif;
				else:
					unset($POST['userImage'], $_FILES['userImage']);
					$saveToDB = [ 
						'id' => strip_tags(trim($POST['id'])), 
						'userPassword' => strip_tags(trim($POST['userPassword'])), 
						'userCode' => '', 
						'userPhone' => strip_tags(trim($POST['userPhone']))
						];
						if($oldUserPassword != $data['userPassword']):
							$data['error'] = "<div class=\"warning\">Sua senha atual está incorreta, verifique!</div>";
						else:
							if($user->userUpdate($saveToDB)):
								$data['error'] = "<div class=\"accept\">Dados alterados com sucesso !</div>"; 
							else:
								$data['error'] = "<div class=\"warning\">Não foi possível atualizar!</div>";
							endif;
						endif;
				endif;
			
			endif;
		else:
			header('Location: ' . HOME);
		endif;
		$this->renderTemplate('home', $data);

	}

}