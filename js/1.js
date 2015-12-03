$(document).ready(function(e) {
	$('#submit').click(function(event){
		$('#roll').slideUp('slow');
	});
	$('#back').hide();
	$('#show').click(function(event){
		$('#back').slideDown('slow');
		})
	$('.regularshow').hide();
	$('#backlog').click(function(event){
		
		$('#backlogsshow').slideDown('slow');
		$('#regularshow').hide();
		})
	$('.regularshow').hide();
	$('#regular').click(function(event){
		$('#regularshow').slideDown('slow');
		$('#backlogsshow').hide();
		})
});
/*function usernamevalidation()
{
	alert("Hai");
	}*/
	
/*
function usernamevalidation()
{
	var x=document.forms["rollno"].value;
	if(x===""||x===null)
	{
		alert("Please Enter the username");
		}
	
	}*/