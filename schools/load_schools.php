<div class="page-content-inner">
                                        <div class="mt-content-body">
                                            <div class="portlet box blue">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-bar-chart"></i>Schools</div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2" width="80%">
                                                            <thead>
                                                                <tr>
                                                                    <th> No </th>
                                                                    <th> School Name </th>
                                                                    <th> Actions </th>
                                                                   <!--  <th> Phone </th>
                                                                    <th> Sex </th>
                                                                    <th> Group </th> -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
<?php 
	include '../functions/db.php';
if(isset($_POST['display'])){
                        $sql=mysqli_query($connect, "SELECT * FROM schools ORDER BY name ASC")or die('unable to process request');
                        if (!empty($sql)) {
                            $j=0;
                        foreach($sql as $data){
                            $j++;
                     ?>
                                                                <tr>
                                                                    <td> <?php echo $j ?> </td>
                                                                    <td width="40%"> <?php echo $data['name']; ?> </td>
                                                                    <td><a class="btn btn-circle btn-md green" href="school_member.php?view=<?php echo $data['id'] ?>"> <i class="icon-eye"></i> View members</a>
                                                                      <a class="btn btn-circle btn-md blue" href="edit_school.php?edit=<?php echo $data['id'] ?>"> <i class="icon-note"></i> Edit</a> </td><!-- 
                                                                    <td><?php echo $data['phone']; ?></td>
                                                                    <td><?php echo $data['gender']; ?></td>
                                                                    <td><?php echo $data['name']; ?> </td> -->
                                                                </tr><?php }} ?>

<?php exit(); }
 ?>
  </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>