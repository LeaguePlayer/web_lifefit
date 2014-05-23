<div class="order_view<? echo (in_array($type, array("guest", "card"))) ? " girl" : "" ?>">
    <h1><? echo $title; ?></h1>

    <? 
        
        switch($type)
        {
            case 'guest':
                echo $this->renderPartial('/site/order/_guest');
            break;
            case 'card':
                echo $this->renderPartial('/site/order/_card', array('data'=>$data));
            break;
            case 'thanks':
                echo "Thanks";
            break;
        }
        
    ?>

</div>