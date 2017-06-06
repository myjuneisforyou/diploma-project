<?php include (ROOT.'/views/layouts/header.php'); ?>
<script type="text/javascript">
    document.title = "iStore - Модели товаров";
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
                        <?php foreach($categoryProduct as $product):?>
			<div class="itembox">
				<a href="/list/<?php echo $product["product_id"]?>"><img src="../template/img<?php echo $product['image'];?>" alt="item1" style="max-width: 100%;">
				<p><?php echo $product['name'];?></p></a>
			</div>
                        <?php endforeach; ?>
		</div>
	</div>
</div>
</div>
<?php include (ROOT.'/views/layouts/footer.php'); ?>