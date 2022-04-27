<!-- if any changes are made in database in myadminphp, the change is instantly shown in the website insted
of needing to refresh the page -->
<?php 
include "config.php";
?>
<!doctype html>
<html>
 <head>
  <!-- CSS -->
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
  

  <style>
    .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
    border: 3px solid #5c8a8a;
}

  </style>
</head>
 <body style="background-color:#b3cccc">
  <div class="container" >
    <center><h1 >Book Data</h1></center>
   <!-- Modal:dialog box/popup window that is displayed on top of the current page -->
   <div class="modal fade" id="empModal" role="dialog">
    <div class="modal-dialog">
 
     <!-- Modal content-->
     <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Books Info</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
 
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
     </div>
    </div> 
   </div>

   <br/>
   <table class="table  table-bordered table-hover">
    <tr>
     <th scope="col">Book ID</th>
     <!-- <th>Book Name</th> -->
     <!-- <th>Author</th> -->
     <th scope="col">Student ID</th>
     <!-- <th>Student Name</th> -->
     <th scope="col">More Info</th>
    </tr>
   <?php 
   $query = "select * from book";
   $result = mysqli_query($con,$query);
   while($row = mysqli_fetch_array($result)){
     $bid = $row['bid'];
    //  $bname = $row['bname'];
    //  $bauthor = $row['bauthor'];
     $sid = $row['sid'];
    //  $sname = $row['sname'];

     echo "<tr>";
     echo "<td>".$bid."</td>";
    //  echo "<td>".$bname."</td>";
    //  echo "<td>".$bauthor."</td>";
     echo "<td>".$sid."</td>";
    //  echo "<td>".$sname."</td>";
     echo "<td><button data-id='".$bid."' class='userinfo'>Info</button></td>";
     echo "</tr>";
   }
   ?>
   </table>
   </div>
   <script type="text/javascript">
     $(document).ready(function(){

      $('.userinfo').click(function(){
        
        var userid = $(this).data('id');

        // AJAX request
        $.ajax({
        url: 'ajaxfile.php',
        type: 'POST',
        data: {userid: userid},
         })
        .done(function(response){ 
          // Add response in Modal body
          $('.modal-body').html(response);

          // Display Modal
          $('#empModal').modal('show'); 
        })
    });
});

     </script> 
  
 </body>
</html>