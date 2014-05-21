<div class="item-news">
	<div class="img_preview">
		<?
			$imgPath='/media/images/news/'.(!empty($data->img_preview) ? $data->img_preview : 'default-news.png');
			?>

			<img src="<?=$imgPath?>" alt="">

	</div>
	<div class="news-info-preview">
		<div class="caption">
			<p><span class="news-date"><?=date('d',strtotime($data->create_time)).' '.SiteHelper::russianMonth(date('m',strtotime($data->create_time)))?>:</span><?=$data->title?></p>
		</div>
		<div class="news-announce">
			<?=$data->short_description;?>
		</div>
	</div>
</div>