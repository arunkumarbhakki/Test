<?php include 'header.php';?>
             <!-- App center content start -->
	        <div class="container main new-requirement">
	        	<div class="row heading">
                	<div class="span8">
                    	<h3>Create New Group</h3>
                    </div>
                    <!--<div class="span1">
                    	<button class="cus-buttons">S</button>
                    </div>-->
                    <hr>
                </div>
                <form class="newgroup">
	                    <div class="row">
                			<div class="span6">
                                <label for="gName">Group name<span class="required">*</span></label>
                                <input type="text" placeholder="" name="gName" id="gName">
                                <span class="help-block">Some error goes here</span>
                            </div>
                        </div>
	                    <div class="row">
                        	<div class="span12">
                            	<select multiple="multiple" class="multi-select" name="my-select[]">
                                  <option value=''>elem 1</option>
                                  <option value='elem_2'>elem 2</option>
                                  <option value='elem_3'>elem 3</option>
                                  <option value='elem_4'>elem 4</option>
                                  <option value='elem_100'>elem 100</option>
                                </select>
                            </div>
                        </div>
	                    <div class="row">
	                    	<div class="span12 center buttons">
	                    		<button class="" type="button">Cancel</button>
  								<button class="cus-buttons" type="button">Submit New Group</button>
	                    	</div>
	                    </div>
	                </form>
            </div><!-- cotainer ends -->
 <?php include 'footer.php'; ?>       