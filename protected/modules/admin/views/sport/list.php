<?php
$get_sid = isset($this->node)? array('sid' => $this->node->id) : array();

$this->menu=array(
	array('label'=>'Добавить','url'=>$this->createUrl('create', $get_sid)),
);
?>
<?php if(isset($this->node)): ?>
<h1>Раздел - <?php echo $this->node->title; ?></h1>
<?php else: ?>
<h1>Управление <?php echo $model->translition(); ?></h1>
<?php endif;?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'sport-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('sport')}",
    'rowHtmlOptionsExpression'=>'array(
        "id"=>"items[]_".$data->id,
        "class"=>"status_".$data->status,
    )',
	'columns'=>array(
		'title',
		
		array(
			'header'=>'Фото',
			'type'=>'raw',
			'value'=>'TbHtml::imageCircle($data->getImageUrl("icon"))'
		),
		//'sid',
		array(
			'name'=>'status',
			'type'=>'raw',
			'value'=>'Sport::getStatusAliases($data->status)',
			'filter'=>Sport::getStatusAliases()
		),
		'sort',
		array(
			'name'=>'create_time',
			'type'=>'raw',
			'value'=>'SiteHelper::russianDate($data->create_time).\' в \'.date(\'H:i\', $data->create_time)'
		),
		array(
			'name'=>'update_time',
			'type'=>'raw',
			'value'=>'SiteHelper::russianDate($data->update_time).\' в \'.date(\'H:i\', $data->update_time)'
		),
		array('class'=>'bootstrap.widgets.TbButtonColumn')
	),
)); ?>

<?php Yii::app()->clientScript->registerScript('sortGrid', 'sortGrid("sport");', CClientScript::POS_END) ;?>