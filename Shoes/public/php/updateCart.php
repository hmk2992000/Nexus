<?php
    
    session_start();
    // id ở đây thực ra là số thứ tự sản phẩm trong cart
    if(isset($_POST['id']) && isset($_POST['num']) && isset($_POST['size'])  && isset($_POST['product_id'] ))
    {   
        $id = $_POST['id'];
        $num = $_POST['num'];
        $size = $_POST['size'];
        $cart = $_SESSION['cart'];
        $product_id = $_POST['product_id'];
        if (array_key_exists($id, $cart))
                {   
                    $flag = false; 
                    if($num > 0){

                        foreach($cart as $key=>$value){
                            //echo $product_id." ".$value['id']." ";
                             if( $size == $value['size'] && $product_id == $value['id'] && $key!=$id)
                             {
                               
                                $cart[$key] = array(
                                    'id'=>$cart[$key]['id'],
                                    'name'=>$cart[$key]['name'],
                                    'num'=>$cart[$key]['num'] + $num,
                                    'price'=>$cart[$key]['price'],
                                    'image'=>$cart[$key]['image'],
                                    'size'=> $cart[$key]['size']
                                );
                                
                                unset($cart[$id]);
                                $flag = true;
                             }
                             
                            //$key: key của phần tử đang được duyệt
                            //$value: Giá trị của phần tử đang được duyệt
                        // Xử lý tác động vào các phần tử của mảng
                        }
                        if($flag==false)
                        {   
                            $cart[$id] = array(
                                'id'=>$cart[$id]['id'],
                                'name'=>$cart[$id]['name'],
                                'num'=>$num,
                                'price'=>$cart[$id]['price'],
                                'image'=>$cart[$id]['image'],
                                'size'=> $size
                            );
                        }
                    }
                    else
                    {   
                        unset($cart[$id]);
                    }
                }
         $_SESSION["cart"] = $cart;
         
         $numCart = 0;
         foreach ($cart as $key => $value) {
             if($num <= 0)
             
             $numCart -= 1;
            
         }
         
         $numCart*=-1;
         if ($numCart < 0)
         unset($_SESSION['stt']);
         echo $numCart;
    }
?>