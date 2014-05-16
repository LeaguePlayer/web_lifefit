<?php

	$cs = Yii::app()->clientScript;
	$cs->registerCssFile($this->getAssetsUrl().'/css/style.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/fancybox/jquery.fancybox.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/jquery.ui/overcast/jquery-ui-1.10.3.custom.min.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/normalize.min.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/main.css');
	
	$cs->registerCoreScript('jquery');
	$cs->registerCoreScript('jquery.ui');
	$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox.js', CClientScript::POS_END);
	//$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox-buttons.js', CClientScript::POS_END);
	//$cs->registerScriptFile('http://api-maps.yandex.ru/2.0.27/?load=package.standard&lang=ru-RU', CClientScript::POS_HEAD);
	
	$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.timepicker.addon.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.ui.timepicker.ru.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/vendor/modernizr-2.6.2.min.js', CClientScript::POS_END);
	
	$cs->registerScriptFile($this->getAssetsUrl().'/js/customslider.jquery.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/vendor/jssor.jquery.min.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/main.js', CClientScript::POS_END);
	
	$cs->registerScriptFile($this->getAssetsUrl().'/js/common.js', CClientScript::POS_END);
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Exo+2:400,700,300,600italic,300italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic' rel='stylesheet' type='text/css'>
      

       
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <header>
            <div class="fix-width">
                <div class="top">
                    <div class="inline-middle"><a class="logo" href="/"><img src="<? echo $this->getAssetsUrl();?>/img/logo.png" alt=""/></a><span>Жизнь в ритме спорта</span></div>
                    <div class="inline-middle"><span class="phone">8 4352 612-691</span></div>
                    <div class="inline-middle"><span class="address">Тюмень, Широтная, 189, к2</span></div>
                </div>
                <div class="bottom">
                    <nav class="menu">
                        <ul>
                            <li><a href="/news">Новости</a></li>
                            <li><a href="#">О нас</a></li>
                            <li><a href="#">Как начать</a></li>
                            <li><a href="#">Акции и статьи</a></li>
                            <li><a href="#">Расписание</a></li>
                            <li class="active"><a href="#">Партнеры</a></li>
                            <li><a href="#">Цены</a></li>
                            <li><a href="#">Контакты</a></li>
                        </ul>
                    </nav>
                    
                    <div class="shedule">
                        <span class="weekdays">8-23</span>
                        <span class="weekend">9-22</span>
                    </div>
                    <div class="record">
                        <a href="#" >Записаться<span></span></a>
                        <span class="discription">на бесплатный гостевой визит</span>
                    </div>
                </div>

            </div>
        </header>


        <div class="content">
            <!-- Слайдер -->
            <?=$content?>

        </div>




        <footer>
            <div class="fix-width">
                <div class="content">
                    <ul class="menu">
                        <li><a href="#">Новости</a></li>
                        <li><a href="#">Новости и акции</a></li>
                        <li><a href="#">О нас</a></li>
                        <li><a href="#">Партнеры</a></li>
                        <li><a href="#">Как начать</a></li>
                        <li><a href="#">Цены</a></li>
                        <li><a href="#">Расписание</a></li>
                        <li><a href="#">Контакты</a></li>
                    </ul>

                    <div class="order">
                        <p class="address">Тюмень, Широтная, 189, к2</p>
                        <p class="phone">8 (4352) 612-691</p>
                        <a href="#">Записаться</a>
                    </div>

                    <div class="master">
                        <a class="amobile" target="_blank" href="http://amobile-studio.ru">Сайт сделали в</a>
                        <p class="slogan">Жизнь<br>в ритме<br><strong>спорта</strong></p>
                    </div>
                </div>

                <div class="bottom">
                    <p class="socials">
                        <a class="vk" target="_blank" href="https://vk.com/lifefit72"></a>
                        <a class="instagram" target="_blank" href="https://vk.com/lifefit72"></a>
                        <a class="facebook" target="_blank" href="https://vk.com/lifefit72"></a>
                        <a class="twitter" target="_blank" href="https://vk.com/lifefit72"></a>
                        <a class="skype" target="_blank" href="https://vk.com/lifefit72"></a>
                    </p>
                    <p class="powered">© Фитнес-центр Lifefit 2014. Все права защищены</p>
                </div>
            </div>
        </footer>

        
       

        
    </body>
</html>
