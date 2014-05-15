<?php include 'header.php';?>
             <!-- App center content start -->
	        <div class="container main contact-details">
	            <div class="row heading">
                	<div class="span12">
                    	<h3>Contact Details</h3>
                    </div>
                    <hr>
                </div>
                <div class="row action-buttons">
                    <div class="span2">
                    	<div  class="inner">
                        	<button rel="tooltip" data-toggle="tooltip" title="Edit" class="edit"></button
                            ><button rel="tooltip" data-toggle="tooltip" title="Delete" class="delete"></button>
                        </div>
                    </div>
                    <div class="span3">
                    	<div  class="inner">
                        	<button rel="tooltip" data-toggle="tooltip" title="Add Notes" class="add-notes"></button>
                        </div>
                    </div>
                </div>
                <div class="row candidate-h-info">
                	<div class="span10">
                    	<h4><?=$contact_details->Name?></h4>
                    	<h6><span class="email"><?=$contact_details->Email?></span></h6>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Contact Type</label>
                    </div>
                    <div class="span9">
                    	<span><?=$contact_details->Designation?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Referred By</label>
                    </div>
                    <div class="span9">
                    	<span><?=$contact_details->Referred_By?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Phone(s)</label>
                    </div>
                    <div class="span9">
                    	<span><b>C:</b><?=$contact_details->cell?></span><br>
                        <span><b>W:</b><?=$contact_details->phone?></span><br>
                        <span><b>H:</b><?=$contact_details->homePhone?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>E-mail(s)</label>
                    </div>
                    <div class="span9">
                    	<span><?=$contact_details->Email?></span>
                    </div>
                </div>
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
                <br>
           </div><!-- cotainer ends --> 
<?php include 'footer.php'; ?>