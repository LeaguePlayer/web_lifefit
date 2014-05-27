
            <!-- Конец слайдера -->
<div class="slider-fix">

    <div class="slide-wrap">
        <div class="left_gradient gradient"></div>
        <div class="right_gradient gradient"></div>
        <div class="slider-list">
        <ul>
            
            
            <?  foreach( $gallery as $id=>$gal) { ?>
                 <li >
                    <a<? echo ($id == 1) ? ' class="active"' : ''; ?> href="#" data-jump="<? echo $id; ?>"><? echo $gal['name']; ?></a>
                </li>
            <? } ?>            
        </ul>
    </div>
        <div class="slide" id="slide-top">
            <div class="slide-item">
                <img src="/media/images/slider/main.png">
                
            </div>
                <? foreach( $gallery as $id=>$gal) { ?>
                 <div class="slide-item">
                        <img src="<? echo $this->getAssetsUrl() ?>/img/slider/<? echo $id ?>.jpg" />
                    
                    <div class="info">
                        <div class="caption">
                            <? echo $gal['name']; ?>
                        </div>
                        <div class="title">
                           <? echo $gal['slogan']; ?>
                        </div>
                        <div class="record">
                            <a href="<? echo $gal['link']; ?>" class="red-button">Узнать</a>
                        </div>
                    </div>                    
                </div>
            <? } ?>
                
            
             
        </div>
    </div>
    
</div>
            <!-- Действия -->
            <div class="actions">
                <div class="fix-width">
                    <div class="block left guest_visit">
                        <p class="label">Записаться</p>
                        <p class="cursive">на бесплатный</p>
                        <p class="normal">гостевой визит</p>
                        <form class="ajaxForm" action="/site/order">
                            <div class="row">
                                <input type="text" data-field="name" name="Order[name]" placeholder="Ваше имя" />
                            </div>
                            <div class="row">
                                <input type="text" data-field="phone" name="Order[phone]" placeholder="Номер телефона" />
                            </div>
                            <button class="red-button">Записаться <i class="arrow-right"></i></button>
                        </form>
                    </div>

                    <div class="block right yoga">
                        <div class="content">
                            <p class="label">Йога</p><br>
                            <p class="desc">Сегодня вы можете успеть на увлекательные занятия по йоге.</p>
                            <a class="red-button fancybox.ajax run_fancy" href="/site/goto/sport/1">Посетить <i class="arrow-right"></i></a>
                            <p class="beginning">
                                <span class="text">Начало занятий</span>
                                <span class="timer">16</span><span class="timer">20</span>
                            </p>
                            <p class="address">
                                Ждем Вас по <a href="/page/kontakty#begin_content">адресу</a> <span>Тюмень, Широтная, 66</span>
                            </p>
                        </div>
                    </div>

                    <div class="block right fitness">
                        <div class="content">
                            <p class="label">Месяц фитнеса за:</p>
                            <p class="price">2 500<span>руб</span></p>
                            <a class="black-button fancybox.ajax run_fancy" href="/site/buycard/id_card/1/slot/1">Получить <i class="arrow-right"></i></a>
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
                        <li><a href="#">Малый зал</a></li>
                        <li><a href="#">Большой зал</a></li>
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