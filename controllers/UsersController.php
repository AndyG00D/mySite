<?php

include_once ROOT. '/models/Users.php';

class UsersController {

	public function actionUsers_list()
	{

        $userModel = new UsersModel();
        $users = $userModel->getUserList($userModel->filter);

		require_once(ROOT . '/views/users/users_list.php');

		return true;
	}

	public function actionUser($id)
	{

		if ($id) {

            $userModel = new UsersModel();
            $age = $userModel->getUserAge(intval($id));


            require_once(ROOT . '/views/users/user.php');

		}

		return true;

	}

}

