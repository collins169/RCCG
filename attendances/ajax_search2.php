<!-- BEGIN PAGE CONTENT INNER -->
<?php include '../functions/db.php'; ?>
                                    <div class="page-content-inner">
                                        <div class="mt-content-body">
                                            <div class="portlet box blue">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-bar-chart"></i> New Attendances for <?php echo date('d M, Y', time()); ?></div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th> No </th>
                                                                    <th> Surname </th>
                                                                    <th> First name </th>
                                                                    <th> Phone </th>
                                                                    <th> Early Rain Service </th>
                                                                    <th> Latter Rain Service </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
            <?php 
                $search=htmlspecialchars($_POST['search'],ENT_QUOTES);
        $search=mysqli_real_escape_string($connect,$_POST['search']);
             $sql=mysqli_query($connect, "SELECT * FROM members WHERE surname LIKE '%$search%' OR first_name LIKE '%$search%' OR middle_name  LIKE '%$search%' AND  deleted=0") or die("Unable to Process request");
                     if(!empty($sql)){
                        $j=0;
                        foreach($sql as $data){
                            $j++;
            ?>
                                                                <tr>
                                                                    <td> <?php echo $j ?> </td>
                                                                    <td> <?php echo $data['surname']; ?> </td>
                                                                    <td> <?php echo $data['first_name']; ?> </td>
                                                                    <td> <?php echo $data['phone']; ?> </td>
                                                                    <td> 
                                <?php 
                                $sql=mysqli_query($connect, "SELECT * FROM attendances WHERE members_id='$data[id]' AND attendance='Early rain' AND marked=1") or die("Unable to process request");
                                    $check=mysqli_fetch_assoc($sql);
                                    $mark=$check['marked'];
                                    if(mysqli_num_rows($sql)==1){
                                 ?>
                                                                        <div class="btn-group">
                                                                                    <a class="btn btn-xs red"
                                                                                        <i class="icon-check"></i> Marked</a>
                                                                        </div> 
                                    <?php }elseif(!empty($sql)){?>
                                                                <div class="btn-group">
                                                                                    <a class="btn btn-xs blue" href="javascript:void(0)"  onclick="earlyRain('<?php echo $data['id'] ?>')">
                                                                                        <i class="icon-check"></i> PRESENT</a>
                                                                        </div> 
                                        <?php }else{echo "Marked";} ?>

                                                                    </td>
                                                                     <td> <?php 
                                $sql=mysqli_query($connect, "SELECT * FROM attendances WHERE members_id='$data[id]' AND attendance='Latter rain' AND marked=1") or die("Unable to process request");
                                    $check=mysqli_fetch_assoc($sql);
                                    $mark=$check['marked'];
                                    if(mysqli_num_rows($sql)==1){
                                 ?>
                                                                        <div class="btn-group">
                                                                                    <a class="btn btn-xs red"
                                                                                        <i class="icon-check"></i> Marked</a>
                                                                        </div> 
                                    <?php }elseif(!empty($sql)){?>
                                                                <div class="btn-group">
                                                                                    <a class="btn btn-xs blue" href="javascript:void(0)"  onclick="latterRain('<?php echo $data['id'] ?>')">
                                                                                        <i class="icon-check"></i> PRESENT</a>
                                                                        </div> 
                                        <?php }else{echo "Marked";} ?>

                                                                    </td>
                                                                </tr>
                                                                <?php }}else{ ?>
                                                                <td colspan="5">No data found</td>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <!-- END PAGE CONTENT INNER -->