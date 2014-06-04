
            <!-- Конец слайдера -->
<div class="slider-fix">

    <div class="slide-wrap">
        <div class="slide-prev"></div>
        <div class="slide-next"></div>
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
                    
                    <? if($next_training) { ?>
                        <div class="block right yoga" style="background-image: url(<? echo $next_training['model']->sport->imgBehaviorPreview_coming_soon->getImageUrl('small'); ?>);">
                            
                            <div class="content">
                                <p class="label"><? echo $next_training['model']->sport->title;?></p><br>
                                <p class="desc"><? echo $next_training['string'];?></p>
                                <a class="red-button fancybox.ajax run_fancy" href="/site/goto/sport/<? echo $next_training['model']->sport->id;?>">Посетить <i class="arrow-right"></i></a>
                                <p class="beginning">
                                    <span class="text">Начало занятий</span>
                                    <span class="timer"><? echo date('H',strtotime($next_training['model']->time_of));?></span><span class="timer"><? echo date('i',strtotime($next_training['model']->time_of));?></span>
                                </p>
                                <p class="address">
                                    Ждем Вас по <a href="/page/kontakty#begin_content">адресу</a> <span>Тюмень, Широтная, 66</span>
                                </p>
                            </div>
                        </div>
                    <? } ?>

                    <? if($card_on_main) { ?>
                        <div class="block right fitness">
                            <div class="content">
                                <p class="label">Месяц фитнеса за:</p>
                                <p class="price"><? echo number_format($card_on_main->price->price, 0, ',', ' '); ?><span>руб</span></p>
                                <a class="black-button fancybox.ajax run_fancy" href="/site/buycard/id_card/<? echo $card_on_main->id ?>/slot/<? echo $card_on_main->price->id ?>">Получить <i class="arrow-right"></i></a>
                            </div>
                        </div>
                    <? } ?>
                    
                    
                </div>
            </div>

            <!-- Конец действия -->


            <!-- Промо -->
            <div class="promo">
                <div class="content fix-width">
                    <h2><? echo $data['node']->name; ?></h2>
                    <div>
                        <? echo $data['page']->wswg_body; ?>
                    </div>
                </div>
            </div>
            <!-- Конец промо -->


            <!-- Слайдеры -->
            <div class="sliders-block">
                <div class="fix-width">
                    <ul class="switch_slider">
                        <? foreach ( $data['page']->getGalleries() as $id=>$gal ) { ?>
                            
                            <li<? echo ($id==0) ? " class='active'" : "";?> ><a href="#"><? echo $gal->gallery_name; ?></a></li>
                        <? } ?>
                        
                       
                    </ul>
                </div>

                <div class="sliders">
                
                    <? foreach ( $data['page']->getGalleries() as $id=>$gal ) { ?>
                        <div class="slider">
                            <div class="fix-width">
                                <div class="slider-width">
                                    <div class="wrap">
                                        <div class="slider_container" style="position: relative; top: 0px; left: 0px; width: 1400px; height: 535px;">
                                            <!-- Slides Container -->
                                            <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 1400px; height: 535px;">
                                                 <? foreach( $gal->galleryPhotos as $i => $photo ) { ?>
                                                    <div><img u="image" src="<? echo $photo->getUrl('big'); ?>" /></div>
                                                 <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? } ?>
                   
                    
                    
                  </div>

                </div>

            
            <!-- Конец слайдеры -->