<?php include 'header.php';?>
             <!-- App center content start -->
	        <div class="container main contacts groups">
	            <div class="row heading">
                	<div class="span8">
                    	<h3>Contact Groups</h3>
                    </div>
                    <div class="span4 top-link-buttons">
                    	<a href="<?=BASE_URL?>/contacts/addgroups" class="cus-buttons"><b>+</b> Create New Group</a>
                    </div>
                    <hr>
                </div>
                <div class="row action-buttons">
                	<!--<div class="span1">
                    	<div class="inner">
                        	<label><input type="checkbox" id="selectAll"> All</label>
                        </div>
                    </div>-->
                    <div class="span2">
                    	<div  class="inner">
                        	<button rel="tooltip" data-toggle="tooltip" title="Edit" class="edit"></button
                            ><button rel="tooltip" data-toggle="tooltip" title="Delete" class="delete"></button>
                        </div>
                    </div>
                    <!--<div class="span3">
                    	<div  class="inner">
                        	<button rel="tooltip" data-toggle="tooltip" title="Add Notes" class="add-notes"></button>
                        </div>
                    </div>-->
                </div>
                <div class="group-list-container">
                	<div class="row">
                    	<div class="span4">
                        	<h4>Group List</h4>
                            <ul class="groups">
                            	<li>
                                	<div>Mindpro Technologies</div>
                                </li>
                                <li class="current">
                                	<div>AC Infotech</div>
                                </li>
                                <li>
                                	<div>Matrix</div>
                                </li>
                                <li>
                                	<div>Development Team</div>
                                </li>
                            </ul>
                        </div>
                        <div class="span8">
                        	<h4><span>AC Infotech</span> Group Details</h4>
                            <ul>
                            	<li>
                                	<div>Anand@acinfotech.com</div>
                                </li>
                                <li>
                                	<div>anupkumars@acinfotech.com</div>
                                </li>
                                <li>
                                	<div>sathishkumar@acinfotech.com</div>
                                </li>
                                <li>
                                	<div>naveenkumar@acinfotech.com</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
	        </div><!-- cotainer ends -->
<?php include 'footer.php'; ?>