<?php
$this->breadcrumbs=array(
    "Структура сайта"=>array('/admin/structure/list'),
    $model->list->node->name=>array('/admin/sportlist/update', 'id'=>$model->list_id),
    'Редактирование',
);

$this->menu=array(
    array('label'=>$model->list->node->name,'url'=>array('/admin/sportlist/update', 'id'=>$model->list_id)),
    array('label'=>'Добавить','url'=>array('/admin/sport/create', 'list_id'=>$model->list_id)),
);
?>

<h3>Редактирование <? echo mb_strtolower($model->list->node->name, 'UTF-8') ?> "<?php echo $model->title ?>"</h3>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'array_schedule'=>$array_schedule)); ?>