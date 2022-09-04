<?php 
include('head.php'); ?>


        <form>
            <table class="tbl-full text-center">
                
       
                <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Created at </th>
                <th>Description:</th>
                <th>Tags</th>
                <th>Owner</th>
                <th>File</th>
                </tr>

                <?php

                  $sql = "SELECT * FROM tbl_file";

                  $res  = mysqli_query($conn,$sql);
                  $count = mysqli_num_rows($res);
                  $sn=1;
                  if($count>0) {
                     while($row=mysqli_fetch_assoc($res)) {
                        $id =  $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $image_name  = $row['image_name'];
                        $date  = $row['date'];
                        $owner = $row['owner'];
                        $tags = $row['tags'];
                     
                 ?>  

      <tr>
         <td><?php echo  $sn++; ?></td>
         <td><?php echo $title; ?></td>
         <td><?php echo $date; ?></td>
         <td><?php echo $description; ?></td>
         <td><?php echo $tags; ?></td>
         <td><?php echo $owner; ?></td>
         <td>
            <?php 
            if($image_name!==""){
               ?> <a class="btn-down" href="<?php echo SITEURL;?>upload/<?php echo $image_name; ?>" target="_blank">Download  file</a> 
               
               <?php

            } else {
                echo "<div class='error'>file not added</div>";
            }
            
            ?>

         </td>
      </tr>


      <?php

            }
      } else {
         echo "<tr> <td colspan='7' class='error'> file  not added yet</td></tr>";
      }
      ?>

         </table>
      </form>
<?php 
include('footer.php'); ?>

