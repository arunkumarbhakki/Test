$(function(){
	$("#reqListing").dataTable({
	"bProcessing": true,
        "bServerSide": true,
        "bRetrieve":false,
        "bDestroy":true,
        "sAjaxSource": absolute+'requirements/getRequirementGridDetails?aColumns[0]=requirement_id&aColumns[1]=Position_title&aColumns[2]=Skills&aColumns[3]=Location&aColumns[4]=Contact&aColumns[5]=Recruiter&aColumns[6]=Status&sIndexColumn=requirement_id',
        "aoColumns": [
        {
            "mDataProp": "requirement_id",
            "sTitle": "",
            "bSortable": false,
            "mRender": function ( url, type, full )  {
                return  '<input type="radio" name="select" value="'+full.requirement_id+'">';}
	},
	{
            "mDataProp": "Position_title",
            "sTitle": "Position",
            "mRender": function ( url, type, full )  {
            return  '<a href="'+absolute+'requirements/details/'+full.requirement_id+'">' + url + '</a>';}
	},
        {
            "mDataProp": "Skills",
            "sTitle": "Skills Required"
	},
        {
            "mDataProp": "Location",
            "sTitle": "Location"
	},
        {
            "mDataProp": "Contact",
            "sTitle": "Contact"
	},
        {
            "mDataProp": "Recruiter",
            "sTitle": "Recruiter"
	},
	{
            "mDataProp": "Status",
            "sTitle": "Status"
	}]
	});
  })
