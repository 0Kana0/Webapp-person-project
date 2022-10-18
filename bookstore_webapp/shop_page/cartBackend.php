<?php
    $check_cart = 0;
    foreach ($_SESSION['addcart'] as $bookcheck) {
        if ($cart_id == $bookcheck['cart_id']) {
            $check_cart = 1;
        }
    }
    if ($check_cart == 1) {
        $stmt1 = $conn->query("SELECT * FROM allbooklist JOIN allbooklist_volume JOIN book_volume JOIN book_type
        ON allbooklist.book_id = allbooklist_volume.book_id AND allbooklist_volume.volume_id = book_volume.volume_id  AND allbooklist_volume.type_id = book_type.type_id
        WHERE allbooklist_volume.allbook_id = $cart_id");
        $stmt1->execute();
        $book = $stmt1->fetch();
        $success=1;
        $i = 0;
        foreach ($_SESSION['addcart'] as $bookcheck) {
            if ($cart_id == $bookcheck['cart_id']) {
                $_SESSION['addcart'][$i]['book_qty'] += $book_qty;
            }
            $i++;
        }
    } else if ($check_cart == 0) {
        $stmt1 = $conn->query("SELECT * FROM allbooklist JOIN allbooklist_volume JOIN book_volume JOIN book_type
        ON allbooklist.book_id = allbooklist_volume.book_id AND allbooklist_volume.volume_id = book_volume.volume_id  AND allbooklist_volume.type_id = book_type.type_id
        WHERE allbooklist_volume.allbook_id = $cart_id");
        $stmt1->execute();
        $rows = $stmt1->fetchAll();
        foreach ($rows as $book) {
            $success=1;
            if(!isset($_SESSION['addcart']))
                $_SESSION['addcart'] = array();
                $item = array(
                            'cart_id' => $cart_id,
                            'book_name' => $book['book_name'],
                            'book_qty' => $book_qty,
                            'type_name' => $book['type_name'],
                            'book_type_name' => $book['book_type_name'],
                            'volume_id' => $book['volume_id'],
                            'volume_name' => $book['volume_name'],
                            'book_price_volume' => $book['book_price_volume'],
                            'book_img_volume' => $book['book_img_volume'],
                        );
            array_push($_SESSION['addcart'],$item);
        } 
    }
?>