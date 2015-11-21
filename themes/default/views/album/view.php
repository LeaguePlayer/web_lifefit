<?php
$this->breadcrumbs=array(
	'Albums'=>array('index'),
	$model->name,
);

<h1>View Album #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'glr_album',
		'wswg_body',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
