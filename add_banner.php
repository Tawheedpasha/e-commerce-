
<?php
require('top.inc.php');

$image1='';
$image2	='';
$image3	='';
$image4	='';
$imgodes ='';
$imgtdes ='';
$imgtrdes ='';
$imgfdes ='';


$msg='';
$image_required='required';

if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from banner where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$imgodes=$row['imgodes'];
		$imgtdes=$row['imgtdes'];
		$imgtrdes=$row['imgtrdes'];
		$imgfdes=$row['imgfdes'];
	}else{
		header('location:banner.php');
		die();
	}
}


if(isset($_POST['submit'])){
	$imgodes=get_safe_value($con,$_POST['imgodes']);
	$imgtdes=get_safe_value($con,$_POST['imgtdes']);
	$imgtrdes=get_safe_value($con,$_POST['imgtrdes']);
	$imgfdes=get_safe_value($con,$_POST['imgfdes']);


	if($_GET['id']==0){
		if($_FILES['image1']['type']!='image/png' && $_FILES['image1']['type']!='image/jpg' && $_FILES['image1']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
        if($_FILES['image2']['type']!='image/png' && $_FILES['image2']['type']!='image/jpg' && $_FILES['image2']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
        if($_FILES['image3']['type']!='image/png' && $_FILES['image3']['type']!='image/jpg' && $_FILES['image3']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
        if($_FILES['image4']['type']!='image/png' && $_FILES['image4']['type']!='image/jpg' && $_FILES['image4']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}else{

		if($_FILES['image1']['type']!=''){
			if($_FILES['image1']['type']!='image/png' && $_FILES['image1']['type']!='image/jpg' && $_FILES['image1']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
			}
			}
       	if($_FILES['image2']['type']!=''){
        if($_FILES['image2']['type']!='image/png' && $_FILES['image2']['type']!='image/jpg' && $_FILES['image2']['type']!='image/jpeg'){
         $msg="Please select only png,jpg and jpeg image formate";
        }
    	}
   		if($_FILES['image3']['type']!=''){
         if($_FILES['image3']['type']!='image/png' && $_FILES['image3']['type']!='image/jpg' && $_FILES['image3']['type']!='image/jpeg'){
        $msg="Please select only png,jpg and jpeg image formate";
   	 	}
    	}
   		if($_FILES['image4']['type']!=''){
   		if($_FILES['image4']['type']!='image/png' && $_FILES['image4']['type']!='image/jpg' && $_FILES['image4']['type']!='image/jpeg'){
    	$msg="Please select only png,jpg and jpeg image formate";
    	}
   		}
	
	}	

    
	// 'media/product/'
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
		 	if($_FILES['image1']['name']!=''){
				$image1=rand(111111111,999999999).'_'.$_FILES['image1']['name'];
				move_uploaded_file($_FILES['image1']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH_BAN.$image1);
				$update_sql="update banner set image1='$image1',imgodes='$imgodes',imgtdes='$imgtdes',imgtrdes='$imgtrdes',imgfdes='$imgfdes' where id='$id'";
			}
        	if($_FILES['image2']['name']!=''){
				$image2=rand(111111111,999999999).'_'.$_FILES['image2']['name'];
				move_uploaded_file($_FILES['image2']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH_BAN.$image2);
				$update_sql="update banner set image2='$image2',imgodes='$imgodes',imgtdes='$imgtdes',imgtrdes='$imgtrdes',imgfdes='$imgfdes' where id='$id'";
			}
       		if($_FILES['image3']['name']!=''){
				$image3=rand(111111111,999999999).'_'.$_FILES['image3']['name'];
				move_uploaded_file($_FILES['image3']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH_BAN.$image3);
				$update_sql="update banner set image3='$image3',imgodes='$imgodes',imgtdes='$imgtdes',imgtrdes='$imgtrdes',imgfdes='$imgfdes' where id='$id'";
			}
            if($_FILES['image4']['name']!=''){
				$image4=rand(111111111,999999999).'_'.$_FILES['image4']['name'];
				move_uploaded_file($_FILES['image4']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH_BAN.$image4);
                $update_sql="update banner set image4='$image4',imgodes='$imgodes',imgtdes='$imgtdes',imgtrdes='$imgtrdes',imgfdes='$imgfdes' where id='$id'";
			}else{
				$update_sql="update banner set imgodes='$imgodes',imgtdes='$imgtdes',imgtrdes='$imgtrdes',imgfdes='$imgfdes' where id='$id'";
			}

			mysqli_query($con,$update_sql);
			
		}else{
			$image1=rand(111111111,999999999).'_'.$_FILES['image1']['name'];
			move_uploaded_file($_FILES['image1']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH_BAN.$image1);

            $image2=rand(111111111,999999999).'_'.$_FILES['image2']['name'];
			move_uploaded_file($_FILES['image2']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH_BAN.$image2);
          
            $image3=rand(111111111,999999999).'_'.$_FILES['image3']['name'];
			move_uploaded_file($_FILES['image3']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH_BAN.$image3);
            
            $image4=rand(111111111,999999999).'_'.$_FILES['image4']['name'];
			move_uploaded_file($_FILES['image4']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH_BAN.$image4);
			mysqli_query($con,"insert into banner(imgodes,imgtdes,imgtrdes,imgfdes,image1,image2,image3,image4) values('$imgodes','$imgtdes','$imgtrdes','$imgfdes','$image1','$image2','$image3','$image4')");
			
		}
		header('location:banner.php');
		die();
	}	
	
}

//imgodes,imgtdes,imgtrdes,imgfdes,'$imgodes','$imgtdes','$imgtrdes','$imgfdes',

?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Banner image</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							  
                                <div class="form-group">
									<label for="categories" class=" form-control-label">Image 1</label>
									<input type="file" name="image1" class="form-control" <?php echo  $image_required?>>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Product Name</label>
									<input type="text" name="imgodes" placeholder="Enter tag line for image 1" class="form-control" required value="<?php echo $imgodes?>">
								</div>
                                <div class="form-group">
									<label for="categories" class=" form-control-label">Image 2</label>
									<input type="file" name="image2" class="form-control" <?php echo  $image_required?>>
								</div>	
								<div class="form-group">
									<label for="categories" class=" form-control-label">Product Name</label>
									<input type="text" name="imgtdes" placeholder="Enter tag line for image 2" class="form-control" required value="<?php echo $imgtdes?>">
								</div>
                                <div class="form-group">
									<label for="categories" class=" form-control-label">Image 3</label>
									<input type="file" name="image3" class="form-control" <?php echo  $image_required?>>
								</div>	
								<div class="form-group">
									<label for="categories" class=" form-control-label">Product Name</label>
									<input type="text" name="imgtrdes" placeholder="Enter tag line for image 3" class="form-control" required value="<?php echo $imgtrdes?>">
								</div>
                                <div class="form-group">
									<label for="categories" class=" form-control-label">Image 4</label>
									<input type="file" name="image4" class="form-control" <?php echo  $image_required?>>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Product Name</label>
									<input type="text" name="imgfdes" placeholder="Enter tag line for image 3" class="form-control" required value="<?php echo $imgfdes?>">
								</div>
                            
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>