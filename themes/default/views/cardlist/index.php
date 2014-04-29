<?php
/* @var $this CardlistController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cardlists',
);

$this->menu=array(
	array('label'=>'Create Cardlist', 'url'=>array('create')),
	array('label'=>'Manage Cardlist', 'url'=>array('admin')),
);
?>

<h1>Cardlists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
