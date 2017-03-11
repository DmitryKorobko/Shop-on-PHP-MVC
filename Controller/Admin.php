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
        $order = Model_Order::getAllOrders();
        if($this->isAdmin()) {
            $this->view->setParam('order', $order);
        }
        else {
            header('location: /');
        }
    }

    public function productsAction()
    {
        $product = Model_Product::getAllProducts();
        if($this->isAdmin()) {
            $this->view->setParam('product', $product);
        }
        else {
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
            $user = new Model_User;
            $user = $user->addingUser($params);
            header('location: /admin/users/');
            return $user;
        }
        else {
            header('location: /');
        }
    }

    public function editingUserPageAction()
    {
        if (!($this->isAdmin())) {
            header('location: /');
        }
    }

    public function editingUserAction()
    {
        if($this->isAdmin()) {
            $params = $_POST;
            $user = new Model_User;
            $user = $user->editingUser($params);
            header('location: /admin/users/');
            return $user;
        }
        else {
            header('location: /');
        }
    }

    public function deleteOrderAction()
    {
        if($this->isAdmin()) {
            $id = $this->args[0];
            $order = new Model_Order;
            $order->deleteOrder($id);

        }
        else {
            header('location: /');
        }
    }

    public function addingOrderPageAction()
    {
        if (!($this->isAdmin())) {
            header('location: /');
        }
    }

    public function addingOrderAction()
    {
        if($this->isAdmin()) {
            $params = $_POST;
            $order = new Model_Order;
            $order = $order->addingOrder($params);
            header('location: /admin/orders/');
            return $order;
        }
        else {
            header('location: /');
        }
    }

    public function editingOrderPageAction()
    {
        if (!($this->isAdmin())) {
            header('location: /');
        }
    }

    public function editingOrderAction()
    {
        if($this->isAdmin()) {
            $params = $_POST;
            $order = new Model_Order;
            $order = $order->editingOrder($params);
            header('location: /admin/orders/');
            return $order;
        }
        else {
            header('location: /');
        }
    }

    public function addingProductAction()
    {
        if($this->isAdmin()) {
            $params = $_POST;
            $product = new Model_Product;
            $product = $product->addingProduct($params);
            header('location: /admin/products/');
            return $product;
        }
        else {
            header('location: /');
        }
    }

    public function addingProductPageAction()
    {
        if (!($this->isAdmin())) {
            header('location: /');
        }
    }

    public function deleteProductAction()
    {
        if($this->isAdmin()) {
            $sku = $this->args[0];
            $product = new Model_Product;
            $product->deleteProduct($sku);
        }
        else {
            header('location: /');
        }
    }

    public function editingProductPageAction()
    {
        if (!($this->isAdmin())) {
            header('location: /');
        }
    }

    public function editingProductAction()
    {
        if($this->isAdmin()) {
            $params = $_POST;
            $product = new Model_Product;
            $product = $product->editingProduct($params);
            header('location: /admin/products/');
            return $product;
        }
        else {
            header('location: /');
        }
    }
}