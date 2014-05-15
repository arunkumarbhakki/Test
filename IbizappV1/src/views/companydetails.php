<?php include 'header.php';?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#edit").click(function(){
            alert('in');
        });
    });
</script>
             <!-- App center content start -->
	        <div class="container main contact-details">
	            <div class="row heading">
                	<div class="span12">
                    	<h3>Company Details</h3>
                    </div>
                    <hr>
                </div>
                <div class="row action-buttons">
                    <div class="span2">
                    	<div  class="inner">
                            <button rel="tooltip" data-toggle="tooltip" title="Edit" class="edit" id="edit"></button
                            ><button rel="tooltip" data-toggle="tooltip" title="Delete" class="delete"></button>
                        </div>
                    </div>
                    <div class="span3">
                    	<div  class="inner">
                        	<button rel="tooltip" data-toggle="tooltip" title="Add Notes" class="add-notes"></button
                            ><button rel="tooltip" data-toggle="tooltip" title="Add Contact" class="add-contact"></button>
                        </div>
                    </div>
                </div>
                <div class="row candidate-h-info">
                	<div class="span10">
                    	<h4><?=$company_details->Name?></h4>
                        <?php
                        if($company_details->URL!=''&&$company_details->URL!='-')
                        {
                        ?>
                        <h6><a target="_blank" href="http://<?=$company_details->URL?>"><?=$company_details->URL?></a></h6>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="span2">
                    	<span class="label label-success"><?=$company_details->status?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Company Type</label>
                    </div>
                    <div class="span9">
                    	<span><?=$company_details->Company_type?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Nature of Business</label>
                    </div>
                    <div class="span9">
                    	<span><?=$company_details->Nature_Of_Business?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>NDA Signed</label>
                    </div>
                    <div class="span9">
                    	<span><?=$company_details->NDA_Signed?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Signed Date</label>
                    </div>
                    <div class="span9">
                    	<span><?=$company_details->Signed_Date?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>NDA Signed By</label>
                    </div>
                    <div class="span9">
                    	<span><?=$company_details->NDA_Signed_By?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Position Title</label>
                    </div>
                    <div class="span9">
                    	<span><?=$company_details->Position_Title?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Address</label>
                    </div>
                    <div class="span9">
                    	<span>-</span>
                    </div>
                </div>
                <br>
                <div class="row">
                	<div class="span12">
                    	<h5>Contacts</h5>
                    </div>
                </div>
                <div class="company-contacts">
                	<div>
                    	<table id="companyContatcs">
                        	<thead>
                            	<tr>
                                    <th>Name</th>
                                    <th>Phone(s)</th>
                                    <th>Email(s)</th>
                                    <th>Contact Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //print_r($contact_details);
                                //exit();
                                if($contact_details)
                                {
                                foreach ($contact_details as $value) {
                                    ?>
                                <tr>
                                    <td><?=$value->contact_name?></td>
                                    <td><b>C:</b><?=$value->cell?><br><b>W:</b> <?=$value->phone?> <br><b>H:</b><?=$value->homePhone?></td>
                                    <td><?=$value->Email1?><br><?=$value->Email2?></td>
                                    <td><?=$value->Designation?></td>
                                </tr>
                                
                                <?php
                                }
                                }else
                                {?>
                                <tr>
                                    <td colspan="4">No Contacts Available</td>
                                </tr>
                                <?php
                                
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- .contacts-ends -->
                <br>
                <div class="row">
                	<div class="span12">
                    	<h5>Notes</h5>
                    </div>
                </div>
                <div class="notes-table">
                	<div>
                    	<table id="candidatesnotes">
                        	<thead>
                            	<tr>
                                	<th>Notes Type</th>
                                    <th>Date (Time)</th>
                                    <th>Comments</th>
                                    <th>Call Status</th>
                                    <th>Time Spend</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($notes_details)
                                {
                                    foreach ($notes_details as $value) {
                                ?>
                            	<tr>
                                    <td><?=$value->note_type?></td>
                                    <td><?php echo date('d-m-y',  strtotime($value->insert_date));?></td>
                                    <td><?=$value->comments?></td>
                                    <td><?=$value->call_status?></td>
                                    <td><?=$value->time_spend?></td>
                                </tr>
                                <?php
                                    }
                                }
                                else
                                {?>
                                <tr>
                                    <td colspan="5">No Notes Available</td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- .notes-ends -->
           </div><!-- cotainer ends --> 
<?php include 'footer.php'; ?>