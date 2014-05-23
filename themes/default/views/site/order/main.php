<div class="order_view<? echo ($type=="guest") ? " girl" : "" ?>">
    <h1><? echo $title; ?></h1>

    <? 
        
        switch($type)
        {
            case 'guest':
                echo $this->renderPartial('/site/order/_guest');
            break;
            case 'thanks':
                echo "Thanks";
            break;
        }
        
    ?>

</div>