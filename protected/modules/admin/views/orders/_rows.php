	<?php echo $form->textFieldControlGroup($model,'post_type_word',array('class'=>'span8','maxlength'=>255, 'disabled'=>true, 'name'=>"disabled")); ?>
	
	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'phone',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'email',array('class'=>'span8','maxlength'=>255)); ?>

	
	<?php echo $form->dropDownListControlGroup($model, 'status', Orders::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
