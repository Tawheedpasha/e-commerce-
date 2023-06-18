<?php
require('top.inc.php');
$id='';
$image1='';
$image2='';
$image3='';
$image4='';
    if(isset($_GET['type']) && $_GET['type']!=''){
        $type=get_safe_value($con,$_GET['type']);
        
        if($type=='delete'){
            $id=get_safe_value($con,$_GET['id']);
            $delete_sql="delete from banner where id='$id'";
            mysqli_query($con,$delete_sql);
        }
    }
     $sql="select * from banner order by id desc";
     $res=mysqli_query($con,$sql);
?>




<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Banner images</h4>
                           <a href="add_banner.php">
                           <button  id="add_categories" class="btn btn-lg btn-info btn-block">
                           <span ><h4 class="box-link">Add image</h4></span>
                           </button>
</a>
                           
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th class="avatar">ID</th>
                                       <th>Image 1</th>
                                       <th>Image 2</th>
							                   <th>Image 3</th>
							                   <th>Image 4</th>
							                   
							                  
                                        <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $i=1;
                                        while($row=mysqli_fetch_assoc($res)){?>
                                        
                                       
                                    
                                    <tr>
                                        <td class="serial"><?php echo $i ?></td>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH_BAN.$row['image1'] ?>" > <br><?php echo $row['imgodes'] ?> </td>
                                        <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH_BAN.$row['image2'] ?>" > <br> <?php echo $row['imgtdes'] ?> </td>
                                         <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH_BAN.$row['image3'] ?>" > <br><?php echo $row['imgtrdes'] ?> </td><!-- media/product/ */-->
                                         <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH_BAN.$row['image4'] ?>" >  <br><?php echo $row['imgfdes'] ?></td>                                        
                                         <td><?php                                          
                                          echo  "&nbsp;<span class='badge badge-complete'><a href='add_banner.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
                                        ?> <br>  <?php
                                         echo  "&nbsp;<span class='badge badge-pending'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
                                        
                                         ?></td>
                                         <tr>
                                       <?php 
                                    } ?> 
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
</div>
<?php

 require('footer.inc.php');
?>
