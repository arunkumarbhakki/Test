<?php include 'header.php';?>
             <!-- App center content start -->
	        <div class="container main candidates-details">
	            <div class="row heading">
                	<div class="span12">
                    	<h3>Requirement Details:</h3>
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
                        	<button rel="tooltip" data-toggle="tooltip" title="Submit Resume" class="submit-resume"></button>
                                <button type="button" rel="tooltip" data-toggle="tooltip" title="Add Notes" class="add-notes activate-model" data-target="addNotes"></button>
                            <button rel="tooltip" data-toggle="tooltip" title="Send Email" class="send-email"></button>
                        </div>
                    </div>
                </div>
                <div class="row candidate-h-info">
                	<div class="span10">
                    	<h4><?=$requirement_details->Position_title?></h4>
                    </div>
                    <div class="span2">
                    	<span class="label label-success"><?=$requirement_details->status?></span>
                    </div>
                    <hr>
                </div>
               <!-- <div class="row">
                	<div class="span3">
                    	<label>Requirement ID</label>
                    </div>
                    <div class="span9">
                    	<span>4742</span>
                    </div>
                </div>-->
                <div class="row">
                	<div class="span3">
                    	<label>Position ID</label>
                    </div>
                    <div class="span9">
                    	<span><?=$requirement_details->Position_ID?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Start Date</label>
                    </div>
                    <div class="span9">
                        <span>
                            <?php
                                if($requirement_details->Start_Date!='--')
                                {
                                    echo date('d-m-Y',  strtotime($requirement_details->Start_Date));
                                }
                                else
                                {
                                    echo '--';
                                }
                            ?>
                        </span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Close Date</label>
                    </div>
                    <div class="span9">
                    	<span><?php
                                if($requirement_details->Close_Date!='--')
                                {
                                    echo date('d-m-Y',  strtotime($requirement_details->Close_Date));
                                }
                                else
                                {
                                    echo '--';
                                }
                            ?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Position Description</label>
                    </div>
                    <div class="span9">
                    	<?=$requirement_details->Requirement_Detail?>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Skills</label>
                    </div>
                    <div class="span9">
                    	<?=$requirement_details->Skills?>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Duration</label>
                    </div>
                    <div class="span9">
                    	<span><?=$requirement_details->to_time_frame?> - <?=$requirement_details->from_time_frame?> <?=$requirement_details->time_frame_desc?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Billing Rate $</label>
                    </div>
                    <div class="span9">
                    	<span><?=$requirement_details->billing_rate?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Tax Term</label>
                    </div>
                    <div class="span9">
                    	<span><?=$requirement_details->Tax_Term?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Location</label>
                    </div>
                    <div class="span9">
                    	<span><?=$requirement_details->Location?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Source</label>
                    </div>
                    <div class="span9">
                    	<span><?=$requirement_details->Source?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>End Client Name</label>
                    </div>
                    <div class="span9">
                    	<span><?=$requirement_details->End_Client_Name?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Contact Person</label>
                    </div>
                    <div class="span9">
                    	<span><?=$requirement_details->contact_name?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Contact Phone</label>
                    </div>
                    <div class="span9">
                    	<span><?=$requirement_details->Work_Phone?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Contact Email</label>
                    </div>
                    <div class="span9">
                    	<span><?=$requirement_details->Email1?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Priority</label>
                    </div>
                    <div class="span9">
                    	<span><?=$requirement_details->priority?></span>
                    </div>
                </div>
                <br>
                <div class="row">
                	<div class="span12">
                    	<h5>Resumes</h5>
                    </div>
                </div>
                <div class="resume-table">
                	<div>
                    	<table id="candidatesResumes">
                        	<thead>
                            	<tr>
                                    <th>Candidate Name</th>
                                    <th>Contact No</th>
                                    <th>Submitted By</th>
                                    <th>Submitted To</th>
                                    <th>Submitted Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($submited_candidates)
                                {
                                    foreach ($submited_candidates as $value)
                                    {
                                ?>
                            	<tr>
                                    <td><?=$value->cand_name?></td>
                                    <td>C : <?=$value->cell?><br>W : <?=$value->phone?><br>H : <?=$value->homePhone?></td>
                                    <td><?=$value->rec_name?></td>
                                    <td><?=$value->comp_name?></td>
                                    <td><?php
                                    if($value->Submitted_Date=='')
                                    {
                                        echo date('d-m-y',strtotime($value->Submitted_Date));
                                    }
                                    else
                                    {
                                        echo '--';
                                    }
                                    ?></td>
                                    <td><?=$value->status?></td>
                                </tr>
                                <?php
                                    }
                                }
                                else {
                                ?>
                                <tr>
                                    <td colspan="6">No Submitted Candidates Available</td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- .resume-ends -->
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
            
        <div class="modal-container">
        	<div id="addNotes" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="addNotes" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3>Add Notes for <span>Oracle DBA</span></h3>
              </div>
              <div class="modal-body">
                <form>
                	<div>
                    	<label>Notes</label>
                        <textarea></textarea>
                    </div>
                    <div>
                    	<label>Notes type</label>
                        <div>
                        	<label class="radio">
                              <input type="radio" name="notesType" id="general" value="general" >
                              General
                            </label>
                            <label class="radio">
                              <input type="radio" name="notesType" id="call" value="call" >
                              Call
                            </label>
                        </div>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button class="cus-buttons pad-five">Save notes</button>
              </div>
            </div><!-- end of  id="addNotes" -->
        </div>
<?php include 'footer.php'; ?>