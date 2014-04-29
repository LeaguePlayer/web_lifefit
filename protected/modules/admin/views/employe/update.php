<?php
$this->breadcrumbs=array(
    "Структура сайта"=>array('/admin/structure/list'),
    "Сотрудники"=>array('/admin/employelist/update', 'id'=>$model->list_id),
    'Редактирование',
);

$this->menu=array(
    array('label'=>'Сотрудники','url'=>array('/admin/employelist/update', 'id'=>$model->list_id)),
    array('label'=>'Добавить нового','url'=>array('/admin/employe/create', 'list_id'=>$model->list_id)),
);
?>

    <h3>Профиль сотрудника "<?php echo $model->fio ?>"</h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>