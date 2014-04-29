
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'news-form',
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
                    'model'=>$model, 
					'array_pricecards'=>$array_pricecards
                ), true),
                'active' => true
            ),
           
        ),
    )); ?>

	<div class="form-actions">
		<?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
        <?php echo TbHtml::linkButton('Отмена', array(
            'url'=>array('/admin/cardlist/update', 'id'=>$model->list_id)
        )); ?>
	</div>

<?php $this->endWidget(); ?>
