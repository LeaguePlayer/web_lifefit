<?php
$this->breadcrumbs=array(
	'Videos'=>array('index'),
	$model->name,
);

<h1>View Video #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'video_url',
		'name',
		'img_preview',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
