<?php  
 $connect = mysqli_connect("localhost", "root", "", "temp");  
 $query2="SELECT temp.nama, temp.suhu, temp.timestamp, idpegawai.nama FROM temp INNER JOIN idpegawai ON temp.nama=idpegawai.idpeg";
 $query ="SELECT * FROM temp ORDER BY ID DESC";  
 $result = mysqli_query($connect, $query2);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Histori Temperatur</title>  
           <script src="./asset/jquery.min.js"></script>  
           <link rel="stylesheet" href="./asset/bootstrap.min.css" />  
           <script src="./asset/datatables.min.js"></script>  
           <script src="./asset/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="./asset/datatables.min.css" /> 
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("images.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>		   
      </head>  
      <body>  <div class="bg">
           <br /><br />  
           <div class="container">  
                <h3 align="center" style="font-size:50px;">Temperatur</h3>  
                <br />  
				
                <div class="table-responsive">  
				
                     <table id="temp_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Nama</td>  
                                    <td>Suhu</td>  
									<td>Tanggal</td>
                                 
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["nama"].'</td>  
                                    <td>'.$row["suhu"].'</td>  
									<td>'.$row["timestamp"].'</td>  
                                 
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
		   </div>
      </body>  
	  
 </html>  
 <script>  
 $(document).ready(function(){  

		var table = $('#temp_data').DataTable();
 
      // Add event listeners to the two range filtering inputs
      $('#min').keyup( function() { table.draw(); } );
      $('#max').keyup( function() { table.draw(); } );	  
 });  
 </script>  