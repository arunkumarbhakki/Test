<?php include 'header.php'; ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#conCompany").change(function(){
            jQuery.ajax({
            type: "POST",
            url: "<?=base_url()?>company/getCompanyContacts/"+$('#conCompany').val(),
            dataType:'json',						
            success: function(responseText){
                    $('#conPerson').html(responseText.selectData);
                    $("#conPerson").data("placeholder","--Select--").trigger('chosen:updated');
            }
            });
        });
        
        $("#addNewCandidate").validate({
            debug: true,
            errorElement: 'span',
            rules:
                    {
                        fName: {
                            required: true
                        },
                        lName: {
                            required: true
                        },
                        pEmail: {
                            required: true,
                            email: true
                        },
                        pPhone:  {
                         required: true,
                         isdigit:true
                         },
                         /*add1:  {
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
                         /*ssn:  {
                         required: true
                         },
                         bd:  {
                         required: true
                         },*/
                        primary_skill: {
                            required: true
                        },
                        /*detailed_skill:  {
                         required: true
                         },*/
                        wEmail: {
                            email: true
                        },
                        /*wPhone: {
                            required: true
                        },
                      conCompany:  {
                         required: true
                         },
                         conPerson:  {
                         required: true
                         },
                         empName:  {
                         required: true
                         },
                         subPosition:  {
                         required: true
                         },
                         askRate:  {
                         required: true
                         },
                         rateDuration:  {
                         required: true
                         },*/
                        available: {
                            required: true
                        },
                        availDate: {
                            required: true
                        },
                        imgStatus: {
                            required: true
                        },
                        taxterm: {
                            required: true
                        },
                        nda: {
                            required: true
                        },
                        willRelocate: {
                            required: true
                        }
                        /*posType:  {
                         required: true
                         },
                         preLocation:  {
                         required: true
                         }*/
                    },
            messages:
                    {
                        fName: {
                            required: 'Please Enter First Name'
                        },
                        lName: {
                            required: 'Please Enter Last Name'
                        },
                        pEmail: {
                            required: 'Please Enter Personal Email',
                            email: 'Please Enter valid Email'
                        },
                        pPhone: {
                            required: 'Please Enter Personal Phone Number',
                            isdigit:"Only Numbers , -,(,) are allowed"
                        },
                        add1: {
                            required: 'Please Enter Your Address'
                        },
                        city: {
                            required: 'Please Enter Your City'
                        },
                        state: {
                            required: 'Please Select Your State'
                        },
                        zip: {
                            number: 'Please Enter Numberic Values'
                        },
                        ssn: {
                            required: 'Please Enter SSN Number'
                        },
                        bd: {
                            required: 'Please Enter Your Birthdate'
                        },
                        primary_skill: {
                            required: 'Please Enter Skills details'
                        },
                        detailed_skill: {
                            required: 'Please Enter Secondary skills details'
                        },
                        wEmail: {
                            email: 'Please Enter Valid Email'
                        },
                        wPhone: {
                            required: 'Please Enter Work Phone'
                        },
                        conCompany: {
                            required: 'Please Enter Contact Company Name'
                        },
                        conPerson: {
                            required: 'Please Enter Contact Person'
                        },
                        empName: {
                            required: 'Please Enter Employer Name'
                        },
                        subPosition: {
                            required: 'Please Enter First Suitable Position'
                        },
                        askRate: {
                            required: 'Please Enter Asking Rate'
                        },
                        rateDuration: {
                            required: 'Please Enter Asking Rate Duration'
                        },
                        available: {
                            required: 'Please Enter Availability'
                        },
                        availDate: {
                            required: 'Please Enter Available date'
                        },
                        imgStatus: {
                            required: 'Please Select Immigration Status'
                        },
                        taxterm: {
                            required: 'Please Select Tax Term'
                        },
                        nda: {
                            required: 'Please Select NDA Signed'
                        },
                        willRelocate: {
                            required: 'Please Select Willing to Reloacte'
                        },
                        posType: {
                            required: 'Please Select Preferred Position Type'
                        },
                        preLocation: {
                            required: 'Please Select Preferred Location'
                        }
                    },
            errorPlacement: function(error, element) {
                if (element.attr('id') === "fName")
                {
                    error.appendTo(".fName");
                }
                else if (element.attr('id') === "lName")
                {
                    error.appendTo(".lName");
                }
                else if (element.attr('id') === "pEmail")
                {
                    error.appendTo(".pEmail");
                }
                else if (element.attr('id') === "pPhone")
                {
                    error.appendTo(".pPhone");
                }
                else if (element.attr('id') === "add1")
                {
                    error.appendTo(".add1");
                }
                else if (element.attr('id') === "add2")
                {
                    error.appendTo(".add2");
                }
                else if (element.attr('id') === "city")
                {
                    error.appendTo(".city");
                }
                else if (element.attr('id') === "state")
                {
                    error.appendTo(".state");
                }
                else if (element.attr('id') === "zip")
                {
                    error.appendTo(".zip");
                }
                else if (element.attr('id') === "ssn")
                {
                    error.appendTo(".ssn");
                }
                else if (element.attr('id') === "bd")
                {
                    error.appendTo(".bd");
                }
                else if (element.attr('id') === "primary_skill")
                {
                    error.appendTo(".primary_skill");
                }
                else if (element.attr('id') === "detailed_skill")
                {
                    error.appendTo(".detailed_skill");
                }
                else if (element.attr('id') === "wEmail")
                {
                    error.appendTo(".wEmail");
                }
                else if (element.attr('id') === "wPhone")
                {
                    error.appendTo(".wPhone");
                }
                else if (element.attr('id') === "conCompany")
                {
                    error.appendTo(".conCompany");
                }
                else if (element.attr('id') === "conPerson")
                {
                    error.appendTo(".conPerson");
                }
                else if (element.attr('id') === "empName")
                {
                    error.appendTo(".empName");
                }
                else if (element.attr('id') === "subPosition")
                {
                    error.appendTo(".subPosition");
                }
                else if (element.attr('id') === "askRate")
                {
                    error.appendTo(".askRate");
                }
                else if (element.attr('id') === "rateDuration")
                {
                    error.appendTo(".rateDuration");
                }
                else if (element.attr('id') === "available")
                {
                    error.appendTo(".available");
                }
                else if (element.attr('id') === "availDate")
                {
                    error.appendTo(".availDate");
                }
                else if (element.attr('id') === "imgStatus")
                {
                    error.appendTo(".imgStatus");
                }
                else if (element.attr('id') === "taxterm")
                {
                    error.appendTo(".taxterm");
                }
                else if (element.attr('id') === "nda")
                {
                    error.appendTo(".nda");
                }
                else if (element.attr('id') === "willRelocate")
                {
                    error.appendTo(".willRelocate");
                }
                else if (element.attr('id') === "posType")
                {
                    error.appendTo(".posType");
                }
                else if (element.attr('id') === "preLocation")
                {
                    error.appendTo(".preLocation");
                }
            },
            submitHandler: function(form)
            {
                //$('#submit').click(function() {
                $('#addCand_submit').attr("disabled", "disabled");
                $('#addCand_reset').attr("disabled", "disabled");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>candidate/saveCandidate",
                    data: $('#addNewCandidate').serialize(),
                    dataType: 'json',
                    success: function(responseText) {
                        $("#message").show(100);
                        $('#addCand_submit').removeAttr('disabled');
                        $('#addCand_reset').removeAttr('disabled');
                        if (!responseText.hasError)
                        {
                            $('#status_message').html(responseText.status);
                            $("#addNewCandidate")[0].reset();
                        }
                        else
                        {
                            $('#status_message').html(responseText.errors);
                        }
                    }
                    //  });

                });
                return false;
            }
        });
    });
