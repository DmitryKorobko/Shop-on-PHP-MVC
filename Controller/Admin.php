<?php
class Controller_Admin extends System_Controller
{
    public function indexAction()
    {

    }
    public function usersAction()
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
    public function ordersAction()
    {

    }
    public function productsAction()
    {

    }
    public function deleteUserAction()
    {
        $user = Model_User::deleteUser();
    }

}