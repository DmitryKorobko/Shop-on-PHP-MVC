<?php
class Controller_Product extends System_Controller
{
    public function profileAction()
    {
        $productSku = $this->getArgs()['sku'];

        try {
            $modelProduct = Model_Product :: getById($productSku);
            $this->view->setParam('product', $modelProduct);
        }
        catch(Exception $e) {
            $this->view->setParam('error', $e->getMessage());
        }
    }
}