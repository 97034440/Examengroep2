<?php

namespace functions;

use \modules\RegisterModules;


class RegisterFunction {

	public function registerAction() {
		$add = RegisterModules::addUser();

		View::renderTemplate('Register/register.php', [
			"saveregister" => $add,
			$this->redirect('/register/'),
        	
        ]);
	}
}



?>
