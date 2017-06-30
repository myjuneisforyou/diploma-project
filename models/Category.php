<?php

class Category
{
    public static function getCategoryList()
    {

        $db = Db::getConnection();

        $result = $db->query('SELECT id, name FROM category '
                . 'ORDER BY sort_order ASC');

        return $result->fetchAll();
        
    }
}