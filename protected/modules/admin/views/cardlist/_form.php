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

        <?php echo $form->textFieldControlGroup($model, 'page_size', array('class'=>'span2')) ?>

        <?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
        <?php echo TbHtml::linkButton('Отмена', array('url'=>'/admin/structure/list')); ?>
    </div>
<?php $this->endWidget(); ?>




<?php echo TbHtml::linkButton('Добавить абонемент', array(
    'icon'=>TbHtml::ICON_PLUS,
    'url'=>array('/admin/cards/create', 'list_id'=>$model->id)
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'cards-grid',
    'dataProvider'=>$cardsFinder->search(),
    'filter'=>$cardsFinder,
    'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('cards')}",
    'rowHtmlOptionsExpression'=>'array(
            "id"=>"items[]_".$data->id,
            "class"=>"status_".$data->status,
        )',
    'columns'=>array(
        array(
            'name'=>'img_preview',
            'type'=>'raw',
            'value'=>'$data->getImage("icon")',
            'filter'=>false
        ),
        array(
            'name'=>'name',
            'type'=>'raw',
            'value'=>'TbHtml::link($data->name, array("/admin/cards/update/", "id"=>$data->id, "list_id"=>'.$model->id.'))'
        ),
        array(
            'name'=>'status',
            'type'=>'raw',
            'value'=>'Cards::getStatusAliases($data->status)',
            'filter'=>Cards::getStatusAliases()
        ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{delete}',
            'buttons'=>array(
                'delete'=>array(
                    'url'=>'array("/admin/cards/delete", "id"=>$data->id)'
                ),
                'view'=>array(
                    'url'=>'array("/admin/cards/view", "id"=>$data->id)'
                ),
            ),
        ),
    ),
)); ?>
