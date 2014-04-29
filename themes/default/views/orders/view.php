<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->name,
);

<h1>View Orders #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'phone',
		'email',
		'post_id',
		'post_type',
		'status',
		'create_time',
		'update_time',
	),
)); ?>
