<?php

	$cs = Yii::app()->clientScript;
	$cs->registerCssFile($this->getAssetsUrl().'/css/main.css');
	?>
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
			<form class="record-form">
				<input type="text" placeholder="Ваше имя">
				<input type="text" placeholder="Номер телефона">
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
					<a href="#">Тренажерный зал</a>
				</li>
				<li>
					<a href="#">мягкий фитнес</a>
				</li>
				<li>
					<a href="#">Сильный фитнес</a>
				</li>
				<li>
					<a href="#">йога</a>
				</li>
				<li>
					<a href="#">Танцевальные направления</a>
				</li>
				<li>
					<a href="#">бокс</a>

				</li>
				<li>
					<a href="#">trx</a>
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
				Фитнес-центр LifeFit <?=date('Y')?>
			</li>
			<li class="phone">
				8 4352 619 691
			</li>
			<li class="logo-amobile">
				сайт делали в <span class="logo-amobile"></span><br>
				<span class="justify">только лучшее идеи</span>
			</li>
		</ul>
	</div>
</div>