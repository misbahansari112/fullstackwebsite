<?php
include("dbcon.php");
//Category Reference
$catref = "img/category/";
if(isset($_POST['addcategory'])){
$catName = $_POST['cName'];
$catImageName = $_FILES['cImage']['name'];
$catTmpname = $_FILES['cImage']['tmp_name'];
$extension = pathinfo($catImageName,PATHINFO_EXTENSION);
$desig = "img/category/".$catImageName;
if($extension =="jpg" || $extension =="png" || $extension == "jpeg" || $extension =="webp"){
    if(move_uploaded_file($catTmpname,$desig)){
        $query =$pdo->prepare("INSERT INTO `categories`(`catname`, `catimage`) VALUES (:pname,:pimage)");
        $query->bindParam("pname",$catName);
        $query->bindParam("pimage",$catImageName);
        $query->execute();
        echo "<script>alert('Category Added')</script>";
        }else
        {
            echo "<script>alert('fail')</script>";
        
        }
    }else{
    echo "<script>alert('Invalid File Type')</script>";
}
}
// update category
if (isset($_POST['editcategory'])){
    $catId = $_POST['catId'];
    $catName = $_POST['cName'];
     $catImageName = $_FILES['cImage']['name'];
     $catTmpName = $_FILES['cImage']['tmp_name'];
$extension = pathinfo($catImageName, PATHINFO_EXTENSION);
$desig = "img/category/" . $catImageName;
if ($extension == "jpg" || $extension == "jpeg" || $extension ==
"png" || $extension =="webp") {
    if (move_uploaded_file($catTmpName, $degig)) {
        $query = $pdo->prepare("update categories set cName =
        :pName ,catImage = :PImage where catId = :Pid");
        $query->bindParam("Pid",$catId) ;
        $query->bindParam("pName", $catName);
        $query->bindParam("PImage", $catImage);
        $query->excute();
        echo "<scripted>alert('category updated ');
        location.assign('viewcategory.php')</script>";
         

            
    }

}
}

        // add product
//Add product
if(isset($_POST['addproduct'])){
    $productName = $_POST['pName'];
    $productPrice = $_POST['pPrice'];
    $productDescription = $_POST['pDescription'];
    $productQuantity = $_POST['pQuantity'];
    $productCatid = $_POST['pCatid'];
    $productImageName = $_FILES['pImage']["name"];
    $productTmpName = $_FILES['pImage']["tmp_name"];
    $extension = pathinfo($productImageName,PATHINFO_EXTENSION);
    $desig = "img/product/".$productImageName;
    if($extension =="jpg" || $extension =="png" || $extension == "jpeg" || $extension =="webp") {
        if(move_uploaded_file($productTmpName,$desig)){
            $query = $pdo->prepare("INSERT INTO `products`(`productname`, `productquantity`, `productprice`, `productdescription`, `productimage`, `productcatid`) VALUES(:pn,:pq,:pp,:pd,:pi,:pc)");
            $query->bindParam("pn", $productName);
            $query->bindParam("pq", $productQuantity);
            $query->bindParam("pp", $productPrice);
            $query->bindParam("pd", $productDescription);
            $query->bindParam("pi", $productImageName);
            $query->bindParam("pc", $productCatid);
            $query->execute();
            echo "<script>alert('product added successfully')</script>";
    
        }else
        {
            echo "<script>alert('invalid file type')</script>";
        
        }
    }
    }

// update product

            
          //Update product
if(isset($_POST['updateproduct'])){
    $productid = $_POST['pid'];
    $productName = $_POST['pName'];
    $productPrice = $_POST['pPrice'];
    $productDescription = $_POST['pDescription'];
    $productQuantity = $_POST['pQuantity'];
    $productCatid = $_POST['pCatid'];
    $productImageName = $_FILES['pImage']["name"];
    $productTmpName = $_FILES['pImage']["tmp_name"];
    $extension = pathinfo($productImageName,PATHINFO_EXTENSION);
    $desig = "img/product/".$productImageName;
    if($extension =="jpg" || $extension =="png" || $extension == "jpeg" || $extension =="webp") {
        if(move_uploaded_file($productTmpName,$desig)){
            $query = $pdo->prepare("UPDATE `products` SET `productname` = :pn, `productquantity` = :pq, `productprice` = :pp, `productdescription` = :pd, `productimage` = :pi, `productcatid` = :pc WHERE `productid` = :pid");
            $query->bindParam("pn", $productName);
            $query->bindParam("pq", $productQuantity);
            $query->bindParam("pp", $productPrice);
            $query->bindParam("pd", $productDescription);
            $query->bindParam("pi", $productImageName);
            $query->bindParam("pc", $productCatid);
            $query->bindParam("pid", $productid);
            $query->execute();
            echo "<script>alert('product Updated successfully')
            location.assign('viewproducts.php')
            </script>";
    
        }
        else
        {
            echo "<script>alert('invalid file type')</script>";
        
        }
    }else{
        $query = $pdo->prepare("UPDATE `products` SET `productname` = :pn, `productquantity` = :pq, `productprice` = :pp, `productdescription` = :pd, `productcatid` = :pc WHERE `productid` = :pid");
        $query->bindParam("pn", $productName);
        $query->bindParam("pq", $productQuantity);
        $query->bindParam("pp", $productPrice);
        $query->bindParam("pd", $productDescription);
        $query->bindParam("pc", $productCatid);
        $query->bindParam("pid", $productid);
        $query->execute();
        echo "<script>alert('product Updated successfully without image')
        location.assign('viewproducts.php')
        </script>";


    }
    }
           

           

                    
                

                
                
                

                    
                
                 

                 

 

             
            
                

//         }
//     }

// }
    


?>