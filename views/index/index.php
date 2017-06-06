<?php include (ROOT.'/views/layouts/header.php'); ?>
<!--slider-->
<div id="sliderwrap">
	<div id="next">&rang;</div>
	<div id="prev">&lang;</div>
	<div id="slider">
		<a href="category/2"><img src="../template/img/slider/img1.jpg"></a>
		<a href="product/25"><img src="../template/img/slider/img2.jpg"></a>
		<a href="list/10"><img src="../template/img/slider/img3.jpg"></a>
	</div>
</div>
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
	<div id="latestbox">
		<h2 style="padding-bottom: 20px; color: #16b716">Последние товары</h2>
		<div id="listbox">
                        <?php foreach($latestProducts as $product): ?>
			<div class="itembox">
				<a href="/product/<?php echo $product['id'];?>"><img src="../template/img<?php echo $product['image'];?>" alt="item1" style="max-width: 100%;">
				<p><?php echo $product['name'];?></p></a>
				<h3 class="item-price"><?php echo $product['price'];?><sup> грн</sup></h3>
                                <a class="add-to-cart" href="cart/add/<?php echo $product['id'];?>" data-id="<?php echo $product['id'];?>"><button class="account_icon cartbutton">В корзину</button></a>
			</div>
                        <?php endforeach; ?>
		</div>
	</div>
</div>
</div>

<?php include (ROOT.'/views/layouts/footer.php'); ?>