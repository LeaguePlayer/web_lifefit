<fieldset>
	<legend>Привязка расписания занятий</legend>


	<div class="control-group">
    		
        <div class="place_c">
       
       		<? if( count( $array_schedule ) > 0 ) { ?>
            	<? foreach( $array_schedule as $id_slot => $schedule ) { ?>
					<?=$this->renderPartial('_sub_rows', array('object'=>$schedule, 'id_slot'=>$id_slot) );?>
                <? } ?>
            <? } ?>
            
        </div>
        <?php echo TbHtml::button('Добавить строку', array('class'=>'add_row')); ?>
     </div>

</fieldset>