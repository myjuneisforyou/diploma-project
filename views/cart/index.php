<?php include (ROOT.'/views/layouts/header.php'); ?>
<script type="text/javascript">
    document.title = "iStore - Корзина";
</script>
<div id="content">
	<div id="catalog">
		<h2>Категория товаров</h2>
		<ul>
                        <?php foreach($categories as $categoryItem):?>
                         <li><a href="/category/<?php echo $categoryItem["id"]?>"><?php echo $categoryItem["name"]?></a></li>
                        <?php endforeach; ?>
		</ul>
	</div>
	<div id="cartbox">
                <h2>Корзина</h2>
                <?php if($productInCart): ?>
                <p>Вы выбрали следующие товары:</p>
                <table class="product-table">
                    <tr>
                        <th>Код товара</th>
                        <th>Название</th>
                        <th>Стоимость, грн</th>
                        <th>Количество, шт</th>
                        <th>Удалить</th>
                    </tr>
                    <?php foreach ($products as $product):?>
                    <tr>
                        <td><?php echo $product['code'];?></td>
                        <td><a href="/product/<?php echo $product['id'];?>"><?php echo $product['name'];?></a></td>
                        <td><?php echo $product['price'];?></td>
                        <td><?php echo $productInCart[$product['id']];?></td>
                        <td ><a class="delete-icon delete"href="/cart/delete/<?php echo $product['id'];?>"></a></td>
                    </tr>
                    <?php endforeach;?>
                </table>
                <table id="cartprice">
                    <tr>
                        <td>Стоимость заказа:</td>
                        <td style="color: #16b716; "><b><?php echo $totalPrice;?> грн</b></td>
                    </tr>
                </table>
                <a href="cart/checkout"><div class="checkout">Оформить заказ</div></a>
                <?php else:?>
                <p>Корзина пуста</p>
                <?php endif;?>      
	</div>
</div>
</div>

<?php include (ROOT.'/views/layouts/footer.php'); ?>