<?php echo TbHtml::linkButton("Добавить в {$model->node->name}", array(
    'icon'=>TbHtml::ICON_PLUS,
    'url'=>array('/admin/sport/create', 'list_id'=>$model->id)
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'sport-grid',
    'dataProvider'=>$sportFinder->search(),
    'filter'=>$sportFinder,
    'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('sport')}",
    'rowHtmlOptionsExpression'=>'array(
            "id"=>"items[]_".$data->id,
            "class"=>"status_".$data->status,
        )',
    'columns'=>array(
        array(
            'name'=>'img_preview',
            'type'=>'raw',
            'value'=>'TbHtml::imageCircle($data->getImageUrl("icon"))',
            'filter'=>false
        ),
        array(
            'name'=>'title',
            'type'=>'raw',
            'value'=>'TbHtml::link($data->title, array("/admin/sport/update/", "id"=>$data->id, "list_id"=>'.$model->id.'))'
        ),
        array(
            'name'=>'status',
            'type'=>'raw',
            'value'=>'Sport::getStatusAliases($data->status)',
            'filter'=>Sport::getStatusAliases()
        ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{delete}',
            'buttons'=>array(
                'delete'=>array(
                    'url'=>'array("/admin/sport/delete", "id"=>$data->id)'
                ),
                'view'=>array(
                    'url'=>'array("/admin/sport/view", "id"=>$data->id)'
                ),
            ),
        ),
    ),
)); ?>
