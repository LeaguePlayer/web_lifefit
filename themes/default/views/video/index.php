<div class="actions">
	<div class="fix-width fancy">
		<?if ($models){?>
		<div class="items">
			<?
				foreach ($models as $key => $data) {
					$this->renderPartial('_view',array('model'=>$data));
				}
			?>
			<div class="item">
				<div class="vid"></div>
			</div>
			<div class="item">
				<div class="vid"></div>
			</div>
			<div class="item">
				<div class="vid"></div>
			</div>
		</div>
		 <?} else {?>
			<p class="empty">Нет загруженых видео</p>
		<?}?>
	</div>
</div>
