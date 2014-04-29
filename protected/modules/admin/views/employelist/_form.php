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

    <?php echo $form->textFieldControlGroup($model, 'name', array('class'=>'span2')) ?>

    <?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::linkButton('Отмена', array('url'=>'/admin/structure/list')); ?>
</div>
<?php $this->endWidget(); ?>




<?php echo TbHtml::linkButton('Добавить сотрудника', array(
    'icon'=>TbHtml::ICON_PLUS,
    'url'=>array('/admin/employe/create', 'list_id'=>$model->id)
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'employe-grid',
    'dataProvider'=>$employeFinder->search(),
    'filter'=>$employeFinder,
    'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('employe')}",
    'rowHtmlOptionsExpression'=>'array(
            "id"=>"items[]_".$data->id,
            "class"=>"status_".$data->status,
        )',
    'columns'=>array(
        array(
            'name'=>'img_photo',
            'type'=>'raw',
            'value'=>'TbHtml::link($data->getImage("icon"), array("/admin/employe/update/", "id"=>$data->id, "list_id"=>'.$model->id.'))',
        ),
        array(
            'name'=>'fio',
            'type'=>'raw',
            'value'=>'TbHtml::link($data->fio, array("/admin/employe/update/", "id"=>$data->id, "list_id"=>'.$model->id.'))'
        ),
        array(
            'name'=>'status',
            'type'=>'raw',
            'value'=>'Employe::getStatusAliases($data->status)',
            'filter'=>Employe::getStatusAliases()
        ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{delete}',
            'buttons'=>array(
                'delete'=>array(
                    'url'=>'array("/admin/employe/delete", "id"=>$data->id)'
                ),
            ),
        ),
    ),
)); ?>

<?php Yii::app()->clientScript->registerScript('sortGrid', 'sortGrid("employe");', CClientScript::POS_END) ;?>