</script>
<!-- App center content start -->
<div class="container main add-candidate">
    <div class="row" id="message" style="display: none">
        <div class="span12">
        <div class="alert alert-info">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong></strong> <span id="status_message"></span>
        </div>
    </div>
    </div>
    <div class="row heading">
        <div class="span12">
            <h3>Adding New Candidate:</h3>
        </div>
        <hr>
    </div>
    <form class="add-new-candidate" id="addNewCandidate"  method="POST">
        <fieldset>
            <legend><span>Personal Information</span></legend>
            <div class="row">
                <div class="span6">
                    <label for="fName">First Name<span class="required">*</span></label>
                    <input type="text" placeholder="" name="fName" id="fName">
                    <span class="b-error fName"></span>
                </div>
                <div class="span6">
                    <label for="lName">Last Name<span class="required">*</span></label>
                    <input type="text" placeholder="" name="lName" id="lName">
                    <span class="b-error lName"></span>
                </div>
            </div>
            <div class="row">
                <div class="span6">
                    <label for="pEmail">Personal Email<span class="required">*</span></label>
                    <input type="text" placeholder="" name="pEmail" id="pEmail">
                    <span class="b-error pEmail"></span>
                </div>
                <div class="span6">
                    <label for="pPhone">Personal Phone<span class="required">*</span></label>
                    <input type="tel" placeholder="" name="pPhone" id="pPhone">
                    <span class="b-error pPhone"></span>
                </div> 
            </div>
            <div class="row">
                <div class="span6">
                    <label for="add1">Address1</label>
                    <input type="text" placeholder="" name="add1" id="add1">
                    <span class="b-error add1"></span>
                </div>
                <div class="span6">
                    <label for="add2">Address2</label>
                    <input type="text" placeholder="" name="add2" id="add2">
                    <span class="b-error add2"></span>
                </div>
            </div>
            <div class="row">
                <div class="span6">
                    <label for="city">City</label>
                    <input type="text" placeholder="" name="city" id="city">
                    <span class="b-error city"></span>
                </div>
                <div class="span6">
                    <label for="state">State</label>
                    <select name="state" id="state">
                        <option>-- Select --</option>
                        <?php foreach ($state as $row) { ?>
                            <option value="<?= $row->name ?>"><?= $row->name ?></option>
                        <?php } ?>
                    </select>
                    <span class="b-error state"></span>
                </div>
            </div>
            <div class="row">
                <div class="span6">
                    <label for="zip">Zipcode</label>
                    <input type="text" placeholder="" name="zip" id="zip">
                    <span class="b-error zip"></span>
                </div>
                <!--<div class="span6">
                    <label for="state">Country</label>
                    <input type="text" placeholder="" name="state" id="state">
                </div> -->
            </div>
            <div class="row">
                <div class="span6">
                    <label for="ssn">SSN/PAN Card</label>
                    <input type="text" placeholder="" name="ssn" id="ssn">
                    <span class="b-error ssn"></span>
                </div>
                <div class="span6">
                    <label for="bd">Birth date</label>
                    <input type="date" placeholder="" name="bd" id="bd">
                    <span class="b-error bd"></span>
                </div> 
            </div>
        </fieldset>
        <fieldset>
            <legend><span>Professional Information</span></legend>
            <div class="row">
                <div class="span12">
                    <label for="">Primary Skills<span class="required">*</span></label>
                    <textarea name="primary_skill" id="primary_skill"></textarea>
                    <span class="b-error primary_skill"></span>
                </div>
            </div>
            <div class="row">
                <div class="span12">
                    <label for="">Secondary Skills</label>
                    <textarea name="detailed_skill" id="detailed_skill"></textarea>
                    <span class="b-error detailed_skill"></span>
                </div>
            </div>
            <div class="row">
                <div class="span6">
                    <label for="wEmail">Work Email</label>
                    <input type="text" placeholder="" name="wEmail" id="wEmail">
                    <span class="b-error wEmail"></span>
                </div>
                <div class="span6">
                    <label for="wPhone">Work Phone</label>
                    <input type="tel" placeholder="" name="wPhone" id="wPhone">
                    <span class="b-error wPhone"></span>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend><span>Other Information</span></legend>
            <div class="row">
                <div class="span6">
                    <label for="conCompany">Contact Company<span class="required">*</span></label>
                    <select name="conCompany" data-placeholder="Choose a Contact Company..." id="conCompany" class="chosen-select">
                        <option value=""></option>
                        <?php foreach ($companies as $row) { ?>
                            <option value="<?= $row->Company_ID ?>"><?= $row->Name ?></option>
                        <?php } ?>
                    </select>
                    <span class="b-error conCompany"></span>
                </div>
                <div class="span6">
                    <label for="conPerson">Contact Person<span class="required">*</span></label>
                    <select name="conPerson" id="conPerson" data-placeholder="Choose a Contact Person..." class="chosen-select">
                        <option value=""></option>
                    </select>
                    <span class="b-error conPerson"></span>
                </div>
            </div>
            <div class="row">
                <div class="span6">
                    <label for="empName">Employer Name</label>
                    <input type="text" placeholder="" name="empName" id="empName">
                    <span class="b-error empName"></span>
                </div>
                <div class="span6">
                    <label for="subPosition">Suitable Position</label>
                    <input type="text" placeholder="" name="subPosition" id="subPosition">
                    <span class="b-error subPosition"></span>
                </div>
            </div>
            <div class="row">
                <div class="span6">
                    <label for="askRate">Asking Rate $</label>
                    <input type="text" placeholder="" name="askRate" id="askRate">
                    <select name="rateDuration" id="rateDuration">
                        <option value="">Select</option>
                        <?php foreach ($duration as $row) { ?>
                            <option value="<?= $row->name ?>"><?= $row->name ?></option>
                        <?php } ?>
                    </select>
                    <span class="b-error rateDuration"></span>
                </div>
                <!--<div class="span6">
                    <label for="">Suitable Position</label>
                    <input type="text" placeholder="" name="subPosition" id="subPosition">
                </div> -->
            </div>
            <div class="row">
                <div class="span6">
                    <label for="available">Available<span class="required">*</span></label>
                    <select name="available" id="available">
                        <option value="">Select</option>
                        <?php foreach ($available as $row) { ?>
                            <option value="<?= $row->name ?>"><?= $row->name ?></option>
                        <?php } ?>
                    </select>
                    <span class="b-error available"></span>
                </div>
                <div class="span6">
                    <label for="availDate">Date<span class="required">*</span></label>
                    <input type="date" placeholder="" name="availDate" id="availDate">
                    <span class="b-error availDate"></span>
                </div>
            </div>
            <div class="row">
                <div class="span6">
                    <label for="imgStatus">Immigration Status<span class="required">*</span></label>
                    <select name="imgStatus" id="imgStatus">
                        <option value="">Select</option>
                        <?php foreach ($immi_status as $row) { ?>
                            <option value="<?= $row->name ?>"><?= $row->name ?></option>
                        <?php } ?>
                    </select>
                    </select>
                    <span class="b-error imgStatus"></span>
                </div>
                <div class="span6">
                    <label for="taxterm">Tax Term<span class="required">*</span></label>
                    <select name="taxterm" id="taxterm">
                        <option value="">Select</option>
                        <?php foreach ($tax_term as $row) { ?>
                            <option value="<?= $row->name ?>"><?= $row->name ?></option>
                        <?php } ?>
                    </select>
                    <span class="b-error taxterm"></span>
                </div>
            </div>
            <div class="row">
                <div class="span6">
                    <label for="nda">NDA Signed<span class="required">*</span></label>
                    <select name="nda" id="nda">
                        <option value="">Select</option>
                        <?php foreach ($nda as $row) { ?>
                            <option value="<?= $row->name ?>"><?= $row->name ?></option>
                        <?php } ?>
                    </select>
                    <span class="b-error nda"></span>
                </div>
                <div class="span6">
                    <label for="willRelocate">Willing to Relocate<span class="required">*</span></label>
                    <select name="willRelocate" id="willRelocate">
                        <option value="">Select</option>
                         <?php foreach ($relocate as $row) { ?>
                            <option value="<?= $row->name ?>"><?= $row->name ?></option>
                        <?php } ?>
                    </select>
                    <span class="b-error willRelocate"></span>
                </div>
            </div>
            <div class="row">
                <div class="span6">
                    <label for="posType">Preferred Position Type</label>
                    <select name="posType" id="posType">
                        <option value="">Select</option>
                        <?php foreach ($position_type as $row) { ?>
                            <option value="<?= $row->name ?>"><?= $row->name ?></option>
                        <?php } ?>
                    </select>
                    <span class="b-error posType"></span>
                </div>
                <div class="span6">
                    <label for="preLocation">Preferred Location</label>
                    <select name="preLocation" id="preLocation">
                        <option value="">Select</option>
                        <?php foreach ($location as $row) { ?>
                            <option value="<?= $row->name ?>"><?= $row->name ?></option>
                        <?php } ?>
                    </select>
                    <span class="b-error preLocation"></span>
                </div>
            </div>
        </fieldset>
        <div class="row">
            <div class="span12 center buttons">
                <button type="reset" class="">Reset Form</button>
                <button type="submit" class="cus-buttons">Submit New Candidate</button>
            </div>
        </div>
    </form>

</div><!-- cotainer ends -->
<?php include 'footer.php'; ?>