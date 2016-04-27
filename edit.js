
/**
*display form data
*/
$(function(){
	$('tbody').on('click','td',function(){
		displayForm($(this));
		
	});
	
});

/**
*function to edit record upon double click
*/
function displayForm(cell){
	var column = cell.attr('class'),
	     id = cell.closest('tr').attr('id'),
		 cellWidth = cell.css('width'),
		 prevContent = cell.text(),
		 form = "<form action='javascript:this.preventDefault'><input type='text' name='newValue' size='4' value='"+prevContent+"'><input type='hidden' name='id' value='"+id+"' ><input type='hidden' name='column' value='"+column+"'></form>";
			   
	 cell.html(form).find('input[type=text]')
	     .focus()
		 .css('width',cellWidth);
		 
	cell.on('click', function(){return false;});
	
	cell.on('keydown',function(e){
		if(e.keyCode==13){//enter
			changeField(cell, prevContent);
		}else if(e.keyCode==27){
			cell.text(prevContent);
			cell.off('click');
		}
	});
}

/**
*makes an AJAX call to the server
*replace old record with newValue
*/
function changeField(cell, prevContent){
	cell.off('keydown');
	var url = 'ajax.php?edit&',
	input = cell.find('form').serialize();
	
	/**
	*receives server response
	*/
	$.getJSON(url+input,function(data){
		if(data.success){
			cell.html(data.value);
		}else{
			alert("There was a problem updating the data. Please try again.");
			cell.html(prevContent);
		}
	});
	cell.off('click');
}

/**
*display table record upon click
*/ 
function showdata(opts)
	  {
		  $.ajax({
			  url:"index.php",
			  type:"POST",
			  async:true,
			  data:{
				  showtable : 1,
				  opts: opts
				   },
			  success:function(re)
			  {
				  $('#showdata').html(re);
			  }
		  });
	  }
	  
	  /**
	  *code to change tables upon click
	  */
	  $("#selectTable").on("change", function(){
		var selected = $(this).val();
		showdata(selected);
	  });