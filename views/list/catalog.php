<?php include (ROOT.'/views/layouts/header.php'); ?>
<script type="text/javascript">
    document.title = "iStore - Каталог товаров";
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
	<div id="latestbox">
		<h2 style="padding-bottom: 20px; color: #16b716">Каталог</h2>
		<div id="listbox">
                    <?php foreach($finalProducts as $product_id): ?>
			<div class="itembox">
				<a href="/product/<?php echo $product_id['id'];?>"><img src="../../template/img<?php echo $product_id['image'];?>" alt="item1" style="max-width: 100%;">
				<p><?php echo $product_id['name'];?></p></a>
				<h3 class="item-price"><?php echo $product_id['price'];?><sup> грн</sup></h3>
				<a class="add-to-cart" href="/cart/add/<?php echo $product_id['id'];?>" data-id="<?php echo $product_id['id'];?>"><button class="account_icon cartbutton">В корзину</button></a>
			</div>
                    <?php endforeach; ?>
		</div>
	</div>
</div>
</div>
<?php include (ROOT.'/views/layouts/footer.php'); ?>