<div class="backgroundPage" id="begin_content">
    <div class="fix-width">
        <div class="captionPage"><h1><? echo $node->name ?></h1><div class="breadcrumb"><?php $this->widget('zii.widgets.CBreadcrumbs', array(
        'separator'=>' → ',
        'links'=>$this->breadcrumbs,
    )); ?></div></div>
        
        <div class="typegraphy">
            
           <?php echo $page->wswg_body ?>
            
        </div>
        
        
        <? if ( count( $employesListNodes ) > 0 ) { ?>
        
            <? foreach($employesListNodes as $employesListNode) { ?>
            <? $employesList = $employesListNode->getComponent(); ?>
            <? $employes = $employesList->getEmployes(); ?>
            
            
            
                <? if ( count( $employesList ) > 0 ) { ?>
                    
                    <div class="block_employers">
                            <h3><? echo $employesList->name; ?></h3>
                            <div class="employers">
                    <? foreach($employes as $employer) { ?>
                        
                            
                            
                                <div class="employer">
                                    <a class="fancybox.ajax run_fancy" href="/site/about/personal/<? echo $employer->id; ?>">
                                        <? if($employer->img_photo) { ?>
                                            <? echo $employer->getImage('small'); ?>
                                        <? } else { ?>
                                            <? if($employer->gender==Employe::GENDER_WOOMAN) { ?>
                                                <img src="<? echo $this->getAssetsUrl();?>/img/nophoto_woman.jpg" />
                                            <? } else { ?>
                                                <img src="<? echo $this->getAssetsUrl();?>/img/nophoto_man.jpg" />
                                            <? } ?>
                                        <? } ?>
                                       
                                        
                                        <div class="information">
                                            <div class="categoryClass"><? echo $employer->billet ?></div>
                                            <div class="fio">
                                                <div class="employerName"><? echo $employer->name ?></div>
                                                <? if($employer->surname) { ?><div class="employerSurname"><? echo $employer->surname ?></div><? } ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                
                                
                                
                            
                            
                    <? } ?>
                    
                         </div>
                    </div>
                    
                <? } ?>
            
            <? } ?>
        
        <? } ?>
        
        
        
        
    </div>
</div>


    
        <? if(count($page->getGalleries())>0){ ?>
            
                <? foreach( $page->getGalleries() as $gallery ) { ?>
                
                <div class="slider_big">
                    <div class="to_right gal_arrow"></div>
                    <div class="to_left gal_arrow"></div>
                    <div class="title_slider">
                        <div class="fix-width"><? echo $gallery->gallery_name; ?></div>
                    </div>
                    <div class="big_photos">
                        
                
                    <? foreach( $gallery->galleryPhotos as $i => $photo ) { ?>
                
                        
                       <div class="block_with_img<? echo ($i==0) ? " active" : ""?>">
                         <img sizes="100vw, (min-width: 40em) 80vw" srcset="<? echo $photo->getUrl('big_800'); ?> 800w,<? echo $photo->getUrl('big_900'); ?> 900w,<? echo $photo->getUrl('big_1000'); ?> 1000w, <? echo $photo->getUrl('big_1100'); ?> 1100w, <? echo $photo->getUrl('big_1200'); ?> 1200w, <? echo $photo->getUrl('big_1300'); ?> 1300w, <? echo $photo->getUrl('big_1400'); ?> 1400w, <? echo $photo->getUrl('big_1500'); ?> 1500w, <? echo $photo->getUrl('big_1600'); ?> 1600w">
                       </div>
                    
                    <? } ?>
                   
                   </div>
               </div>
                
                <? } ?>
                
                <div class="backgroundPage">
                    <div class="fix-width medal">
                        <div id="medal"></div>
                    </div>
                </div>
            
            <? } ?>
        
    

<? if($page->map) { ?>

    <div class="container_with_map">
    <div class="mapHelper">
        
            <div class="rel">
                <div class="contacts">
                    <div class="captionMap">Мы <br />находимся:</div>
                    <span class='goToPoint' data-coordsX="57.09715477" data-coordsY="65.61989250">
                        <div class="street"><span>Широтная 189, к1</span> <br />Фитнес клуб "Life Fit"</div>
                        <div class="street">Телефон 8 3452 612-691</div>
                    </span>
                    <br>
                    <span class='goToPoint' data-coordsX="57.14653477" data-coordsY="65.65191750">
                        <div class="street"><span>Стартовая 1</span><br />Фитнес клуб "Life Fit"</div>
                        <div class="street">Телефон 8 3452 585-881</div>
                    </span>
                    <br>
                    <span class='goToPoint' data-coordsX="57.14653477" data-coordsY="65.65191750">
                        <div class="street"><span>Стартовая 1</span><br />Фитнес клуб "Life Fit"</div>
                        <div class="street">Телефон 8 3452 589-914 </div>
                    </span>
                    <span class='goToPoint' data-coordsX="57.14653477" data-coordsY="65.65191750">
                        <div class="street">пр. Заречный 43/4 <br />Фитнес клуб "Life Fit"</div>
                        <div class="street">Телефон 8 3452 589-914 </div>
                    </span>
                </div>
                <div class="angleMap"></div>
            </div>
        
    </div>
    <div id="map" data-assets='<?=$this->getAssetsUrl()?>'></div>
</div>

<? } ?>
 
<? if($page->vk_plugin) { ?>
 
<div class="backgroundPage">
      <div class="fix-width">
        <div>
            <div class="plugin_vk">
                <span>Наша <br />живая группа <br />Вконтакте</span>
                <div class="plugin">
                    <script type="text/javascript" src="//vk.com/js/api/openapi.js?112"></script>

                    <!-- VK Widget -->
                    <div id="vk_groups"></div>
                    <script type="text/javascript">
                    VK.Widgets.Group("vk_groups", {mode: 0, width: "622", height: "216", color1: 'e32727', color2: 'ffffff', color3: 'c71f1f'}, 27148277);
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<? } ?>



    
