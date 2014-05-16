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
                            <li><a href="#">Новости</a></li>
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
            <div class="slider main-slider">
                <div class="fix-width viewport">
                    <div class="slider-width">
                        <div class="wrap">
                            <div class="slides">

                                <div class="slide">
                                    <img src="<? echo $this->getAssetsUrl();?>/img/slide.jpg" alt=""/>
                                    <div class="description">
                                        <p class="name">Тренажерный зал</p>
                                        <h2>Сила&объем</h2>
                                        <a class="red-button" href="#">Записаться <i class="arrow-down"></i></a>
                                    </div>
                                </div>

                                <div class="slide">
                                    <img src="<? echo $this->getAssetsUrl();?>/img/slide_r_e.jpg" alt=""/>
                                    <div class="description">
                                        <p class="name">Мягкий фитнес</p>
                                        <h2>Выносливость и скорость</h2>
                                        <a class="red-button" href="#">Записаться <i class="arrow-down"></i></a>
                                    </div>
                                </div>

                                <div class="slide">
                                    <img src="<? echo $this->getAssetsUrl();?>/img/slide.jpg" alt=""/>
                                    <div class="description">
                                        <p class="name">Сильный фитнес</p>
                                        <h2>Сила&объем</h2>
                                        <a class="red-button" href="#">Записаться <i class="arrow-down"></i></a>
                                    </div>
                                </div>

                                <div class="slide">
                                    <img src="<? echo $this->getAssetsUrl();?>/img/slide_r_d.jpg" alt=""/>
                                    <div class="description">
                                        <p class="name">Йога</p>
                                        <h2>Гармония&душа</h2>
                                        <a class="red-button" href="#">Записаться <i class="arrow-down"></i></a>
                                    </div>
                                </div>

                                <div class="slide">
                                    <img src="<? echo $this->getAssetsUrl();?>/img/slide.jpg" alt=""/>
                                    <div class="description">
                                        <p class="name">Танцевальные направления</p>
                                        <h2>Искусство в движении</h2>
                                        <a class="red-button" href="#">Записаться <i class="arrow-down"></i></a>
                                    </div>
                                </div>

                                <div class="slide">
                                    <img src="<? echo $this->getAssetsUrl();?>/img/slide_r_c.jpg" alt=""/>
                                    <div class="description">
                                        <p class="name">Бокс</p>
                                        <h2>Скорость&сила</h2>
                                        <a class="red-button" href="#">Записаться <i class="arrow-down"></i></a>
                                    </div>
                                </div>

                                <div class="slide">
                                    <img src="<? echo $this->getAssetsUrl();?>/img/slide.jpg" alt=""/>
                                    <div class="description">
                                        <p class="name">TRX</p>
                                        <h2>Гармония&сила</h2>
                                        <a class="red-button" href="#">Записаться <i class="arrow-down"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <ul class="slider-nav">
                        <li class="gym"><a href="#"><span>Тренажерный зал</span></a></li>
                        <li class="soft_fitness"><a href="#"><span>Мягкий фитнес</span></a></li>
                        <li class="strong_fitness"><a href="#"><span>Сильный фитнес</span></a></li>
                        <li class="yoga"><a href="#"><span>Йога</span></a></li>
                        <li class="dance"><a href="#"><span>Танцевальные направления</span></a></li>
                        <li class="boxing"><a href="#"><span>Бокс</span></a></li>
                        <li class="trx"><a href="#"><span>TRX</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- Конец слайдера -->

            <!-- Действия -->
            <div class="actions">
                <div class="fix-width">
                    <div class="block left guest_visit">
                        <p class="label">Записаться</p>
                        <p class="cursive">на бесплатный</p>
                        <p class="normal">гостевой визит</p>
                        <form action="/">
                            <input type="text" placeholder="Ваше имя" />
                            <input type="text" placeholder="Номер телефона" />
                            <button class="red-button">Записаться <i class="arrow-right"></i></button>
                        </form>
                    </div>

                    <div class="block right yoga">
                        <div class="content">
                            <p class="label">Йога</p><br>
                            <p class="desc">Сегодня вы можете успеть на увлекательные занятия по йоге.</p>
                            <a class="red-button" href="#">Посетить <i class="arrow-right"></i></a>
                            <p class="beginning">
                                <span class="text">Начало занятий</span>
                                <span class="timer">16</span><span class="timer">20</span>
                            </p>
                            <p class="address">
                                Ждем Вас по <a href="#">адресу</a> <span>Тюмень, Широтная, 66</span>
                            </p>
                        </div>
                    </div>

                    <div class="block right fitness">
                        <div class="content">
                            <p class="label">Месяц фитнеса за:</p>
                            <p class="price">2 200<span>руб</span></p>
                            <a class="black-button" href="#">Записаться <i class="arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Конец действия -->


            <!-- Промо -->
            <div class="promo">
                <div class="content fix-width">
                    <h2>Фитнес-центр ЛайфФит</h2>
                    <p>Отдeльно находящееся здание, охраняемый и удобный паркинг, тренажеры и оборудования ведущих фирм мира, квалифицированные тренера и радужный персонал. Комфортные  условия для занятий, гибкий график тренировок. Возможность добиться блестящих результатов и поставленных целей с инструктором и самостоятельно.</p>
                    <p>Отдeльно находящееся здание, охраняемый и удобный паркинг, тренажеры и оборудования ведущих фирм мира, квалифицированные тренера и радужный персонал. </p>
                </div>
            </div>
            <!-- Конец промо -->


            <!-- Слайдеры -->
            <div class="sliders-block">
                <div class="fix-width">
                    <ul class="switch_slider">
                        <li class="active"><a href="#">Тренажерный зал</a></li>
                        <li><a href="#">Боксерский ринг</a></li>
                        <li><a href="#">Зал для йоги</a></li>
                        <li><a href="#">Ресепшн</a></li>
                    </ul>
                </div>

                <div class="sliders">
                    <!-- Один слайдер -->
                    <div class="slider">
                        <div class="fix-width">
                            <div class="slider-width">
                                <div class="wrap">
                                    <div class="slider_container" style="position: relative; top: 0px; left: 0px; width: 1400px; height: 535px;">
                                        <!-- Slides Container -->
                                        <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 1400px; height: 535px;">
                                            <div><img u="image" src="<? echo $this->getAssetsUrl();?>/img/slide2.jpg" /></div>
                                            <div><img u="image" src="<? echo $this->getAssetsUrl();?>/img/slide3.jpg" /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Второй слайдер -->
                    <div class="slider">
                        <div class="fix-width">
                            <div class="slider-width">
                                <div class="wrap">
                                    <div class="slider_container" style="position: relative; top: 0px; left: 0px; width: 1400px; height: 535px;">
                                        <!-- Slides Container -->
                                        <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 1400px; height: 535px;">
                                            <div><img u="image" src="<? echo $this->getAssetsUrl();?>/img/slide3.jpg" /></div>
                                            <div><img u="image" src="<? echo $this->getAssetsUrl();?>/img/slide4.jpg" /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Третий слайдер -->
                    <div class="slider">
                        <div class="fix-width">
                            <div class="slider-width">
                                <div class="wrap">
                                    <div class="slider_container" style="position: relative; top: 0px; left: 0px; width: 1400px; height: 535px;">
                                        <!-- Slides Container -->
                                        <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 1400px; height: 535px;">
                                            <div><img u="image" src="<? echo $this->getAssetsUrl();?>/img/slide2.jpg" /></div>
                                            <div><img u="image" src="<? echo $this->getAssetsUrl();?>/img/slide4.jpg" /></div>
                                            <div><img u="image" src="<? echo $this->getAssetsUrl();?>/img/slide3.jpg" /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Четвертый слайдер -->
                    <div class="slider">
                        <div class="fix-width">
                            <div class="slider-width">
                                <div class="wrap">
                                    <div class="slider_container" style="position: relative; top: 0px; left: 0px; width: 1400px; height: 535px;">
                                        <!-- Slides Container -->
                                        <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 1400px; height: 535px;">
                                            <div><img u="image" src="<? echo $this->getAssetsUrl();?>/img/slide2.jpg" /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- Конец слайдеры -->

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
