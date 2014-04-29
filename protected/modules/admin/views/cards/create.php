<?php
$this->breadcrumbs=array(
    "Структура сайта"=>array('/admin/structure/list'),
    "Абонементы"=>array('/admin/cardlist/update', 'id'=>$model->list_id),
    'Создание',
);

$this->menu=array(
    array('label'=>'Абонементы','url'=>array('/admin/cardlist/update', 'id'=>$model->list_id)),
);
?>

<h3>Добавление абонемента</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'array_pricecards'=>$array_pricecards)); ?>