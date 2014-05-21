<div class="backgroundPage">
    <div class="fix-width">
        <div class="captionPage"><h1><? echo $node->name ?></h1><div class="breadcrumb"><?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'separator'=>' → ',
		'links'=>$this->breadcrumbs,
	)); ?></div></div>
<?
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_item',   // refers to the partial view named '_post'
    'template'=>'{items}{pager}',
    'pager' => array(
           'firstPageLabel'=>'',
           'prevPageLabel'=>'Назвад',
           'nextPageLabel'=>'Вперед',
           'lastPageLabel'=>'',
           'maxButtonCount'=>'5',
           'header'=>'',
           'cssFile'=>false,

       ),
    'sortableAttributes'=>array(
        'title',
        'create_time'=>'Post Time',

    ),

));
?>
	<div class="news-fallow">
		<div class="caption">
			Следите <br>за нами
		</div>
		<div class="description">
			Все новые акции и скидки
можно увидеть первыми
в самой уютной группе
		</div>
		<div class="vk-widget">

		</div>
		<div class="treangle">
		</div>
	</div>
</div>