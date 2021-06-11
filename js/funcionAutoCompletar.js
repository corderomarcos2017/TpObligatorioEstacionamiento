$(function(){
             
			  var patentes = [ 

			    	
			    "aaa123","bbb102","ABC333","FFF456","aaa444","hhh123","ttt555","ttt555","aaa888","qqq123","qqq123","rrr123",	



			  ];


			  
			  // setup autocomplete function pulling from patentes[] array
			  $('#autocomplete').autocomplete({
			    lookup: patentes,
			    onSelect: function (suggestion) {
			      var thehtml = '<strong>patente: </strong> ' + suggestion.value + ' <br> <strong>ingreso: </strong> ' + suggestion.data;
			      $('#outputcontent').html(thehtml);
			         $('#botonIngreso').css('display','none');
      						console.log('aca llego');
			    }
			  });
			  

			});