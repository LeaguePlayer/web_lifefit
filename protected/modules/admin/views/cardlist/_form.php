


<?php $this->widget('bootstrap.widgets.TbTabs', array(
		'tabs' => array(
			array(
				'label' => 'Управление абонементами',
				'content' => $this->renderPartial('_list', array(
					
					'model'=>$model,
					'cardsFinder' => $cardsFinder,
				), true),
				'active' => true
			),
		  array(
				'label' => 'Текст на странице',
				'content' => $this->renderPartial('_content', array(
					'form'=>$form,
					'model'=>$model,
					
				), true),
				'active' => false
			),
		),
	)); ?>




