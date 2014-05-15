$(function(){
	$("#candListing").dataTable({
	"bProcessing": true,
        "bServerSide": true,
        "bRetrieve":false,
        "bDestroy":true,
        "sAjaxSource": absolute+'candidate/getCandidateGridList?aColumns[0]=Candidate_Id&aColumns[1]=Name&aColumns[2]=primary_skill&aColumns[3]=contact_no&aColumns[4]=email&aColumns[5]=Location&aColumns[6]=Status&sIndexColumn=Candidate_Id',
        "aoColumns": [
        {
            "mDataProp": "Candidate_Id",
            "sTitle": "",
            "bSortable": false,
            "mRender": function ( url, type, full )  {
                return  '<input type="radio" name="select" value="'+full.Candidate_Id+'">';}
	},
	{
            "mDataProp": "Name",
            "sTitle": "Candidate Name",
            "mRender": function ( url, type, full )  {
            return  '<a href="'+absolute+'candidate/details/'+full.Candidate_Id+'">' + url + '</a>';},
	},
        {
            "mDataProp": "primary_skill",
            "sTitle": "Skills"
	},
        {
            "mDataProp": "contact_no",
            "sTitle": "Contact No"
	},
        {
            "mDataProp": "email",
            "sTitle": "Email"
	},
        {
            "mDataProp": "Location",
            "sTitle": "Location"
	},
	{
            "mDataProp": "Status",
            "sTitle": "Status"
	}]
	});
  })
