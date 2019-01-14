<?php 
include '../functions/db.php';

		
		$search=htmlspecialchars($_POST['search'],ENT_QUOTES);
		$search=mysqli_real_escape_string($connect,$_POST['search']);
		$outputs='';

		$sql1=mysqli_query($connect, "SELECT * FROM members WHERE surname LIKE '%$search%' OR first_name LIKE '%$search%' OR middle_name  LIKE '%$search%'") or die('Unable to process request');

	$outputs.="
                                            
			<div class='portlet-body'>
                                                        <table class='table table-striped table-bordered table-hover' id='sample_2'>
                                                            <thead>
                                                                <tr>
                                                                    <th> No </th>
                                                                    <th> Surname </th>
                                                                    <th> First name </th>
                                                                    <th> Phone </th>
                                                                    <th> Email Address </th>
                                                                    <th> Action </th>
                                                                </tr>
                                                            </thead><tbody>
	";
	if(mysqli_num_rows($sql1)>0){
		$j=0;
		foreach($sql1 as $data){
			$j++;
			if($data['deleted']==0){ 
                                                             $button="<a href='../members/members.php?deactivate=$data[id]'>
                                                                                        <i class='icon-close'></i> Deactivate</a>";
                                                                                        }else{ 
                                                              $button="<a href='../members/members.php?activate=$data[id]'>
                                                                                        <i class='icon-check'></i> Activate</a>";
                                                                                        }
			$outputs .= "
				<tr>
                         <td> $j  </td>
                         <td>$data[surname] </td>
                         <td>$data[first_name]</td>
                         <td>$data[phone] </td>
                         <td>$data[email] </td>
                         <td><div class='btn-group'>
                                                                            <button class='btn btn-xs blue dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'> Actions
                                                                                <i class='fa fa-angle-down'></i>
                                                                            </button>
                                                                            <ul class='dropdown-menu' role='menu'>
                                                                                <li>
                                                                                    <a href='../members/view_member.php?view=$data[id]'>
                                                                                        <i class='icon-eye'></i> View </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href='../members/edit_member.php?edit=$data[id]'>
                                                                                        <i class='icon-note'></i> Edit </a>
                                                                                </li>
                                                                                <li>
                                                                                    $button
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                    </tr>
			";
		}
	}else {
		$outputs .= "<tr>
		<td colspan='6' width='100%' align='center'><div class='alert alert-danger'> No member With $search was found</div></td>
		</tr>";
	}
		$outputs .= "</tbody>
		                        </table>
                                        </div>
				";
			echo $outputs;

 ?>