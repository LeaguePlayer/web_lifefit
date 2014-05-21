<div class="item-news">
    <? if ( $data->img_preview ) { ?>
    	<div class="img_preview">
             <? echo CHtml::link($data->getImage('small'), array('/news/view/', 'id'=>$data->id));  ?>
    	</div>
    <? } ?>
	<div class="news-info-preview">
		<div class="caption">
            <a href="<? echo Yii::app()->createUrl( "/news/view",array('id'=>$data->id) ) ?>">
		          <p><span class="news-date"><?=date('d',strtotime($data->create_time)).' '.SiteHelper::russianMonth(date('m',strtotime($data->create_time)))?>:</span> <?=$data->title?></p>
            </a>
		</div>
		<div class="news-announce">
			<?=$data->short_description;?>
		</div>
	</div>
</div>