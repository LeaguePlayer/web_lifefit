<?php
$this->breadcrumbs=array(
    "Структура сайта"=>array('/admin/structure/list'),
    "Сотрудники"=>array('/admin/employelist/update', 'id'=>$model->list_id),
    'Создание',
);

$this->menu=array(
    array('label'=>'Сотрудники','url'=>array('/admin/employelist/update', 'id'=>$model->list_id)),
);
?>

    <h3>Добавление нового сотрудника</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>