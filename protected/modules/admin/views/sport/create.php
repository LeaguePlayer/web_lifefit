<?php
$this->breadcrumbs=array(
    "Структура сайта"=>array('/admin/structure/list'),
    $model->list->node->name=>array('/admin/sportlist/update', 'id'=>$model->list_id),
    'Создание',
);

$this->menu=array(
    array('label'=>$model->list->node->name,'url'=>array('/admin/sportlist/update', 'id'=>$model->list_id)),
);
?>

<h3>Добавление <? echo mb_strtolower($model->list->node->name, 'UTF-8') ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'array_schedule'=>$array_schedule)); ?>