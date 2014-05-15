<?php include 'header.php';?>
<script src="<?=JS_DIR?>/requirements.js"></script>
             <!-- App center content start -->
	        <div class="container main requirements">
	            <div class="row heading">
                	<div class="span8">
                    	<h3>Requirements Listing :</h3>
                    </div>
                    <!--<div class="span1">
                    	<button class="cus-buttons">S</button>
                    </div>-->
                    <div class="span4">
                    	<a href="<?=BASE_URL?>/requirements/add" class="cus-buttons"><b>+</b> Add new Requirement</a>
                    </div>
                    <hr>
                </div>
                <div class="row action-buttons">
                	
                    <div class="span2">
                    	<div  class="inner">
                             <button rel="tooltip" data-toggle="tooltip" title="Edit" class="edit"></button>
                             <button rel="tooltip" data-toggle="tooltip" title="Delete" class="delete"></button>
                        </div>
                    </div>
                    <div class="span3">
                    	<div  class="inner">
                        	<button rel="tooltip" data-toggle="tooltip" title="Submit Resume" class="submit-resume"></button
                            ><button rel="tooltip" data-toggle="tooltip" title="Add Notes" class="add-notes"></button
                            ><button rel="tooltip" data-toggle="tooltip" title="Send Email" class="send-email"></button>
                        </div>
                    </div>
                </div>
                <div  id="table-data-container">
                    <div>
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="reqListing" style="width:100%;">
                           
                        </table>
                    </div>
                </div><!-- #table-data-container ends -->
	        </div><!-- cotainer ends -->
<?php include 'footer.php'; ?>
       