<?php
include("compnent/header.php");
?>
      <!-- Blank Start -->
      <div class="container-fluid pt-4 px-4">
                <div class="row  bg-light rounded  mx-0">
                    <div class="col-md-12 ">
                    <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">add category</h6>
                            <form method="post" enctype="multipart/form-data">
                                
                
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">product name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="cName">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">product name</label>
                                    <input type="text" class="form-control" name="pName"
                                        aria-describedby="emailHelp"> 





                                    
                        
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">product price</label>
                                    <input type="text" class="form-control" name="pPrice"
                                        aria-describedby="emailHelp" >


                                
        
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">product quantity</label>
                                    <input type="text" class="form-control" name="pQuantity"
                                        aria-describedby="emailHelp" >
                                    
                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">product category</label>
                                    <select class="form-select" id="floatingselect"
                                        aria-label="Floating label select example" name="pCatId">
                                        <option selected hidden>select anyone</option>
                                        </?php
                                        $query = $pdo->query("select * from categories");
                                        $row = $query->fetchAll(PDO: :FETCH_ASSOC);

                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="cImage">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary" name="addcategory">add category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

<?php
include("compnent/footer.php");
?>

    
