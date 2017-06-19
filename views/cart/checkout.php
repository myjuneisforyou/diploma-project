<?php include (ROOT.'/views/layouts/header.php') ?>;
<script type="text/javascript">
    document.title = "iStore - Оформление покупки";
</script>
<div class="login-signup buy">
    <?php if($result):?>
    <p>Спасибо за заказ! Наш менеджер свяжется с вами в ближайшее время!</p>
    <?php else:?>
    <h1>Оформление заказа</h1>
    <p>Выбрано товаров: <span style="color: #16b716;"><?=$totalQuantity;?></span> на сумму: <span style="color: #16b716;"><?=$totalPrice;?><sup>грн</sup></span></p>
    <form action="#" method="post">
        <p>Имя и фамилия <span style="color: red;"><?=@$error_name?></span></p>
                <input type="text" name="name" placeholder="Имя и фамилия" value="<?php if(!User::isGuest()) echo $user["name"];?>"><br>
        <p>Номер телефона <span style="color: red;"><?=@$error_phone?></span></p>
                <input type="text" name="phone" placeholder="Номер" value="<?php if(!User::isGuest()) echo $user["phone"];?>"><br>
        <p>Электронная почта <span style="color: red;"><?=@$error_email?></span></p>
                <input type="email" name="email" placeholder="E-mail" value="<?php if(!User::isGuest()) echo $user["email"];?>"><br>
        <p>Город <span style="color: red;"><?=@$error_city?></span></p>
                <input type="text" name="city" placeholder="Город" value="<?php if(!User::isGuest()) echo $user["city"];?>"><br>
        <p>Отделение Новой Почты <span style="color: red;"><?=@$error_adress?></span></p>
                <input type="text" name="adress" placeholder="Адрес" value="<?php if(!User::isGuest()) echo $user["adress"];?>"><br>       
        <input type="submit" name="submit" value="Заказать" class="account-subm">
    </form>
    <?php endif;?>
</div>

</div>

<?php include (ROOT.'/views/layouts/footer.php'); ?>