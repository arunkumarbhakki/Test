<?php include 'header.php';?>
<script src="<?=JS_DIR?>/company.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#edit").click(function(){
            if($('input[name=select]').is(':checked')) 
            { 
                window.location.href = absolute+"company/editCompanies/"+$('input[name=select]:checked').val();
            }
            else
            {
                alert("Please select atleast one Record");
            }
        });
    });
</script>
             <!-- App center content start -->
	        <div class="container main Candidates">
	            <div class="row heading">
                	<div class="span8">
                    	<h3>Companies Listing</h3>
                    </div>
                    <!--<div class="span1">
                    	<button class="cus-buttons">S</button>
                    </div>-->
                    <div class="span4">
                    	<a href="<?=BASE_URL?>/company/add" class="cus-buttons"><b>+</b> Add New Company</a>
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
                <div  id="table-data-container">
                    <div>
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="compListing" style="width:100%;">
                           
                        </table>
                    </div>
                </div><!-- #table-data-container ends -->
	        </div><!-- cotainer ends -->
<?php include 'footer.php'; ?>  
        