<?php

class ProductCategory {
    const SHOW_BY_DEFAULT = 10;
    public static function getProductCategory(){
        
         $db = Db::getConnection();
         
         $productCategory = array();
         
         $result = $db->query('SELECT id, name, category_id, image FROM product_category');
         
         $i = 0;
         while($row = $result->fetch()){
            $productCategory[$i]['id'] = $row['id'];
            $productCategory[$i]['name'] = $row['name'];
            $productCategory[$i]['category_id'] = $row['category_id'];
            $productCategory[$i]['image'] = $row['image'];
            $i++;
         }
         return $productCategory;
         
    }
            public static function getProductsListByCategory($categoryId = false)
    {
        if ($categoryId) {

            $db = Db::getConnection();            
            $finalProducts = array();
            $result = $db->query("SELECT id, name, category_name, image, product_id FROM product_category "
                    . "WHERE category_id = '$categoryId'"
                    . "ORDER BY id ASC ");

            $i = 0;
            while ($row = $result->fetch()) {
                $finalProducts[$i]['id'] = $row['id'];
                $finalProducts[$i]['name'] = $row['name'];
                $finalProducts[$i]['category_name'] = $row['category_name'];
                $finalProducts[$i]['image'] = $row['image'];
                $finalProducts[$i]['product_id'] = $row['product_id'];    
                $i++;
            }

            return $finalProducts;       
        }
    }
    
}
