<?php

class Model_Db_Table_Product extends System_Db_Table
{
    protected $_name = 'product';

    /**
     *
     * @param int $sku
     * @return array
     */
    public function getBySku($sku)
    {
        $sql = 'select * from ' . $this->getName() . ' where sku = ?';
        $sth = $this->getConnection()->prepare($sql);
        $sth->execute([$sku]);
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getAllProducts()
    {
        $sql = 'select * from ' . $this->getName();
        $sth = $this->getConnection()->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function deleteProduct($sku)
    {
        $sql = 'delete from ' . $this->getName() . ' where sku = ?';
        $sth = $this->getConnection()->prepare($sql);
        $sth->execute([$sku]);
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function addingProduct($params){
        $sku        = trim($params['sku']);
        $name       =trim($params['product_name']);
        $description =trim($params['description']);
        $img        = trim($params['img']);
        $price      =trim($params['price']);
        $total      =trim($params['total']);

        $sql ='INSERT INTO '. $this->getName() .'(sku,product_name,description,img,price,total) VALUES(?,?,?,?,?,?)';
        $sth =$this->getConnection()->prepare($sql);

        $result = $sth->execute([$sku,$name,$description,$img,$price,$total]);
        if($result){
            return $this->getConnection()->lastInsertId();
        }

    }

    public function editingProduct($params)
    {
        $sku        = trim($params['sku']);
        $product_name       = trim($params['product_name']);
        $description = trim($params['description']);
        $img        = trim($params['img']);
        $price      = trim($params['price']);
        $total      = trim($params['total']);

        $sql = 'UPDATE ' . $this->getName() . ' SET                 
                `product_name` =:product_name, 
                `description` =:description, 
                `img` =:img, 
                `price` =:price, 
                `total` =:total                 
                    WHERE `sku`=:sku';
        $sth = $this->getConnection()->prepare($sql);
        $sth->bindValue(":sku",$sku);
        $sth->bindValue(":product_name",$product_name);
        $sth->bindValue(":description",$description);
        $sth->bindValue(":img",$img);
        $sth->bindValue(":price",$price);
        $sth->bindValue(":total",$total);
        $result = $sth->execute();
        if($result) {
            return $this->getConnection()->lastInsertId();
        }
    }

}