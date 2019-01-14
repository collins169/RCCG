<?php 
include '../functions/db.php';
if(isset($_POST['display'])){
		$outputs='';

		$sql1=mysqli_query($connect, "SELECT * FROM amb_worker_table where deleted=0") or die('Unable to process request');
        echo "           
                    <div class='portlet-body form'>
                        <form role='form'>
                            <div class='col-md-6'>
                                <div class='form-body'>
                                    <div class='form-group'>
                                        <label>Phone Number</label>
                                        <textarea class='form-control' rows='3' name='phone' id='phone' style='resize: none;'>";foreach($sql1 as $no){ 
//                                                                    echo $no['phone'].','.' ';
        echo $no['Phone_Number'].','.' ';
                                                                } echo"</textarea>
                                    </div>
                                    <div class='form-group'>
                                        <label>Message</label>
                                        <textarea class='form-control' rows='7' name='message' id='message' style='resize: none;' placeholder='Enter Message ...' ></textarea>
                                    </div>
                                        <button type='submit' id='send_sms' name='send_sms' class='btn blue'><i class='icon icon-paper-plane'></i> Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>   
	";
}
 ?>