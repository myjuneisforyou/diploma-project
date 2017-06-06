<?php

class Product
{

    const SHOW_BY_DEFAULT = 10;

    /**
     * Returns an array of products
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        $db = Db::getConnection();
        $productsList = array();

        $result = $db->query('SELECT id, name, price, image FROM product '
                . 'WHERE status = "1"'
                . 'ORDER BY id DESC '                
                . 'LIMIT ' . $count);

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }

        return $productsList;
    }
    
       public static function getProductById($id)
    {
        $id = intval($id);

        if ($id) {                        
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM product WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            return $result->fetch();
        }
    }
           public static function getFinalProductList($finaList = false)
    {
        if ($finaList) {

            $db = Db::getConnection();            
            $products = array();
            $result = $db->query("SELECT  id, name, price, image FROM product "
                    . "WHERE product_category_id = '$finaList'"
                    . "ORDER BY id ASC ");

            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['image'] = $row['image'];
                $i++;
            }

            return $products;       
        }
    }
    
    public static function getProductByIds($idsArray){
         
        $products = [];
        
        $db = Db::getConnection();
        
        $idsString = implode(',', $idsArray);
        
        $sql = "SELECT * FROM product WHERE status = '1' AND id IN ($idsString)";
        
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['code'] = $row['code'];
                $products[$i]['price'] = $row['price'];       
                $i++;
            }
        return $products;
    }
    
}