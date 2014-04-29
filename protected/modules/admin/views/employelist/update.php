<?php
$this->breadcrumbs=array(
    "Структура сайта"=>array('/admin/structure/list'),
    'Редактирование',
);

$this->menu=array(
    array('label'=>'Структура сайта','url'=>array('/admin/structure/list')),
);
?>

<h2>Сотрудники - <?= $model->name ?></h2>

<?php echo $this->renderPartial('_form',array(
    'model' => $model,
    'employeFinder' => $employeFinder
)); ?>