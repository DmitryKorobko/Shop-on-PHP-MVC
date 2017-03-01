<?php
class Controller_Admin extends System_Controller
{
    public function indexAction()
    {
        $user = Model_User::getAllUsers();

        $userRole = $this->_getSessParam('userRole');
        if($userRole == Model_User::ROLE_ADMIN) {
            $this->view->setParam('user', $user);
        }
        else {
            header('location: /');
        }
    }

}