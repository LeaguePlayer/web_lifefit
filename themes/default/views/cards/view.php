<?php
$this->breadcrumbs=array(
	'Cards'=>array('index'),
	$model->name,
);

<h1>View Cards #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'name',
		'img_preview',
		'wswg_short_desc',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
