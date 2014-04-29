<?php
$this->breadcrumbs=array(
	'Sports'=>array('index'),
	$model->title,
);

<h1>View Sport #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'list_id',
		'title',
		'short_desc',
		'wswg_body',
		'img_preview_main_slider',
		'img_preview_coming_soon',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
