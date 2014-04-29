<?php
/* @var $this SportlistController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sportlists',
);

$this->menu=array(
	array('label'=>'Create Sportlist', 'url'=>array('create')),
	array('label'=>'Manage Sportlist', 'url'=>array('admin')),
);
?>

<h1>Sportlists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
