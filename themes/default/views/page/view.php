

<div class="backgroundPage">
    <div class="fix-width">
        <div class="captionPage"><h1><? echo $node->name ?></h1><div class="breadcrumb"><?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'separator'=>' → ',
		'links'=>$this->breadcrumbs,
	)); ?></div></div>
        
        <div class="typegraphy">
            
           <?php echo $page->wswg_body ?>
            
        </div>
        
        
        
        <div class="block_employers">
            <h3>Тренеры в лицах</h3>
            
            <div class="employers">
                <div class="employer">
                    <a href="javascript:void(0);">
                        <img src="<? echo $this->getAssetsUrl();?>/img/nophoto_man.jpg" />
                        <div class="information">
                            <div class="categoryClass">Мастер спорта</div>
                            <div class="fio">
                                <div class="employerName">Алексей</div>
                                <div class="employerSurname">Хорошев</div>
                            </div>
                        </div>
                    </a>
                </div>
                
                
                <div class="employer">
                    <a href="javascript:void(0);">
                        <img src="<? echo $this->getAssetsUrl();?>/img/nophoto_woman.jpg" />
                        <div class="information">
                            <div class="categoryClass">Мастер спорта</div>
                            <div class="fio">
                                <div class="employerName">Алексей</div>
                                <div class="employerSurname">Хорошев</div>
                            </div>
                        </div>
                    </a>
                </div>
                
                
                <div class="employer">
                    <a href="javascript:void(0);">
                        <img src="<? echo $this->getAssetsUrl();?>/img/nophoto_man.jpg" />
                        <div class="information">
                            <div class="categoryClass">Мастер спорта</div>
                            <div class="fio">
                                <div class="employerName">Алексей</div>
                                <div class="employerSurname">Хорошев</div>
                            </div>
                        </div>
                    </a>
                </div>
            
            </div>
        </div>
        
    </div>
</div>

<? if($page->map) { ?>

    <div class="container_with_map">
    <div class="mapHelper">
        
            <div class="rel">
                <div class="contacts">
                    <div class="captionMap">Мы <br />находимся:</div>
                    <div class="street">Тюмень, Широтная,  д 189, <br />Фитнес клуб "Life Fit"</div>
                </div>
                <div class="angleMap"></div>
            </div>
        
    </div>
    <div id="map"></div>
</div>

<? } ?>
 
<? if($page->vk_plugin) { ?>
 
<div class="backgroundPage">
      <div class="fix-width">
        <div>
            <div class="plugin_vk">
                <span>Наша <br />живая группа <br />Вконтакте</span>
                <div class="plugin"><img src="<? echo $this->getAssetsUrl();?>/img/vk.jpg" /></div>
            </div>
        </div>
    </div>
</div>

<? } ?>



    
