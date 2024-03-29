<?php include 'header.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
    
            $("#addNewCompany").validate({
                debug:true,
                errorElement:'span',
                rules:
                {
                    cname:  {
                                required: true
                            },
                    ctype:  {
                                required: true
                            },
                    cstatus:  {
                                required: true
                            },
                    /*sdate:  {
                                required: true
                            },
                    ndasign:  {
                                required: true
                            },
                    add1:  {
                                required: true
                            },
                    add2:  {
                                required: true
                            },
                    city:  {
                                required: true
                            },
                    state:  {
                                required: true
                            },*/
                    zip:  {
                                number: true
                            },
                    /*signdate:  {
                                required: true
                            },
                    ndaby:  {
                                required: true
                            },
                    ptitle:  {
                                required: true
                            },*/
                    wurl:  {
                                url: true
                            }
                },
                messages:
                {
                    cname:  {
                                required: 'Please Enter Company Name'
                            },
                    ctype:  {
                                required: 'Please Select Company Type'
                            },
                    sdate:  {
                                required: 'Please Select Nature of Business'
                            },
                    cstatus:  {
                                required: 'Please Select Company Status'
                            },
                    ndasign:  {
                                required: 'Please Select NDA signed'
                            },
                    add1:  {
                                required: 'Please Enter Address'
                            },
                    add2:  {
                                required: 'Please Enter Address'
                            },
                    city:  {
                                required: 'Please Enter City'
                            },
                    state:  {
                                required: 'Please Select State'
                            },
                    zip:  {
                                number: 'Please Enter Numeric Value'
                            },
                    signdate:  {
                                required:  'Please Enter NDA Signed date'
                            },
                    ndaby:  {
                                required: 'Please Enter NDA Signed by'
                            },
                    ptitle:  {
                                required: 'Please Enter Position Title'
                            },
                    wurl:  {
                                url: 'Please Enter Valid URL'
                            }
                },
                errorPlacement: function(error, element) {
                        if(element.attr('id') === "cname") 
                        {
                            error.appendTo(".cname");
                        } 
                        else if(element.attr('id') === "ctype") 
                        {
                            error.appendTo(".ctype");
                        }
                        else if(element.attr('id') === "sdate") 
                        {
                            error.appendTo(".sdate");
                        }
                        else if(element.attr('id') === "cstatus") 
                        {
                            error.appendTo(".cstatus");
                        }
                        else if(element.attr('id') === "ndasign") 
                        {
                            error.appendTo(".ndasign");
                        }
                        else if(element.attr('id') === "add1") 
                        {
                            error.appendTo(".add1");
                        }
                        else if(element.attr('id') === "add2") 
                        {
                            error.appendTo(".add2");
                        }
                        else if(element.attr('id') === "city") 
                        {
                            error.appendTo(".city");
                        }
                        else if(element.attr('id') === "state") 
                        {
                            error.appendTo(".state");
                        }
                        else if(element.attr('id') === "zip") 
                        {
                            error.appendTo(".zip");
                        }
                        else if(element.attr('id') === "signdate") 
                        {
                            error.appendTo(".signdate");
                        }
                        else if(element.attr('id') === "ndaby") 
                        {
                            error.appendTo(".ndaby");
                        }
                        else if(element.attr('id') === "ptitle") 
                        {
                            error.appendTo(".ptitle");
                        }
                        else if(element.attr('id') === "wurl") 
                        {
                            error.appendTo(".wurl");
                        }
//                        else {
//                            error.appendTo(".errors");
//                        }
                    },
                    submitHandler: function(form) 
                    {
                        //$('#submit').click(function() {
			$('#addcom_submit').attr("disabled", "disabled");
                        $('#addcom_reset').attr("disabled", "disabled");
                        $.ajax({  
                            type    : "POST",  
                            url     : "<?php echo base_url()?>company/saveNewCompany",  
                            data    : $('#addNewCompany').serialize(),
                            dataType:'json',
                            success : function(responseText){
                                    $("#message").show(100);
                                    $('#addcom_submit').removeAttr('disabled');
                                    $('#addcom_reset').removeAttr('disabled');
                                    if(!responseText.hasError)
                                    {
                                            $('#status_message').html(responseText.status);
                                            $("#addNewCompany")[0].reset();
                                    }
                                    else
                                    {
                                            $('#status_message').html(responseText.errors);
                                    }
                            }
                          });
						return false;
                    }
            });
        });
