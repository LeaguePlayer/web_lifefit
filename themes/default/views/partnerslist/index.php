<div class="backgroundPage">
    <div class="fix-width">
        <div class="captionPage"><h1><? echo $node->name ?></h1><div class="breadcrumb"><?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'separator'=>' > ',
		'links'=>$this->breadcrumbs,
	)); ?></div></div>
        
        <div id="partners">
            <noindex>
                <?php $this->widget('zii.widgets.CListView', array(
                	'dataProvider'=>$dataProvider,
                	'itemView'=>'_view',
                    'summaryText'=>'',
                )); ?>
            </noindex>
        </div>

    </div>
</div>


