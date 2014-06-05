<div class="backgroundPage">
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
            
    
    
            <? if ( count( $result[Cards::BELONGS_TO_ABONEMENT] ) ) { ?>
            
            <table class="abonementy">
                <thead>
                    <tr>
                        <th class="main_caption">
                            Виды клубных карт
                        </th>
                        <th class="slot">
                            1 месяц
                        </th>
                        <th class="slot">
                            3 месяца
                        </th>
                        <th class="slot">
                            6 месяцев
                        </th>
                        <th class="slot">
                            12 месяцев
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                    <? foreach ($result[Cards::BELONGS_TO_ABONEMENT] as $abonement) { ?>
                
                    <tr>
                        <td class="first_column">
                            <i><? echo $abonement['name']; ?></i>
                            <? if ( $abonement['wswg_short_desc'] ) { ?>
                                <div>
                                    <? echo $abonement['wswg_short_desc']; ?>
                                </div>
                            <? } ?>
                        </td>
                        
                        <? foreach ($abonement->prices as $abonement_slot) {?>
                        <td>
                            <? if($abonement_slot->price) { ?>
                                <div class="card_price"><? echo number_format($abonement_slot->price, 0, '', ' '); ?><span>руб.</span></div>
                                <div  class="card_buy"><a class="run_fancy fancybox.ajax" href="/site/buycard/id_card/<? echo $abonement->id;?>/slot/<? echo $abonement_slot->id; ?>">Купить</a></div>
                                <? if ($abonement_slot->comment) { ?>
                                    <div class="add_info"><? echo $abonement_slot->comment; ?></div>
                                <? } ?>
                            <? } ?>
                        </td>
                        <? } ?>
                    </tr>
                    
                    <? } ?>
                    
                </tbody>
            </table>
            
            <? } ?>
            
            
            <? if ( count( $result[Cards::BELONGS_TO_PERSONAL_TRAINING] ) ) { ?>
            
                <table class="abonementy personal">
                    <thead>
                        <tr>
                            <th class="slot" colspan="5">
                                Персональные тренировки
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <? foreach ($result[Cards::BELONGS_TO_PERSONAL_TRAINING] as $personal_training) { ?>
                            <tr>
                                <td class="first_column">
                                    <i><? echo $personal_training['name']; ?></i>
                                    <? if ( $personal_training['wswg_short_desc'] ) { ?>
                                        <div>
                                            <? echo $personal_training['wswg_short_desc']; ?>
                                        </div>
                                    <? } ?>
                                </td>
                               
                                
                                 <? foreach ($personal_training->prices as $personal_training_slot) {?>
                                    <td>
                                        <? if($personal_training_slot->price) { ?>
                                            <div class="card_price"><? echo number_format($personal_training_slot->price, 0, '', ' '); ?><span>руб.</span></div>
                                            <div  class="card_buy reserve"><a class="run_fancy fancybox.ajax" href="/site/buycard/id_card/<? echo $personal_training->id;?>/slot/<? echo $personal_training_slot->id; ?>">Записаться</a></div>
                                        <? } ?>
                                    </td>
                                 <? } ?>
                                
                            </tr>
                            
                           
                        <? } ?>    
                        
                    </tbody>
                </table>
            
            
            <? } ?>
    
    </div>
</div>