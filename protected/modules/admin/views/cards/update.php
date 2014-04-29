<?php
$this->breadcrumbs=array(
    "Структура сайта"=>array('/admin/structure/list'),
    "Абонементы"=>array('/admin/cardslist/update', 'id'=>$model->list_id),
    'Редактирование',
);

$this->menu=array(
    array('label'=>'Абонементы','url'=>array('/admin/cardslist/update', 'id'=>$model->list_id)),
    array('label'=>'Добавить новый','url'=>array('/admin/cards/create', 'list_id'=>$model->list_id)),
);
?>

<h3>Редактирование абонемента "<?php echo $model->name ?>"</h3>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'array_pricecards'=>$array_pricecards)); ?>