<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Clone Form</h2>
  <form action="#" id="testform">
  <div id="clone">
    <div class="row">
	  <div class="col-lg-2">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="name_1" placeholder="Enter email" name="name_1">
	  </div>
	  <div class="col-lg-2">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email_1" placeholder="Enter email" name="email_1">
	  </div>
	  <div class="col-lg-2">
      <label for="email">Age:</label>
      <input type="text" class="form-control" id="age_1" placeholder="Enter email" name="age_1">
	  </div>
	  <div class="col-lg-2">
      <label for="email">Country:</label>
      <input type="text" class="form-control" id="country_1" placeholder="Enter email" name="country_1">
	  </div>
	  <div class="col-lg-2">
	  <br>
	  <span class="col-lg-1" id="data_1" onclick="addrow(this)"><i class="fa fa-plus"></i></span>
	  </div>
    </div>
	</div>
	<input type="hidden" name="rowcount" id="rowcount" value="1">
	<input type="submit" id="submit" value="Submit" class="btn btn-default"></div>
  </form>
</div>

<div   id="dummy-clone" style="display:none;">
 <div class="row">
   <div class="col-lg-2">
      <label for="email">Name:</label>
	  <input class="form-control" type="text"  placeholder="Enter email"name="name__" id="name__"/>
	  </div>
	  <div class="col-lg-2">
      <label for="email">Email:</label>
	  <input class="form-control" type="text" name="email__" id="email__"/>
	  </div>
	  <div class="col-lg-2">
      <label for="email">Age:</label>
	  <input class="form-control" type="text" name="age__" id="age__"/>
	  </div>
	  <div class="col-lg-2">
      <label for="email">Country:</label>
	  <input class="form-control" type="text" name="country__" id="country__"/>
	  </div>
	  <div class="col-lg-2">
	  <br>
	  <span class="col-lg-1" id="data__" onclick="addrow(this)"><i class="fa fa-plus"></i></span>
	  </div>
 </div>
</div>
</body>
</html>
<script>
$(function(){	
orientationchange();
// Listen for orientation changes
window.addEventListener("orientationchange", function() {
	// Announce the new orientation number
	alert(screen.orientation);
}, false);

});
 var $row=$("#rowcount");
 function addrow(x)
	 {   
	 
	     var id = $(x)[0].id.split('_')[1];
		 if(validate(id))
		 {
		   var template = $('#dummy-clone').html();
		   count=parseInt($row.val())+1;
		   console.log($row.val(count));
		   var template=$('#clone').append(template.replace(/__/g, '_' + count));
		 }
		
		 
	 }
function validate(id)
{
		var flag=false;
		if($("#name_"+id).val()=='')
		{
			$("#name_"+id).css('border','1px solid red');
			flag=false;
		}
		else
		{
		  $("#name_"+id).css('border','');
			flag=true;	
		}
		 if($("#email_"+id).val()=='')
		{
			$("#email_"+id).css('border','1px solid red');
			flag=false;
			
		}
		else
		{
		   $("#email_"+id).css('border','');
			flag=true;	
		}
		 if($("#age_"+id).val()=='')
		{
		  $("#age_"+id).css('border','1px solid red');
		  flag=false;
		 
		}
		else
		{
			$("#age_"+id).css('border','');
		    flag=true;
		}
		if($("#country_"+id).val()=='')
		{
			$("#country_"+id).css('border','1px solid red');
			flag=false;
			
		}
		else
		{
			 $("#country_"+id).css('border','');
			flag=true;
		}
		return flag;
}
function validateall()
{
	var rcnt=$("#rowcount").val();
	var flag=false;
	for(id=1;id<=rcnt;id++)
	{
	   if($("#name_"+id).val()=='')
		{
			$("#name_"+id).css('border','1px solid red');
			flag=false;
		}
		else
		{
		  $("#name_"+id).css('border','');
			flag=true;	
		}
		 if($("#email_"+id).val()=='')
		{
			$("#email_"+id).css('border','1px solid red');
			flag=false;
			
		}
		else
		{
		   $("#email_"+id).css('border','');
			flag=true;	
		}
		 if($("#age_"+id).val()=='')
		{
		  $("#age_"+id).css('border','1px solid red');
		  flag=false;
		 
		}
		else
		{
			$("#age_"+id).css('border','');
		    flag=true;
		}
		if($("#country_"+id).val()=='')
		{
			$("#country_"+id).css('border','1px solid red');
			flag=false;
			
		}
		else
		{
			 $("#country_"+id).css('border','');
			flag=true;
		}	
	}
	return flag;
}	
$("#testform").submit(function(e) {
	e.preventDefault(); // avoid to execute the actual submit of the form.
    if(validateall())
	{
	    var formdata = new FormData($("#testform")[0]);
        var url = "save.php"; // the script where you handle the form input.
		$.ajax({
			   type: "POST",
			   url: url,
			   data:formdata , // serializes the form's elements.
			   contentType: false,
			   cache: false,
			   processData: false,
			   success: function(data)
			   {
				   //alert(data); // show response from the php script.
			   }
			 });
		 
    }		 
});	
</script>
