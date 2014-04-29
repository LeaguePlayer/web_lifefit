<?php
$this->breadcrumbs=array(
	'Sportlists'=>array('index'),
	$model->id,
);

<h1>View Sportlist #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'node_id',
	),
)); ?>
