<?php include (ROOT.'/views/layouts/header.php');?>
<script type="text/javascript">
    document.title = "iStore - Редактирование данніх";
</script>
<div class="login-signup edit">
	<h1>Редактирование данных</h1>
        <?php if($result):?>
        <h2 style="color: #16b716; text-align: center;">Данные успешно отредактированы!</h2>
        <?php else:?>
	<form action="#" method="post"> 
            <p>Имя и фамилия <span style="color: red;"><?=@$error_name;?></span></p>
                <input type="text" name="name" placeholder="Имя и фамилия"><br>
            <p>Номер телефона</p>
                <input type="text" name="phone" placeholder="Номер"><br>  
            <p>Город <span style="color: red;"><?=@$error_city;?></span></p>
                <input type="text" name="city" placeholder="Город"><br>
            <p>Адрес доставки <span style="color: red;"><?=@$error_adress;?></span></p>
                <input type="text" name="adress" placeholder="Номер отделения/склада НП"><br>     

		<input type="submit" name="submit" value="Редактировать" class="account-subm">
	</form>
        <?php endif;?>
</div>
</div>
<?php include (ROOT.'/views/layouts/footer.php'); ?>