<div class="backgroundPage">
    <div class="fix-width">
        <div class="captionPage"><h1><? echo $node->name ?></h1><div class="breadcrumb"><?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'separator'=>' → ',
		'links'=>$this->breadcrumbs,
	)); ?></div></div>
        
        <div class="typegraphy">
            <?php if ( !empty($model->img_preview) ): ?>
        		<img class="preview" src="<?= $model->getImageUrl('big') ?>" alt=""/>
        	<?php endif ?>
           <?php echo $model->body_content ?>
            
        </div>
        <div class="back">
		<a href="<?= $node->getUrl()?>">← Вернуться назад</a>
	</div>
        
    </div>
</div>



