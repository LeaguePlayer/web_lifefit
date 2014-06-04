	<?php echo $form->dropDownListControlGroup($model,'type', Cards::getTypes(), array('class'=>'span8') ); ?>

	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span8','maxlength'=>255)); ?>

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'img_preview'); ?>
		<?php echo $form->fileField($model,'img_preview', array('class'=>'span3')); ?>
		<div class='img_preview'>
			<?php if ( !empty($model->img_preview) ) echo TbHtml::imageRounded( $model->imgBehaviorPreview->getImageUrl('small') ) ; ?>
			<span class='deletePhoto btn btn-danger btn-mini' data-modelname='Cards' data-attributename='Preview' <?php if(empty($model->img_preview)) echo "style='display:none;'"; ?>><i class='icon-remove icon-white'></i></span>
		</div>
		<?php echo $form->error($model, 'img_preview'); ?>
	</div>
    
    
    
    
    

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'wswg_short_desc'); ?>
		<?php $this->widget('appext.ckeditor.CKEditorWidget', array('model' => $model, 'attribute' => 'wswg_short_desc', 'config' => array('width' => '100%')
		)); ?>
		<?php echo $form->error($model, 'wswg_short_desc'); ?>
	</div>

	<?php echo $form->dropDownListControlGroup($model, 'status', Cards::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
    
    <?php echo $form->checkBoxControlGroup($model,'priority'); ?>

<fieldset>
<legend>Привязка цен</legend>

<? foreach ( $array_pricecards as $id_slot => $model_pricecard ) { ?>
    
    	<?=$this->renderPartial('_sub_rows', array('id_slot'=>$id_slot, 'form'=>$form, 'object'=>$model_pricecard) );?>
    
<? } ?>

</fieldset>