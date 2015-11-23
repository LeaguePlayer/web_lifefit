<div class="actions">

	<div class="content fix-width">
		<h1 style="font-size:20px;"><?=$model->name?></h1>
	<?
		foreach ($model->gallery->galleryPhotos as $key => $photo) {
			echo $photo->getImage();
		}
	?>
	</div>
</div>