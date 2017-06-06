<!DOCTYPE html>
<html>
<head>
	<title>iStore</title>
	<meta charset="utf-8">
	<meta name="keywords" content="Магазин, телефон, гаджет, планшет, часы, iPhone, Watch, Mac, Macbook, iPad">
	<meta name="description" content="Интернет-магазин iStore по продаже гаджетов">
	<link rel="icon" href="../template/img/main/icon.png">
	<link rel="stylesheet" href="../template/css/style.css">
	<link rel="stylesheet" href="../template/css/sliderstyle.css">
        
<script src="../template/js/jquery-3.2.1.min.js"></script>
<script src="../template/js/jquery.cycle.all.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
	$("#slider").cycle({
            fx: 'scrollHorz',
            next: '#next',
            prev: '#prev',
            pause: 1
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/add/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>
</head>
<body>
<!--header-->
<div id="wrap">
<div id="header">
	<div id="feedback">
		<ul id="contacts_feedback">
			<li class="phone contact_icon_phone">+8-800-555-35-35</li>
			<li class="mail contact_icon_mail">support@istore.com</li>
		</ul>
		<ul id="contacts_social">
			<li class="fb social_icon" onclick="location.href='http://';"></li>
			<li class="google social_icon" onclick="location.href='http://';"></li>
			<li class="twi social_icon" onclick="location.href='http://';"></li>
			<li class="vk social_icon" onclick="location.href='http://';"></li>
		</ul>
	</div>
    <!-- wrong to wrap <li> inside <a> -->
	<div id="account">
		<a href="/"><img src="../template/img/main/logo.png" alt="logo" style="max-width:27%;max-height: 100%;"></a>
		<ul>  
                        <?php if(User::isGuest()):?>
			<a href="/user/login"><li class="enter account_icon">Вход</li></a>
                        <?php else: ?>
                        <a href="/user/logout"><li class="enter account_icon">Выход</li></a>
			<a href="/account"><li class="acc account_icon">Аккаунт</li></a>	
                        <?php endif; ?>
                        <a href="/cart"><li class="cart account_icon">Корзина (<span id="cart-count"><?=Cart::countItems();?></span>)</li></a>
		</ul>
	</div>
	<div id="menu">
		<ul>
			<li><a href="/">Главная </a></li>
			<li><a href="/about">О магазине</a></li>
			<li><a href="/feedback">Обратная связь</a></li>
			<li><a href="/deliver">Оплата и доставка</a></li>
		</ul>
	</div>
</div>

