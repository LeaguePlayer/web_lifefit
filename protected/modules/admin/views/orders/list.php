<h1>Управление заявками</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'orders-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('orders')}",
    'rowHtmlOptionsExpression'=>'array(
        "id"=>"items[]_".$data->id,
        "class"=>"status_".(isset($data->status) ? $data->status : ""),
    )',
	'columns'=>array(
		 array(
            'name'=>'name',
            'type'=>'raw',
            'value'=>'TbHtml::link($data->name, array("/admin/orders/update/", "id"=>$data->id))'
        ),
		'phone',
		
		 array(
            'name'=>'email',
            'type'=>'raw',
            'value'=>'TbHtml::link($data->email, "mailto:{$data->email}")'
        ),
		
		
		
		array(
            'name'=>'post_type',
            'type'=>'raw',
            'value'=>'$data->getPostType($data->post_type)'
        ),
		
		
		array(
			'name'=>'status',
			'type'=>'raw',
			'value'=>'Orders::getStatusAliases($data->status)',
			'filter'=>Orders::getStatusAliases()
		),
		array(
			'name'=>'create_time',
			'type'=>'raw',
			'value'=>'$data->create_time ? SiteHelper::russianDate($data->create_time).\' в \'.date(\'H:i\', strtotime($data->create_time)) : ""'
		),
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=> "{update} {delete}",
		),
	),
)); ?>

<?php if($model->hasAttribute('sort')) Yii::app()->clientScript->registerScript('sortGrid', 'sortGrid("orders");', CClientScript::POS_END) ;?>