
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'sport-form',
	'enableAjaxValidation'=>false,
		'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<?php echo $form->errorSummary($model); ?>


    <?php $this->widget('bootstrap.widgets.TbTabs', array(
        'tabs' => array(
            array(
                'label' => 'Параметры раздела',
                'content' => $this->renderPartial('_rows', array(
                    'form'=>$form,
                    'model'=>$model
                ), true),
                'active' => true
            ),
			 array(
                'label' => 'Расписание',
                'content' => $this->renderPartial('_schedule', array(
                    
                    'model'=>$model, 
					'array_schedule'=>$array_schedule
                ), true),
            ),
            array(
                'label' => 'SEO',
                'content' => $this->getSeoForm($model),
            ),
        ),
    )); ?>

	<div class="form-actions">
		<?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
        <?php echo TbHtml::linkButton('Отмена', array(
            'url'=>array('/admin/sportlist/update', 'id'=>$model->list_id)
        )); ?>
	</div>

<?php $this->endWidget(); ?>
