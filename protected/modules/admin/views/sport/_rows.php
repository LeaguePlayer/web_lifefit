	<?php echo $form->textFieldControlGroup($model,'title',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textAreaControlGroup($model,'short_desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'wswg_body'); ?>
		<?php $this->widget('appext.ckeditor.CKEditorWidget', array('model' => $model, 'attribute' => 'wswg_body', 'config' => array('width' => '100%')
		)); ?>
		<?php echo $form->error($model, 'wswg_body'); ?>
	</div>

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'img_preview_main_slider'); ?>
		<?php echo $form->fileField($model,'img_preview_main_slider', array('class'=>'span3')); ?>
		<div class='img_preview'>
			<?php if ( !empty($model->img_preview_main_slider) ) echo TbHtml::imageRounded( $model->imgBehaviorPreview_main_slider->getImageUrl('small') ) ; ?>
			<span class='deletePhoto btn btn-danger btn-mini' data-modelname='Sport' data-attributename='Preview_main_slider' <?php if(empty($model->img_preview_main_slider)) echo "style='display:none;'"; ?>><i class='icon-remove icon-white'></i></span>
		</div>
		<?php echo $form->error($model, 'img_preview_main_slider'); ?>
	</div>

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'img_preview_coming_soon'); ?>
		<?php echo $form->fileField($model,'img_preview_coming_soon', array('class'=>'span3')); ?>
		<div class='img_preview'>
			<?php if ( !empty($model->img_preview_coming_soon) ) echo TbHtml::imageRounded( $model->imgBehaviorPreview_coming_soon->getImageUrl('small') ) ; ?>
			<span class='deletePhoto btn btn-danger btn-mini' data-modelname='Sport' data-attributename='Preview_coming_soon' <?php if(empty($model->img_preview_coming_soon)) echo "style='display:none;'"; ?>><i class='icon-remove icon-white'></i></span>
		</div>
		<?php echo $form->error($model, 'img_preview_coming_soon'); ?>
	</div>

	<?php echo $form->dropDownListControlGroup($model, 'status', Sport::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>





