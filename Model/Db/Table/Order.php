<?php
class Model_Db_Table_Order extends System_Db_Table
{

    protected $_name = '`order`';

    /**
     *
     * @param int $id
     * @return array
     */
    public function getById($id)
    {
        $sql = 'select * from ' . $this->getName() . ' where id = ?';
        $sth = $this->getConnection()->prepare($sql);
        $sth->execute([$id]);
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getAllOrders()
    {
        $sql = 'select * from ' . $this->getName();
        $sth = $this->getConnection()->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function deleteOrder($id)
    {
        $sql = 'delete from ' . $this->getName() . ' where id = ?';
        $sth = $this->getConnection()->prepare($sql);
        $sth->execute([$id]);
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    /**
     * @param array $params
     * @return int
     */
    public function addingOrder($params)
    {
        $id      = trim($params['id']);
        $order_user_id   = trim($params['order_user_id']);
        $order_date = trim($params['order_date']);
        $order_sum  = trim($params['order_sum']);
        $sql = 'INSERT INTO ' . $this->getName() . ' (id,order_user_id,order_date,order_sum) VALUES(?,?,?,?)';
        $sth = $this->getConnection()->prepare($sql);
        $result = $sth->execute([$id,$order_user_id,$order_date,$order_sum]);
        if($result) {
            return $this->getConnection()->lastInsertId();
        }
    }

    /**
     * @param array $params
     * @return int
     */
    public function editingOrder($params)
    {
        $id      = trim($params['id']);
        $order_user_id   = trim($params['order_user_id']);
        $order_date = trim($params['order_date']);
        $order_sum  = trim($params['order_sum']);

        $sql = 'UPDATE ' . $this->getName() . ' SET 
                `order_id` =:id, 
                `order_user_id` =:order_user_id, 
                `order_date` =:order_date, 
                `order_sum` =:order_sum 
                 WHERE `id`=:order_id';
        $sth = $this->getConnection()->prepare($sql);
        $sth->bindValue(":id",$id);
        $sth->bindValue(":order_user_id",$order_user_id);
        $sth->bindValue(":order_date",$order_date);
        $sth->bindValue(":order_sum",$order_sum);
        $result = $sth->execute();
        if($result) {
            return $this->getConnection()->lastInsertId();
        }

    }
}