<?php

    $cs = Yii::app()->clientScript;
    $cs->registerCssFile($this->getAssetsUrl().'/css/style.css?v=5');
    $cs->registerCssFile($this->getAssetsUrl().'/css/fancybox/jquery.fancybox.css');
    $cs->registerCssFile($this->getAssetsUrl().'/css/jquery.ui/overcast/jquery-ui-1.10.3.custom.min.css');
    $cs->registerCssFile($this->getAssetsUrl().'/css/normalize.min.css');
    $cs->registerCssFile($this->getAssetsUrl().'/css/main.css?v=5');
    
    $cs->registerCoreScript('jquery');
    $cs->registerCoreScript('jquery.ui');
    $cs->registerScriptFile($this->getAssetsUrl().'/js/owl.carousel.min.js', CClientScript::POS_END);
    $cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox.js', CClientScript::POS_END);
    //$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox-buttons.js', CClientScript::POS_END);
    //$cs->registerScriptFile('http://api-maps.yandex.ru/2.0.27/?load=package.standard&lang=ru-RU', CClientScript::POS_HEAD);
    
    $cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.timepicker.addon.js', CClientScript::POS_END);
    $cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.ui.timepicker.ru.js', CClientScript::POS_END);
    $cs->registerScriptFile($this->getAssetsUrl().'/js/vendor/modernizr-2.6.2.min.js', CClientScript::POS_END);
    
    $cs->registerScriptFile($this->getAssetsUrl().'/js/customslider.jquery.js', CClientScript::POS_END);
    $cs->registerScriptFile($this->getAssetsUrl().'/js/vendor/jssor.jquery.min.js', CClientScript::POS_END);
    $cs->registerScriptFile($this->getAssetsUrl().'/js/main.js?v=5', CClientScript::POS_END);
    
    $cs->registerScriptFile($this->getAssetsUrl().'/js/common.js?v=6', CClientScript::POS_END);
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if IE 10]>         <html class="no-js lt-ie11"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <!--[if lt IE 7]>
            <script src="http://phpbbex.com/oldies/oldies.js" charset="utf-8"></script>
        <![endif]-->
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
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="all_divs">
        <div class="header">
            <div class="fix-width">
                <div class="top">
                    <div class="inline-middle"><a class="logo" href="/"><img src="<? echo $this->getAssetsUrl();?>/img/logo.png" alt=""/></a><span>Жизнь в ритме спорта</span></div>
                    <div class="inline-middle marginLeftHeader"><span class="phone">8 3452 612-691<br><span class='headerAddress'>Широтная 189, к1</span></span></div>
                    <div class="inline-middle marginLeftHeader"><span class="phone">8 3452 585-881<br><span class='headerAddress'>Стартовая 1</span></span></div>

                    <div class="inline-middle marginLeftHeader"><span class="phone">8 3452 589-914<br><span class='headerAddress'>Заречный проезд 43</span></span></div>
                </div>
                <div class="bottom">
                    <nav class="menu">
                        <? $this->widget('zii.widgets.CMenu', array('items'=>$this->menu)); ?>
                    </nav>
                    <div class="shedule">
                        <span class="weekdays"><? echo Yii::app()->config->get('app.work_time_weekdays'); ?></span>
                        <span class="weekend"><? echo Yii::app()->config->get('app.work_time_weekend'); ?></span>
                    </div>
                </div>
                <div class="record">
                        <a class="fancybox.ajax run_fancy" href="/site/order" >Записаться<span></span></a>
                        <span class="discription">на бесплатный гостевой визит</span>
                    </div>
            </div>
        </div>

        <div class="content">
            <!-- Слайдер -->
            <?=$content?>
        </div>

        <div class="footer">
            <div class="fix-width">
                <div class="content">
                    
                    <? $this->widget('zii.widgets.CMenu', array('items'=>$this->menu, 'htmlOptions'=>array('class'=>'menu'))); ?>
                    <div class="order">
                        <table class='footerAddress'>
                            <tr>
                                <td><p class="address">Широтная 189, к1</p></td>
                                <td><p class="address">Стартовая 1</p></td>
                                <td><p class="address">Заречный проезд 43</p></td>
                            </tr>
                            <tr>
                                <td><p class="phone">8 3452 612-691</p></td>
                                <td><p class="phone">8 3452 585-881</p></td>
                                <td><p class="phone">8 3452 589-914</p></td>
                            </tr>
                        </table>
                        <a class="fancybox.ajax run_fancy" href="/site/order">Записаться</a>
                    </div>

                    <div class="master">
                        <a class="amobile" target="_blank" href="http://amobile-studio.ru">Сайт сделали в</a>
                        <p class="slogan">Жизнь<br>в ритме<br><strong>спорта</strong></p>
                    </div>
                </div>
                <div class="bottom">
                    <p class="socials">
                        <? if(Yii::app()->config->get('app.vk')){ ?>
                            <a class="vk" target="_blank" href="<? echo Yii::app()->config->get('app.vk'); ?>"></a>
                        <? } ?>
                        
                        <? if(Yii::app()->config->get('app.instagram')){ ?>
                            <a class="instagram" target="_blank" href="<? echo Yii::app()->config->get('app.instagram'); ?>"></a>
                        <? } ?>
                        
                        <? if(Yii::app()->config->get('app.fb')){ ?>
                            <a class="facebook" target="_blank" href="<? echo Yii::app()->config->get('app.fb'); ?>"></a>
                        <? } ?>
                        
                        <? if(Yii::app()->config->get('app.twitter')){ ?>
                            <a class="twitter" target="_blank" href="<? echo Yii::app()->config->get('app.twitter'); ?>"></a>
                        <? } ?>
                        
                        <? if(Yii::app()->config->get('app.skype')){ ?>
                            <a class="skype" target="_blank" href="<? echo Yii::app()->config->get('app.skype'); ?>"></a>
                        <? } ?>
                    </p>
                    <p class="powered">© <? echo Yii::app()->config->get('app.copyright'); ?></p>
                </div>
            </div>
        </div>

        
       

        </div>
        <div class="hiddenMap">
            <img src='/googleMap/map.png' alt='' />
            <p>Фитнес клуб Life Fit  -  8 (3452) 612-691  -  Широтная 189, к1</p>
            <img src='/googleMap/map2.png' alt='' />
            <p>Фитнес клуб Life Fit  -  8 (3452) 585-881  -  Стартовая 1</p>
        </div>
    </body>
    <!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter25576379 = new Ya.Metrika({id:25576379,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/25576379" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</html>
