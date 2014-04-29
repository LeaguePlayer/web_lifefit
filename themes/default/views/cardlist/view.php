<?php
$this->breadcrumbs=array(
	'Cardlists'=>array('index'),
	$model->id,
);

<h1>View Cardlist #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'node_id',
		'page_size',
	),
)); ?>
