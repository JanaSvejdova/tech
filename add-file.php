<?php 
include('head.php'); ?>

<?php 
    
    if(isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']); 
     } 
  
     
         if(isset($_SESSION['upload'])) {
             echo $_SESSION['upload'];
             unset($_SESSION['upload']); }
    ?>
    <h1>Add document</h1>
        <br><br>

            <form  action="" method="POST" enctype="multipart/form-data"  >


                <table class="tbl-30 text-center">
                    <tr>  
                        <td>Title</td>
                        <td>
                          <input type="text" name="title" placeholder="New title">
                        </td>
                    </tr>

                    <tr>
                        <td>desctiption</td>
                        <td>
                            <textarea name="description" cols="30"  rows="5" placeholder="desctiption of this file"></textarea>
                        </td>
                    </tr>

                    <tr> 
                        <td>Owner</td>
                            <td>
                               <input type="text" name="owner" placeholder="Owner">
                            </td>
                    </tr>


                    <tr>
                        <td>file</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Date</td>
                        <td>
                            <input type="date"  name="date">
                        </td>
                    </tr>

                    <tr>
                        <td>Tags</td>
                        <td>
                            <select name="tags" multiple>
                        
                                <option name="tags" value="Praha">Praha</option>
                                <option name="tags" value="Brno"> Brno </option>
                                <option name="tags" value="Plzen">Plzen</option> 
                    
                             </select>
                         </td>
                    </tr>
                    <br> 

                    <tr>           
                        <td colspan="2">
                            <input  type="hidden" name="id" value="<?php echo $id; ?>">
                            <br>
                            <input type="submit" name="submit" value="Sumbit new file" class="btn-secondary" >  
                        </td>
                    </tr>
                </table>
            </form>

            <a href="file.php" class="btn-primany">Main page</a>


<?php 



   if(isset($_FILES['image']['name'])) {

    $image_name = $_FILES['image']['name'];

    if($image_name!=  ""){
       

    $source_path = $_FILES['image']['tmp_name'];

    $destination_path = "upload/".$image_name;


    $upload = move_uploaded_file($source_path, $destination_path);

    if($upload ==false) {
        $_SESSION['upload'] ="<div class='error'>Failed to upload</div>";
        header('location:'.SITEURL.'add-file.php') ;    
        }
    }
        else {
            $image_name=  "";
        } 
 }
        


        if(isset($_POST['submit'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $owner = $_POST['owner'];
            $date = $_POST['date'];
            $tags = $_POST['tags'];
        
              $sql = "INSERT INTO tbl_file SET
               title='$title',
               description='$description',
               owner='$owner',
               date='$date',
               image_name = '$image_name',
               tags ='$tags'
               ";
           
           $res = mysqli_query($conn, $sql) ; 

           if($res==true) {
            $_SESSION['add'] = "<div class='success'> file added successfully</div>";
            header('location:'.SITEURL.'add-file.php');

        } else {
            $_SESSION['add'] = "<div class='error'> file failed</div>";
            header('location:'.SITEURL.'add-file.php');
        }
     }
   
 ?>
       
    
<?php 
include('footer.php'); ?>