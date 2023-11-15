<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=quickalldata.xls");
?>

<html>
    
<body>
<h2><center>Data Tiket Bulan <?php echo $bulan; ?>... </center></h2>

<table border="1" cellpadding="5">
	<tr>
		<th>No</th>
	    <th>Create Date</th>
        <th>Request Name</th>
                              <th>Assigned to</th>
                              <th>Title</th>
                              <th>Priorty</th>
                              <th>Status</th>
	</tr>

   		<?php
                 $no=0;    
                        foreach($tiket->result_array() as $a){
                           
                            $id=$a['id'];
                            $usercrt=$a['usernamecrt'];
                            $usernameext=$a['usernameexecutor'];
                            $title=$a['title'];
                            $priority=$a['priority'];
                            $status=$a['status'];
                            $date=$a['date_created'];
                            $no++;
                    ?>
		<tr>
		    	<td><?php echo $no;?></td>
	    <td><?php echo $date;?></td>
                  <td><?php echo $usercrt;?></td>
                  <td><?php echo $usernameext;?></td>
                  <td><?php echo $title;?></td>
	    <td><?php echo $priority; ?></td>
	    <td><?php if ($status == 1){ 
                              echo "<h4>Waiting ACC</h4>";
                            }else if ($status == 2){
                              echo "<h4>On Progress</h4>";
                            }else if ($status == 3){
                              echo "<h4>FINISH</h4>";
                            }else if ($status == 4){
                              echo "<h4>Hold</h4>";
                            }else if ($status == 5){
                              echo "<h4>Cancel</h4>";
                            }
                              ?></td>
	    
		</tr>
		<?php
                                          };
		?>


</table>
</body>
</html>
