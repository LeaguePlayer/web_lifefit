<div class="backgroundPage">
    <div class="fix-width">
        <div class="captionPage"><h1><? echo $model->title ?></h1><div class="breadcrumb"><?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'separator'=>' > ',
		'links'=>$this->breadcrumbs,
	)); ?></div></div>
        
        <div class="typegraphy">
            
           <?php echo $model->wswg_body ?>
            
        </div>

    </div>
</div>