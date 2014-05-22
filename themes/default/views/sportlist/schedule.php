<div class="backgroundPage" style="padding-bottom: 0px;">
    <div class="fix-width">
    
            <div class="captionPage"><h1><? echo $node->name ?></h1><div class="breadcrumb"><?php $this->widget('zii.widgets.CBreadcrumbs', array(
        		'separator'=>' → ',
        		'links'=>$this->breadcrumbs,
        	)); ?></div></div>
            
            
            <? if ( $node->getComponent()->wswg_content ) { ?>
                <div class="typegraphy">
                    <? echo $node->getComponent()->wswg_content; ?>
                </div>
            <? } ?>
            
    </div>
    
    <div style="height:60px;" class="place_for_menu">
        <div class="redline fly">
            <div class="compromiss_width">
                <div class="week_of_day">
                    День недели
                </div>
                <? foreach ($data['days'] as $id_day => $day) { ?>
                    <div class="week_of_day" data-day="<? echo $id_day; ?>">
                        <? echo $day; ?>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
        

        <div style="background:#eceef1 ;">
            <div id="schedule_table" class="compromiss_width">
            
                <div class="time_cell">
                    <? foreach ($data['time'] as $time) { ?>
                        <div class="time" data-time="<? echo $time; ?>"><? echo $time; ?></div>
                    <? } ?>
                </div>
                
                <? foreach ($data['days'] as $id_day =>  $day) { ?>
                    
                    <div class="week_of_day">
                            <div class="cell_for big_hall">
                                 <? foreach ($data['time'] as $time) { ?>
                                    <div class="cell"><? echo ($data['schedule'][Sport::BIG_HALL][$id_day][$time]) ? Sport::generateCell("big", $data['schedule'][Sport::BIG_HALL][$id_day][$time]) : ""; ?></div>
                                <? } ?>
                            </div>
                            <div class="cell_for small_hall">
                                <? foreach ($data['time'] as $time) { ?>
                                    <div class="cell"><? echo ($data['schedule'][Sport::SMALL_HALL][$id_day][$time]) ? Sport::generateCell("small", $data['schedule'][Sport::SMALL_HALL][$id_day][$time]) : ""; ?></div>
                                <? } ?>
                            </div>
                            
                        
                    </div>
                    
                <? } ?>
                
                
                
            
            </div>
            
            <div class="redline fixed">
            <div class="compromiss_width">
                <div class="week_of_day first-child">
                    <span class="part big hall">Большой зал</span>
                    <span class="part small hall">Малый зал</span>
                </div>
                <? foreach ($data['days'] as $id_day => $day) { ?>
                    <div class="week_of_day" data-day="<? echo $id_day; ?>">
                        <? echo $day; ?>
                    </div>
                <? } ?>
            </div>
        </div>
        </div>
    
  
</div>