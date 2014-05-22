<div data-numeric="<?=$id_slot?>" class="controls">
                    <input name="Schedule[<? echo $id_slot; ?>][id]" class="in_row" value="<?=$object->id?>" type="hidden">
                    <?  echo CHtml::dropDownList("Schedule[{$id_slot}][day_of]", $object->day_of, Sport::getDayOfClasses() ); ?>
                    
                    
                    
                   
                    
                    
                    
                    
                    
                     <div class="input-append bootstrap-timepicker">
                     	<input name="Schedule[<? echo $id_slot; ?>][time_of]" type="text" value="<?=$object->time_of?>" class="input-small time in_row" />
                        <span class="add-on"><i class="icon-time"></i></span>
                    </div>
                    
                    <?  echo CHtml::dropDownList("Schedule[{$id_slot}][id_hall]", $object->id_hall, Sport::getHall() ,array('class'=>'fx_input') ); ?>
                    
                    <?  echo CHtml::textField("Schedule[{$id_slot}][teacher]", $object->teacher, array('placeHolder'=>'Укажите преподавателя') ); ?>
                    
                    
                   
                    
                    <?php echo TbHtml::button('Удалить', array('color' => TbHtml::BUTTON_COLOR_DANGER, 'class'=>'del_row')); ?>
</div>