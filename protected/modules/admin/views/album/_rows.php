	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span8','maxlength'=>255)); ?>

	<div class='control-group'>
	<?//php echo CHtml::activeLabelEx($model, $attr); ?>
		<?php if ($model->gallery === null) {
			echo '<p class="help-block">Прежде чем загружать изображения, нужно сохранить текущее состояние</p>';
		} else {
			$this->widget('appext.imagesgallery.GalleryManager', array(
				'gallery' => $model->gallery,
				'controllerRoute' => '/admin/gallery',
			));
		} ?>
	</div>

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'wswg_body'); ?>
		<?php $this->widget('appext.ckeditor.CKEditorWidget', array('model' => $model, 'attribute' => 'wswg_body', 'config' => array('width' => '100%')
		)); ?>
		<?php echo $form->error($model, 'wswg_body'); ?>
	</div>

	<?php echo $form->dropDownListControlGroup($model, 'status', Album::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
