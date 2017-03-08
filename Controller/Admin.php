<?php
class Controller_Admin extends System_Controller
{
    public function isAdmin()
    {
        $userRole = $this->_getSessParam('userRole');
        if($userRole == Model_User::ROLE_ADMIN) {
            return true;
        }
        else {
            return false;
        }
    }

    public function indexAction()
    {
        if (!($this->isAdmin())) {
            header('location: /');
        }
    }

    public function usersAction()
    {
        $user = Model_User::getAllUsers();
        if($this->isAdmin()) {
            $this->view->setParam('user', $user);
        }
        else {
            header('location: /');
        }
    }

    public function ordersAction()
    {
        if (!($this->isAdmin())) {
            header('location: /');
        }
    }

    public function productsAction()
    {
        if (!($this->isAdmin())) {
            header('location: /');
        }
    }

    public function deleteUserAction()
    {
        if($this->isAdmin()) {
            $id = $this->args[0];
            $adminId = $this->getUserId();
            if ($id != $adminId){
                $user = new Model_User;
                $user->deleteUser($id);
            }
        }
        else {
            header('location: /');
        }
    }

    public function addingUserPageAction()
    {
        if (!($this->isAdmin())) {
            header('location: /');
        }
    }

    public function addingUserAction()
    {
        if($this->isAdmin()) {
            $params = $_POST;
            $params['skills'] = implode(",", $_POST['skills']);
            $user = new Model_User;
            $user = $user->addingUser($params);
            header('location: /admin/users/');
            return $user;
        }
        else {
            header('location: /');
        }
    }
}