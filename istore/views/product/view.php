<?php include (ROOT.'/views/layouts/header.php'); ?>
<!--content-->
<div id="content">
	<div id="catalog">
		<h2>Категория товаров</h2>
		<ul>
			<?php foreach($categories as $categoryItem):?>
                         <li><a href="/category/<?php echo $categoryItem["id"]?>"><?php echo $categoryItem["name"]?></a></li>
                        <?php endforeach; ?>
		</ul>
	</div>
	<div class="item-content">
		<div class="main-content">
                    <div class="img-wrap"><img src="../template/img<?php echo $product['image2'];?>" alt="item" align="left" style="max-width: 100%;"></div>
			<h2><?php echo $product['name'];?></h2>
			<span>Код товара:<?php echo $product['code'];?></span>
			<h3 class="item-price" style="font-size: 25px; margin: 20px 0 10px 0;"><?php echo $product['price'];?><sup> грн</sup></h3>
<a class="add-to-cart" href="/cart/add/<?php echo $product['id'];?>" data-id="<?php echo $product['id'];?>"><button class="account_icon cartbutton">В корзину</button></a><p class="small-description"><?php echo $product['description'];?></p>
		</div>
		<div class="full-description">
                    <h2 style="margin-bottom: 15px;">Технические характеристики</h2>
                        <p><?php echo $product['description2'];?></p>
		</div>
	</div>
</div>
</div>
<?php include (ROOT.'/views/layouts/footer.php'); ?>
