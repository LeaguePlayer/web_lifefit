<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'employe-form',
	'enableAjaxValidation'=>false,
		'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<?php echo $form->errorSummary($model); ?>


	<?php echo $form->textFieldControlGroup($model,'fio',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textFieldControlGroup($model,'billet',array('class'=>'span8','maxlength'=>255)); ?>

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'img_photo'); ?>
		<?php echo $form->fileField($model,'img_photo', array('class'=>'span3')); ?>
		<div class='img_preview'>
			<?php if ( !empty($model->img_photo) ) echo TbHtml::imageRounded( $model->imgBehaviorPhoto->getImageUrl('small') ) ; ?>
			<span class='deletePhoto btn btn-danger btn-mini' data-modelname='Employe' data-attributename='Photo' <?php if(empty($model->img_photo)) echo "style='display:none;'"; ?>><i class='icon-remove icon-white'></i></span>
		</div>
		<?php echo $form->error($model, 'img_photo'); ?>
	</div>

	<?php echo $form->textFieldControlGroup($model,'phone',array('class'=>'span8','maxlength'=>255)); ?>

	
	<?php echo $form->textFieldControlGroup($model,'email',array('class'=>'span8','maxlength'=>255)); ?>

	
    <div class='control-group'>
        <?php echo CHtml::activeLabelEx($model, 'wswg_description'); ?>
        <?php $this->widget('appext.ckeditor.CKEditorWidget', array('model' => $model, 'attribute' => 'wswg_description',
        )); ?>
        <?php echo $form->error($model, 'wswg_description'); ?>
    </div>

	<?php echo $form->radioButtonListControlGroup($model,'gender', Employe::getGenders()); ?>

	<?php echo $form->dropDownListControlGroup($model, 'status', Employe::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>

    <div class="form-actions">
        <?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
        <?php echo TbHtml::linkButton('Отмена', array(
            'url'=>array('/admin/employelist/update', 'id'=>$model->list_id)
        )); ?>
    </div>

<?php $this->endWidget(); ?>
