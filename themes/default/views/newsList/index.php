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
            <script type="text/javascript" src="//vk.com/js/api/openapi.js?112"></script>

            <!-- VK Widget -->
            <div id="vk_groups"></div>
            <script type="text/javascript">
            VK.Widgets.Group("vk_groups", {mode: 0, width: "250", height: "116", color1: 'e32727', color2: 'ffffff', color3: 'c71f1f'}, 27148277);
            </script>
		</div>
		<div class="treangle">
		</div>
	</div>
</div>