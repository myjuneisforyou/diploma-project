<?php


class Order {
    
    public static function save($name, $phone, $email, $city, $adress, $userId, $products)
    {
        $products = json_encode($products);

        $db = Db::getConnection();

        $sql = 'INSERT INTO product_order (name, phone, email, city, adress, user_id, products) '
                . 'VALUES (:name, :phone, :email, :city, :adress, :user_id, :products)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':city', $city, PDO::PARAM_STR);
        $result->bindParam(':adress', $adress, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }
}
