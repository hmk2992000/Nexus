<?php
    session_start();
    $con = mysqli_connect("localhost", "root", "", "nexus");
    if(isset($_POST['id']) && isset($_POST['num'])  && isset($_POST['size']))
    {   
        if (isset($_SESSION['stt']))            // check số thứ tự đã có chưa (đã có giỏ hàng) nếu chưa cho bằng 0
        $stt = $_SESSION['stt'];
        else $stt = 0;
        
        $id = $_POST['id'];
        $num = $_POST['num'];
        $size = $_POST['size'];

        $qry = "SELECT * FROM product WHERE id ='".$id."'";
        
        $result = mysqli_query($con, $qry);
        $row = mysqli_fetch_array($result);

        
        if (!isset($_SESSION['cart']))       // Khi chưa có giỏ hàng hay giỏ hàng rỗng
        {   
           
            $stt++;                         // Tăng số thứ tự lên 1 ( ở đây là 0 do giỏ hàng rỗng nên 0 +1 = 1 bắt đầu)
            $cart = array();
            $cart[$stt] = array(
                'id' =>$row[0],
                'name'=>$row[1],
                'num'=> $num,
                'price'=>$row[5],
                'image'=>$row[2],
                'size' => $size
            );
             
              
        }
        else                                  // đã có giỏ hàng
        {   
             // error
            $cart = $_SESSION['cart'];
            
            if (array_key_exists($stt, $cart))  // check số thứ tự đã tồn tại chưa, nếu tồn tại tức loại sản phẩm đó đã có, tiến hành kiểm tra tiếp
                {       
                        
                        $flag = false;
                        foreach ($cart as $key => $value) {
                           if ($value['id'] == $id)
                           $flag = true;
                        }
                        
                        if ($size != $cart[$stt]['size'] || !$flag)  // nếu cỡ giày chưa tồn tại thì tăng stt lên 1 để tạo sản phẩm khác cỡ giày
                        {   
                            $stt++;                
                            $cart[$stt] = array(
                                'id' =>$row[0],
                                'name'=>$row[1],
                                'num'=>(int) $num,
                                'price'=>$row[5],
                                'image'=>$row[2],
                                'size' => $size
                            );
                        }
                        else{           
                                           // Nếu cỡ giày đã tồn tại thì ta tăng số lượng lên giữ cỡ giày cũ theo session
                            $cart[$stt] = array(
                                'id' =>$row[0],
                                'name'=>$row[1],
                                'num'=>(int) $cart[$stt]['num'] + $num,
                                'price'=>$row[5],
                                'image'=>$row[2],
                                'size' => (int) $cart[$stt]['size']
                            );
                             
                            
                        }
                        
                 
                    
                }
            else // nếu chưa tồn tại tức nó là sản phẩm hoàn toàn khác, thêm vào cart
                {   
                    $stt++;
                    $cart[$stt] = array(
                        'id' =>$row[0],
                        'name'=>$row[1],
                        'num'=> $num,
                        'price'=>$row[5],
                        'image'=>$row[2],
                        'size' => $size
                    );
                   
                }
        }
        $_SESSION['stt'] = $stt;
        $_SESSION["cart"] = $cart;
        $numCart = 0;
        foreach ($cart as $key => $value) {
            $numCart += 1;
        }
        echo $numCart;
         
    }
    
?>