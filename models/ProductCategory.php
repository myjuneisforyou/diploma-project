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

            $result = $db->query("SELECT id, name, category_name, image, product_id FROM product_category "
                    . "WHERE category_id = '$categoryId'"
                    . "ORDER BY id ASC ");

            return $result->fetchAll();       
        }
    }
    
}
