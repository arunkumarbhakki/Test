<?php include 'header.php';?>
<script src="<?=JS_DIR?>/contact.js"></script>
             <!-- App center content start -->
	        <div class="container main contacts">
	            <div class="row heading">
                	<div class="span8">
                    	<h3>Contacts Listing</h3>
                    </div>
                    <div class="span4 top-link-buttons">
                    	<a href="<?=BASE_URL?>/contacts/viewgroups" class="cus-buttons">View Groups</a>
                        <a href="<?=BASE_URL?>/contacts/add" class="cus-buttons"><b>+</b> Add New Contact</a>
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
                <div  id="table-data-container">
                    <div>
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="conListing" style="width:100%;">
                            
                        </table>
                    </div>
                </div><!-- #table-data-container ends -->
	        </div><!-- cotainer ends -->
<?php include 'footer.php'; ?>