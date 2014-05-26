<div class="typegraphy about">
    <? if($data['model']->img_photo)
    {
        $src_img = $data['model']->getImageUrl('small');
         echo "<img class='preview' src='$src_img' />";
    } ?>
    <? echo $data['model']->wswg_description; ?>
</div>