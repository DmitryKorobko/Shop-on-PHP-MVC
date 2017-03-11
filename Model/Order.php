<?php
class Model_Order
{
   /**
     *
     * @var int
     */
    public  $id;

    /**
     * @var string
     */
    public $order_user_id;

    /**
     * @var string
     */
    public $order_date;

    /**
     * @var string
     */
    public $order_sum;

    /**
     *
     * @param int $orderId
     * @return Model_Order
     * @throws Exception
     */
    public static function getById($orderId)
    {
        $dbOrder     =  new Model_Db_Table_Order();
        $orderData   =  !empty($dbOrder->getById($orderId)[0]) ? $dbOrder->getById($orderId)[0] : '';

        if(!empty($orderData)) {
            $modelOrder  = new self();
            $modelOrder->id          = $orderData->id;
            $modelOrder->order_user_id        = $orderData->order_user_id;
            $modelOrder->order_date  = $orderData->order_date;
            $modelOrder->order_sum   = $orderData->order_sum;

            return $modelOrder;
        }
        else {
            throw new Exception('Order not found', /*System_Exception::NOT_FOUND*/23);
        }
    }

    public static function getAllOrders()
    {
        $dbOrders = new Model_Db_Table_Order();
        $dbOrders = $dbOrders->getAllOrders();
        return $dbOrders;

    }

    public function deleteOrder($id)
    {
        $dbOrders = new Model_Db_Table_Order();
        $dbOrders = $dbOrders->deleteOrder($id);
        return $dbOrders;
    }

    public function addingOrder($params)
    {
        $dbOrders = new Model_Db_Table_Order();
        $dbOrders = $dbOrders->addingOrder($params);
        return $dbOrders;
    }

    public function editingOrder($params)
    {
        $dbOrders = new Model_Db_Table_Order();
        $dbOrders = $dbOrders->editingOrder($params);
        return $dbOrders;
    }
}