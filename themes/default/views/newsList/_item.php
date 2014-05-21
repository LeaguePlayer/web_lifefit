<div class="item-news">
    <? if ( $data->img_preview ) { ?>
    	<div class="img_preview">
             <? echo $data->getImage('small'); ?>
    	</div>
    <? } ?>
	<div class="news-info-preview">
		<div class="caption">
			<p><span class="news-date"><?=date('d',strtotime($data->create_time)).' '.SiteHelper::russianMonth(date('m',strtotime($data->create_time)))?>:</span><?=$data->title?></p>
		</div>
		<div class="news-announce">
			<?=$data->short_description;?>
		</div>
	</div>
</div>