        $(document).ready(function (){
		
            $("#role").change(function() {
               
                if ($(this).val() == "FN") {
				  //alert('works');
                    $("#foo").show();
                }else{
				  //alert('works1');
                    $("#foo").hide();
                } 
				if ($(this).val() == "CAT") {
				  //alert('works');
                    $("#foo1").show();
                }else{
				  //alert('works1');
                    $("#foo1").hide();
                } 
				if ($(this).val() == "DEC") {
				  //alert('works');
                    $("#foo2").show();
                }else{
				  //alert('works1');
                    $("#foo2").hide();
                } 
				if ($(this).val() == "PH") {
				  //alert('works');
                    $("#foo3").show();
                }else{
				  //alert('works1');
                    $("#foo3").hide();
                } 
            });
        });