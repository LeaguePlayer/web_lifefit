<?
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_item',   // refers to the partial view named '_post'
    'sortableAttributes'=>array(
        'title',
        'create_time'=>'Post Time',
    ),
));
?>