<?php

	$cs = Yii::app()->clientScript;
	$cs->registerCssFile($this->getAssetsUrl().'/css/style.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/main.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/fancybox/jquery.fancybox.css');
	$cs->registerCoreScript('jquery');
	$cs->registerCoreScript('jquery.ui');
    
	$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox.js', CClientScript::POS_END);
	
	
	$cs->registerScriptFile($this->getAssetsUrl().'/js/common.js', CClientScript::POS_END);
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><? echo $this->title; ?></title>
        <meta name="description" content="">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

        <link href='http://fonts.googleapis.com/css?family=Exo+2:400,700,300,600italic,300italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic' rel='stylesheet' type='text/css'>
        
        <link id="favicon" type="image/x-icon" rel="shortcut icon" href="/favicon.ico" />
        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
      
    
       
    </head>
    <body>

<div class="bg_404">
	<div class="fix-width">
		<div class="logo">
		</div>
		<div class="caption">
			<div class="title">
				ничего не найдено
			</div>
			<div class="desc">
				<p>Вы попали на легендарную 404-ю страницу!<br>
В честь этого мы дарим Вам один бесплатный гостевой визит.</p>
			</div>
		</div>
		<div class="info">
			<div class="record">
				<div class="caption">
					<span class="first">Записаться<br></span> <span class="free">на бесплатный<br></span> гостевой визит
				</div>
			</div>
			<form class="record-form ajaxForm"  action="/site/order">
                <input type="hidden" name="Order[post_type]" value="guest" />
				<div class="row">
                    <input type="text" data-field="name" name="Order[name]" placeholder="Ваше имя">
                </div>
                <div class="row">
				    <input type="text" data-field="phone" name="Order[phone]" placeholder="Номер телефона">
                </div>
				<div class="send">
					<input type="submit" placeholder="Записаться" value="Записаться">
				</div>
			</form>
		</div>
		<div class="info-right">
			<div class="caption">
				<span class="first">Или выберите направления</span>
			</div>
			<ul>
				<li>
					<a href="/page/trenazhernyj-zal">Тренажерный зал</a>
				</li>
				<li>
					<a href="/page/myagkij-fitnes">Мягкий фитнес</a>
				</li>
				<li>
					<a href="/page/silovoj-fitnes">Силовой фитнес</a>
				</li>
				<li>
					<a href="/page/joga">Йога</a>
				</li>
				<li>
					<a href="/page/tanceval-nye-napravlenie">Танцевальные направления</a>
				</li>
				<li>
					<a href="/page/boks">Бокс</a>

				</li>
				<li>
					<a href="/page/trx">TRX</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="bot">
		<ul>
			<li class="toMain">
				На главную
			</li>
			<li class="fitnes">
				Фитнес-центр LifeFit 2014
			</li>
			<li class="phone">
				8 <? echo Yii::app()->config->get('app.code_city'); ?> <? echo Yii::app()->config->get('app.phone'); ?>
			</li>
			<li class="logo-amobile">
				сайт делали в <span class="logo-amobile"></span><br>
				<span class="justify">только лучшее идеи</span>
			</li>
		</ul>
	</div>
</div>
  </body>
    
</html>
