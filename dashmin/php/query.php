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
// if (isset($_POST['add product'])){
//     $ProductName = $_post['pName'];
//     $productprice = $_POST['pPrice'];
//     $productQuantity = $_POST['pQuantity'];
//     $productDescription = $_POST['pDescription'];
//     $productCatId = $_POST['pCatId'];
//     $productImageName = $_FILES['pImageName']['name'];
//     $productTmpName = $_FILES['pImage']["tmp_name"];
//     $extension = pathinfo($productImageName, PATHINFO_EXTENSION);
//     $desig ="img/product/" .$productImageName;
//     if ($EXTENSION =="png" ||$extension=="jpg" ||$extension ==
//     "jpeg" || $extension =="webp") { 
//         if (move_uploaded_files($productTmpName, $desig)) { 
//             $query = $pdo->prepare("INSERT INTO  PRODUCTS(INSERT INTO `products`(`productsname`, `productprice`, `productquantity`, `productdescription`, `productImage`, `productcatid`) VALUES(:pn,:pp,:pq,:pd,:pi,:pc)");
//             $query->bindParam("pn", $productName);
//             $query->bindParam("pq",$productQuantity);
//             $query->bindParam("pp",$productPrice);
//             $query->bimdParam("pd",$productDescription);
//             $query->bindParam("pc",$productCatId);
//             $query->bindParam("pi",$productImageName);
//             $query->execute();
//             echo "<script></script>";

//         }
//     }

// }
    


?>