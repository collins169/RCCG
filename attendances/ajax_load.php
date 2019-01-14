<?php
//continue only if $_POST is set and it is a Ajax request
if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	
	include '../functions/db.php';  //include config file
	//Get page number from Ajax POST
	if(isset($_POST["page"])){
		$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
		if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
	}else{
		$page_number = 1; //if there's no page number, set it to 1
	}
	
	//get total number of records from database for pagination
	$results=mysqli_query($connect, "SELECT COUNT(*) FROM members");
	$get_total_rows = $results->fetch_row(); //hold total records in variable
	//break records into pages
	$total_pages = ceil($get_total_rows[0]/$item_per_page);
	
	//get starting position to fetch the records
	$page_position = (($page_number-1) * $item_per_page);
	
?> 
		<div class="form-group pull-right">
	    	<input type="text" name="search" id="search" placeholder="search" class="search form-control" autocomplete="off">
		</div>
        <br>
        <br>
        <br>
	<div class="page-content-inner">
    <div class="mt-content-body">
        <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bar-chart"></i> New Attendances for <?php echo date('d M, Y', time()); ?></div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                	<div class="table-repsonsive">
                    <table class="table table-striped table-bordered table-hover results" id="sample_2">
                        <thead>
                            <tr>
                                <!-- <th> No </th> -->
                                <th> Surname </th>
                                <th> First name </th>
                                <!-- <th> Phone </th>
-->                             <th> Early Rain Service </th>
                                <th> Latter Rain Service </th>
                            </tr>
                        </thead>
                        <tbody>
            <?php 
             $sql=mysqli_query($connect, "SELECT * FROM members WHERE deleted=0 ORDER BY surname ASC LIMIT $page_position, $item_per_page") or die("Unable to Process request");
                     if(!empty($sql)){
                        $j=0;
                        foreach($sql as $data){
                            $j++;
            ?>
                            <tr>
                                <!-- <td> <?php echo $data['id'] ?> </td> -->
                                <td> <?php echo $data['surname']; ?> </td>
                                <td> <?php echo $data['first_name']; ?> </td>
                                <!-- <td> <?php echo $data['phone']; ?> </td> -->
                                <td> 
						<?php 
						$sql=mysqli_query($connect, "SELECT * FROM attendances WHERE members_id='$data[id]' AND attendance='Early rain' AND marked=1") or die("Unable to process request");
						    $check=mysqli_fetch_assoc($sql);
						    $mark=$check['marked'];
						    if(mysqli_num_rows($sql)==1){
						 ?>
                                    <div class="btn-group">
                                        <a class="btn btn-xs red" disabled="disabled"> Marked</a>
                                    </div>  
							<?php }elseif(!empty($sql)){?>
                            <div class="btn-group">
                                <a class="btn btn-xs blue" id="btn-early<?php echo $data['id'] ?>" href="javascript:void(0)"  onclick="earlyRain('<?php echo $data['id'] ?>')"><i class="icon-check"></i> PRESENT</a>
                            </div> 
    							<?php }else{echo "Marked";} ?>

                                </td>
                                 <td> 
			    <?php 
			    $sql=mysqli_query($connect, "SELECT * FROM attendances WHERE members_id='$data[id]' AND attendance='Latter rain' AND marked=1") or die("Unable to process request");
			        $check=mysqli_fetch_assoc($sql);
			        $mark=$check['marked'];
			        if(mysqli_num_rows($sql)==1){
			    ?>
                            <div class="btn-group">
                                <a class="btn btn-xs red" disabled="disabled"> Marked</a>
                            </div> 
								 <?php }elseif(!empty($sql)){?>
                            <div class="btn-group">
                                <a class="btn btn-xs blue" id="btn-latter<?php echo $data['id'] ?>" href="javascript:void(0)"  onclick="latterRain('<?php echo $data['id'] ?>')">
                                    <i class="icon-check"></i> PRESENT</a>
                            </div> 
    						<?php }else{echo "Marked";} ?>

                                </td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
						<!-- Script -->
				<script type='text/javascript'>
				 $(document).ready(function(){
				  $('#search').keyup(function(){
				   // Search Text
				   var search = $(this).val();

				   // Hide all table tbody rows
				   $('table tbody tr').hide();

				  // Searching text in columns and show match row
				  $('table tbody tr td:contains("'+search+'")').each(function(){
				   $(this).closest('tr').show();
				  });
				 
				 });
				 
				});

				// Case-insensitive searching (Note - remove the below script for Case sensitive search )
				$.expr[":"].contains = $.expr.createPseudo(function(arg) {
				 return function( elem ) {
				  return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
				 };
				});
				</script>
<?php
	echo '<center> <div class="container">';
	/* We call the pagination function here to generate Pagination link for us. 
	As you can see I have passed several parameters to the function. */
	echo paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
	echo '</div></center>';
	
	exit;
}
################ pagination function #########################################
function paginate_function($item_per_page, $current_page, $total_records, $total_pages)
{
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="pagination">';
        
        $right_links    = $current_page + 4; 
        $previous       = $current_page - 1; //previous link 
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        
        if($current_page > 1){
			$previous_link = ($previous==0)? 1: $previous;
            $pagination .= '<li><a href="#" data-page="1" title="First">«</a></li>'; //first link
            $pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
                    }
                }   
            $first_link = false; //set first link to false
        }
        
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="active"><a href="#" data-page="'.$current_page.'">'.$current_page.'</a></li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="active"><a href="#" data-page="'.$current_page.'">'.$current_page.'</a></li>';
        }else{ //regular current link
            $pagination .= '<li class="active"><a href="#" data-page="'.$current_page.'">'.$current_page.'</a></li>';
        }
                
        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){ 
				$next_link = ($i > $total_pages) ? $total_pages : $i;
                $pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
                $pagination .= '<li class="last"><a href="#" data-page="'.$total_pages.'" title="Last">»</a></li>'; //last link
        }
        
        $pagination .= '</ul>'; 
    }
    return $pagination; //return pagination links
}

?>
                    </div>
                </div>
        </div>
    </div>