</script>
             <!-- App center content start -->
	        <div class="container main Candidates">
                    <div class="row" id="message" style="display: none">
                	<div class="span12">
                        <div class="alert alert-info">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong></strong> <span id="status_message"></span>
                        </div>
                    </div>
                    </div>
	        	<div class="row heading">
                	<div class="span8">
                    	<h3>Add New Company</h3>
                    </div>
                    <hr>
                </div>
               
               <div  id="table-data-container">
                	<form action='' id='addNewCompany' class="new-company" method='POST'>
	                    <div class="row">
	                    	<div class="span6">
                                    <label for="cname">Company Name <span class="required">*</span></label>
                                    <input type="text" name="cname" id="cname"/>
                                    <span class="b-error cname"></span>
	                    	</div>
	                    	<div class="span6">
                                    <label for="ctype">Company Type <span class="required">*</span></label>
                                    <select class="text" name="ctype" id="ctype">
                                        <option value="">-- Select --</option>
                                        <?php foreach($this->companyType as $row) { ?>
                                            <option value="<?=$row->name?>"><?=$row->name?></option>
                                        <?php } ?>
                                    </select>
                                    <!--<input type="text" name="ctype" id="ctype"/>-->
                                    <span class="b-error ctype"></span>
	                    	</div>
	                    </div>
	                    <div class="row">
	                    	<div class="span6">
                                    <label for="sdate">Nature of Business</label>
                                    <select class="text" name="sdate" id="sdate">
                                        <option value="">-- Select --</option>
                                        <?php foreach($this->business as $row) { ?>
                                            <option value="<?=$row->name?>"><?=$row->name?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="b-error sdate"></span>
		                </div>
                                <div class="span6">
                                    <label for="cstatus">Company Status <span class="required">*</span></label>
                                    <select class="text" name="cstatus" id="cstatus">
                                        <option value="">-- Select --</option>
                                        <?php foreach($this->company_status as $row) { ?>
                                            <option value="<?=$row->Status?>"><?=$row->Short_Name?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="b-error cstatus"></span>
                                </div>
                            </div>
		            <div class="row">
                                <div class="span6">
			        <label for="ndasign">NDA Signed</label>
                                 <select class="text" name="ndasign" id="ndasign">
                                        <option value="">-- Select --</option>
                                        <?php foreach($this->ndasigned as $row) { ?>
                                            <option value="<?=$row->name?>"><?=$row->name?></option>
                                        <?php } ?>
                                    </select>
                                <span class="b-error ndasign"></span>
                                </div>
                            <div class="span6"> 
                                <label for="signdate">Signed Date</label>
			        <input type="date" name="signdate" id="signdate"/>
                                <span class="b-error signdate"></span>
                            </div>
                        </div>
		        <div class="row">
                            <div class="span6">
                                <label for="ndaby">NDA Signed By</label>
                                <input type="text" name="ndaby" id="ndaby"/>
                                <span class="b-error ndaby"></span>
		            </div>
		            <div class="span6">
                                <label for="ptitle">Position Title</label>
		                <input type="text" name="ptitle" id="ptitle" />
                                <span class="b-error ptitle"></span>
                            </div>
                        </div>
		        <div class="row">
                            <div class="span6">
                                <label for="add1">Address1</label>
		                <input type="text" name="add1" id="add1" />
                                <span class="b-error add1"></span>
                            </div>
                            <div class="span6">
                                <label for="add2">Address2</label>
		                <input type="text" name="add2" id="add2"/>
                                <span class="b-error add2"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span6">
                                <label for="city">City</label>
		                <input type="text" name="city" id="city"/>
                                <span class="b-error city"></span>
                            </div>
		            <div class="span6">
                                <label for="state">State</label>
		                <select class="text" name="state" id="state">
                                    <option value="">-- Select --</option>
                                    <?php foreach($this->statesAbbr as $row) { ?>
                                    <option value="<?=$row->id?>"><?=$row->name?></option>
                                    <?php } ?>
				</select>
                                <span class="b-error state"></span>
                            </div>
                        </div>
		        <div class="row">
                            <div class="span6">
                                <label for="zip">Zipcode</label>
		                <input type="text" name="zip" id="zip"/>
                                <span class="b-error zip"></span>
                            </div>
		            <div class="span6">
                                <label for="wurl">Website URL</label>
		                <input type="text" name="wurl" id="wurl"/>
                                <span class="b-error wurl"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span12 center buttons" >
                                <button class="" id="addcom_reset" type="reset">Reset</button>
                                <button class="cus-buttons" id="addcom_submit" type="submit">Submit New Company</button>
                            </div>
                        </div>
                    </form>
                </div><!-- #table-data-container ends -->
	        </div><!-- cotainer ends -->
         </div><!-- .app-main ends -->
<?php include 'footer.php'; ?>
        