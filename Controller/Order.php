<?php
class Controller_Order extends System_Controller
{
    public function profileAction()
    {
        $orderId = $this->getArgs()['id'];

        try {
            $modelOrder = Model_Order :: getById($orderId);
            $this->view->setParam('order', $modelOrder);
        }
        catch(Exception $e) {
            $this->view->setParam('error', $e->getMessage());
        }
    }
}