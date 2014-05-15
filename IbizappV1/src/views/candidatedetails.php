<?php include 'header.php';?>
             <!-- App center content start -->
	        <div class="container main candidates-details">
	            <div class="row heading">
                	<div class="span12">
                    	<h3>Candidate Details:</h3>
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
                        	<button type="button" rel="tooltip" data-toggle="tooltip" title="Upload Resume" class="upload-resume"></button
                            ><button type="button" rel="tooltip" data-toggle="tooltip" title="Add Notes" class="add-notes activate-model" data-target="addNotes"></button
                            ><button type="button" rel="tooltip" data-toggle="tooltip" title="Add Reference" class="add-reference activate-model" data-target="addReference"></button>
                        </div>
                        <!--<button type="button" data-toggle="modal" data-target="#addNotes">test</button>-->
                    </div>
                </div>
                <div class="row candidate-h-info">
                    <div class="span10">
                    	<h4><?=$candidate_details->First_Name.' '.$candidate_details->Last_Name?></h4>
                    	<h6><span class="contact-no"><?=$address_details->Work_Phone?></span><span class="email"><?=$candidate_details->Email1?></span></h6>
                    </div>
                    <div class="span2">
                    	<span class="label label-success"><?=$candidate_details->Status?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="span12">
                    	<h5>Personal Information</h5>
                    </div>
                </div>
                <!--<div class="row">
                    <div class="span3">
                    	<label>Candidate ID</label>
                    </div>
                    <div class="span9">
                    	<span>4742</span>
                    </div>
                </div>-->
                <div class="row">
                    <div class="span3">
                    	<label>Address</label>
                    </div>
                    <div class="span9">
                    	<span>
                        <?php
                        $address='';
                            if($address_details->Address_1!='-'&&($address_details->Address_1))
                                $address.=$address_details->Address_1.'<br>';
                            if($address_details->Address_2!='-'&&($address_details->Address_2))
                                $address.=$address_details->Address_2.'<br>';
                            if($address_details->City!='-'&&($address_details->City))
                                $address.=$address_details->City.'<br>';
                            if($address_details->State!='-'&&($address_details->State))
                                $address.=$address_details->State.'<br>';
                            
                            echo $address;
                        ?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span12">
                    	<h5>Professional Information</h5>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Work email</label>
                    </div>
                    <div class="span9">
                    	<span><?=$candidate_details->Email1?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Work phone</label>
                    </div>
                    <div class="span9">
                    	<span><?=$address_details->Work_Phone?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Primary Skills</label>
                    </div>
                    <div class="span9">
                    	<span><?=$candidate_details->primary_skill?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Secondary Skills</label>
                    </div>
                    <div class="span9">
                    	<span><?=$candidate_details->detailed_skill?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span12">
                    	<h5>Other Information</h5>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Willing to relocate</label>
                    </div>
                    <div class="span9">
                    	<span><?=$candidate_details->relocate?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Preferred Locations</label>
                    </div>
                    <div class="span9">
                    	<span><?=$candidate_details->location?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="span3">
                    	<label>Suitable Position</label>
                    </div>
                    <div class="span9">
                    	<span><?=$candidate_details->Suitable_Position?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Preferred Position Type</label>
                    </div>
                    <div class="span9">
                    	<span><?=$candidate_details->position_type?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Contact Company</label>
                    </div>
                    <div class="span9">
                    	<span><?=$candidate_details->com_name?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="span3">
                    	<label>Contact Person</label>
                    </div>
                    <div class="span9">
                    	<span><?=$candidate_details->contact_name?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Employer Name</label>
                    </div>
                    <div class="span9">
                    	<span><?=$candidate_details->Employer_Name?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Asking Rate</label>
                    </div>
                    <div class="span9">
                    	<span><?=$candidate_details->Asking_rate?> <?=$candidate_details->duration?></span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Available Date</label>
                    </div>
                    <div class="span9">
                        <span>
                            <?php
                            if($candidate_details->available_date=='-'||$candidate_details->available_date==''||$candidate_details->available_date=='0000-00-00'||(!$candidate_details->available_date))
                            {
                                echo '-';
                            }
                            else
                            {
                                echo date('d-m-Y',  strtotime($candidate_details->available_date));
                            }
                            ?>
                        </span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>Status (Tax Term)</label>
                    </div>
                    <div class="span9">
                    	<span><?=$candidate_details->immi_status?> (<?=$candidate_details->Tax_Term?>)</span>
                    </div>
                </div>
                <div class="row">
                	<div class="span3">
                    	<label>NDA Signed</label>
                    </div>
                    <div class="span9">
                    	<span><?=$candidate_details->NDA_Signed?></span>
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
                                    <th>File Description</th>
                                    <th>File Name</th>
                                    <th>Uploaded Date</th>
                                    <th>Uploaded By</th>
                                    <th>Submitted To</th>
                                    <th>Submitted By</th>
                                    <th>Submitted Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($resume_details)
                                {
                                    foreach($resume_details as $value)
                                    {
                                ?>
                            	<tr>
                                    <td><?=$value->filedescription?></td>
                                    <td><a href="#"><?=$value->file_name?></a></td>
                                    <td><?php
                                    if($value->upload_date=='-'||$value->upload_date==''||$value->upload_date=='0000-00-00'||(!$value->upload_date))
                                    {
                                        echo '-';
                                    }
                                    else
                                    {
                                        echo date('d-m-Y',  strtotime($value->upload_date));
                                    }
                                    ?>
                                    </td>
                                    <td><?=$value->First_Name?></td>
                                    <td><?=$value->company_name?></td>
                                    <td><?=$value->submitted_by?></td>
                                    <td>
                                    <?php
                                    if($value->Submitted_Date=='--'||$value->Submitted_Date==''||$value->Submitted_Date=='0000-00-00'||(!$value->Submitted_Date))
                                    {
                                        echo '--';
                                    }
                                    else
                                    {
                                        echo date('d-m-Y',  strtotime($value->Submitted_Date));
                                    }
                                    ?>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }else{
                                ?>  
                                <tr>
                                    <td colspan="7">No Resumes Available For this Candidate</td>
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
                <br>
                <div class="row">
                	<div class="span12">
                    	<h5>References</h5>
                    </div>
                </div>
                <div class="reference-table">
                	<div>
                    	<table id="candidatesreferences">
                        	<thead>
                            	<tr>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Title</th>
                                    <th>Referred BY</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<tr>
                                    <td colspan="6">No References Found</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!-- .reference-ends -->
            </div><!-- cotainer ends --> 
             <div class="modal-container">
        	<div id="addNotes" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="addNotes" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3>Add Notes for <span>Sabarish</span></h3>
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
            <div id="addReference" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="addReference" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3>Add Reference for <span>Sabarish</span></h3>
              </div>
              <div class="modal-body">
                <form id="searchCompany">
                	<div class="input-append">
                      <label for="comSearch">Company Search</label>
                      <input class="span4" id="comSearch" type="text" placeholder="please enter company name to search...">
                      <button class="btn cus-buttons" type="button">Search</button>
                    </div>
                </form>
                <div id="searchResult">
                	<h4>Search Result</h4>
                    <ul>
                    	<li>
                        	<div>
                            	<p>
                                	<a href="#">Ac Infotech</a><span class="label label-success pull-right">Active</span><br>
                               		<span>Supplier</span><span class="nda">NDA-No</span>
                                </p>
                            </div>
                        </li>
                        <li>
                        	<div>
                            	<p>
                                	<a href="#">Mindpro Technologies Pvt Ltd</a><span class="label label-success pull-right">Active</span><br>
                               		<span>Supplier</span><span class="nda">NDA-Yes</span>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="create-new-company-container">
                	<form id="createNewCompany">
                    	<fieldset>
                        <legend>Add New Company</legend>
                    	<div class="input-append">
                          <label for="">Company Name<span class="required">*</span></label>
                          <input class="span4" id="comSearch" type="text" placeholder="">
                        </div>
                        <div class="input-append">
                          <label for="">Company Status<span class="required">*</span></label>
                          <select name="status">	
							<option value="1" selected="">Active</option>
                            <option value="3">Deleted</option>
                            <option value="2">Inactive</option>
                            <option value="4">Banned</option>
                            <option value="5">Unreviewed</option>
                          </select>
                        </div>
                        <div class="input-append">
                          <label for="">NDA Signed<span class="required">*</span></label>
                          <select name="status">	
							<option>Yes</option>
                            <option>No</option>
                          </select>
                        </div>
                        <div class="input-append center">
                        	<button type="button" class="cancel">Cancel</button>
                        	<button type="submit" class="cus-buttons">Submit New Company</button>
                        </div>
                        </fieldset>
                    </form>
                </div>
              </div>
              <div class="modal-footer">
                	<p>Company is not in the list/Search result, <button class="cus-buttons l-create-new-company">Create New Company</button></p>
               </div>
            </div><!-- end of  id="addReference" -->
        </div>
<?php include 'footer.php'; ?>