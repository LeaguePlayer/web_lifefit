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
            'name'=>'type',
            'type'=>'raw',
            'value'=>'Cards::getTypes($data->type)',
            'filter'=>Cards::getTypes()
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

<?php Yii::app()->clientScript->registerScript('sortGrid', 'sortGrid("cards");', CClientScript::POS_END) ;?>