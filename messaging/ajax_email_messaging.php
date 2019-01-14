<?php 
include '../functions/db.php';
if(isset($_POST['display'])){
		$outputs='';

		$sql1=mysqli_query($connect, "SELECT * FROM members") or die('Unable to process request');
        echo "           
                    <div class='portlet-body form'>
                        <form role='form'>
                            <div class='col-md-6'>
                                <div class='form-body'>
                                    <div class='form-group'>
                                        <label>Email Address</label>
                                        <textarea class='form-control' rows='3' name='email' id='email' style='resize: none;'>";foreach($sql1 as $no){ 
                                                                    echo $no['email'].','.' ';
                                                                } echo"</textarea>
                                    </div>
                                    <div class='form-group'>
                                        <label>Subject</label>
                                        <input type='text' class='form-control' name='subject' id='subject' placeholder='Enter Subject'>
                                    </div>
                                    <div class='form-group'>
                                        <label>Message</label>
                                        <textarea class='form-control' rows='7' name='message' id='message' style='resize: none;' placeholder='Enter Message ...'></textarea>
                                    </div>
                                        <button type='submit' id='send_email' name='send_email' class='btn blue'><i class='icon icon-paper-plane'></i> Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>   
	";
}
 ?>