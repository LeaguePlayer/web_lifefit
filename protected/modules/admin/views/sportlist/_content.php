<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'object-form',
	'enableAjaxValidation'=>false,
		'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>
    <div class="form-actions">
        <?php echo $form->errorSummary($model); ?>

        <?php if ( Yii::app()->user->hasFlash('SAVED') ) {
            echo TbHtml::alert(TbHtml::ALERT_COLOR_INFO, Yii::app()->user->getFlash('SAVED'));
        } ?>

       <div class='control-group'>
    		<?php echo CHtml::activeLabelEx($model, 'wswg_content'); ?>
    		<?php $this->widget('appext.ckeditor.CKEditorWidget', array('model' => $model, 'attribute' => 'wswg_content', 'config' => array('width' => '100%')
    		)); ?>
    		<?php echo $form->error($model, 'wswg_content'); ?>
    	</div>

        <?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
        <?php echo TbHtml::linkButton('Отмена', array('url'=>'/admin/structure/list')); ?>
    </div>
<?php $this->endWidget(); ?>