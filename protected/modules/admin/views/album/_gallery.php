<?
if ($model->id)
{
?>
<div class="row-fluid">
	<?php $this->widget('appext.imagesgallery.GalleryContainer', array(
		'model' => $model,
		'controllerRoute' => '/admin/gallery',
//		'htmlOptions' => array(
//			'class' => 'span8'
//		)
	)); ?>
</div>

<?} else {?>
<div class="alert alert-info in fade">
	Галерея станет доступной после сохранения портфолио!
</div>
<?}?>
<style type="text/css">
.gallery-box.thumbnail{
	display: none;
}
</style>