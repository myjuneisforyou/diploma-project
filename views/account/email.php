<?php include (ROOT.'/views/layouts/header.php');?>
<script type="text/javascript">
    document.title = "iStore - Изменение пароля";
</script>
<div class="login-signup">
	<h1>Изменение почты</h1>
        <?php if($result):?>
        <h2 style="color: #16b716;">Email успешно изменён!</h2>
        <?php else:?>
	<form action="#" method="post">
            <p>Электронная почта<span style="color: red;"><?=@$error_email;?><?=@$error_email2;?></span></p>
                <input type="text" name="email" placeholder="Email"><br>
		<input type="submit" name="submit" value="Изменить" class="account-subm">
	</form>
        <?php endif;?>
</div>
</div>

<?php include (ROOT.'/views/layouts/footer.php'); ?>