<div class="controls">
					
                    <div style="margin-bottom: 15px;">
                        <? echo CHtml::label(Cards::getSlots($id_slot), ""); ?>
                      <? echo $form->textField($object, "price", array('name'=>"Pricecards[{$id_slot}][price]", 'class'=>'span8', 'label'=>Cards::getSlots($id_slot), 'placeholder'=>'Укажите стоимость') ); ?>
                     <? echo $form->textField($object, "comment", array('name'=>"Pricecards[{$id_slot}][comment]", 'class'=>'span8', 'label'=>'', 'placeholder'=>'Укажите комментарий к цене') ); ?>                    	
                    </div>
                  
</div>