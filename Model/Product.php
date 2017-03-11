<?php
class Model_Product
{
    /**
     * @var string
     */
    public $sku;

    /**
     * @var string
     */
    public $product_name;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $img;

    /**
     * @var float
     */
    public $price;

    /**
     * @var int
     */
    public $total;

    /**
     *
     * @param int $productSku
     * @return Model_Product
     * @throws Exception
     */
    public static function getBySku($productSku){

        $dbProduct = new Model_Db_Table_Product();
        $productData   =  !empty($dbProduct->getBySku($productSku)[0]) ? $dbProduct->getBySku($productSku)[0] : '';

        if(!empty($productData)) {
            $modelProduct  = new self();
            $modelProduct->sku          = $productData->sku;
            $modelProduct->product_name        = $productData->product_name;
            $modelProduct->description = $productData->description;
            $modelProduct->img         = $productData->img;
            $modelProduct->price   = $productData->price;
            $modelProduct->total       = $productData->total;
            return $modelProduct;
        }
        else {
            throw new Exception('Product not found', /*System_Exception::NOT_FOUND*/23);
        }
    }

    public static function getAllProducts(){
        $dbProducts= new Model_Db_Table_Product();
        $dbProducts=$dbProducts->getAllProducts();
        return $dbProducts;
    }

    public function deleteProduct($sku){
        $dbProducts= new Model_Db_Table_Product();
        $dbProducts->deleteProduct($sku);
        return $dbProducts;
    }

    public function addingProduct($params){
        $dbProducts= new Model_Db_Table_Product();
        $dbProducts->addingProduct($params);
        return $dbProducts;
    }

    public function editingProduct($params){
        $dbProducts= new Model_Db_Table_Product();
        $dbProducts->editingProduct($params);
        return $dbProducts;
    }

}