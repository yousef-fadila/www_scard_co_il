$(document).ready(function() {

    $('#imgUp').click(function() {
        var cur_pos = $('#bg-thumbs').scrollTop();
        var new_pos = cur_pos > 100 ? cur_pos - 100 : 0 ;
        $('#bg-thumbs').animate({scrollTop: new_pos} , 'slow');
    });
        
    $('#imgUp').hover(function() {
       $('#imgUp').attr('src' , 'imgs/control_up_hover.jpg');
	}, function(){
	    $('#imgUp').attr('src' ,  'imgs/control_up.jpg'); 
	});
	
	$('#imgDown').click(function() {
	    var cur_pos = $('#bg-thumbs').scrollTop();
	    var new_pos = cur_pos + 100;
	    $('#bg-thumbs').animate({scrollTop: new_pos} , 'slow');
	});
	
	$('#imgDown').hover(function() {
        $('#imgDown').attr('src' , 'imgs/control_down_hover.jpg');
	}, function(){
	    $('#imgDown').attr('src' ,  'imgs/control_down.jpg'); 
	});
	
	$('.thumb-img').click(function(){
	    var chosen_thumb = $(this).attr('src');
	    var chosen_img = chosen_thumb.substr(0 , chosen_thumb.length - 10) + '.jpg';
	    $('#preview-bg').attr('src' , chosen_img);
	    $('#input-bg').attr('value' , chosen_img);
	});
	
	$('#card-title').keyup(function() {
        $('#preview-card-title').html($(this).attr('value'));
        $('#input-title').attr('value' , $(this).attr('value'));
	});
        
    $('#btn-uplaod').click(function() {
	    $('#uplaod-process').show();
    });
        
    $('#upload-target').load(function() {
		$('#upload-process').hide();
		var res = $('#upload-target').contents().find('.res').text();
		if(res == 'error'){
		    $('#result').text('an error uploading image');
		}else{
		    $('#face-img').attr('src' , res);
		    $('#input-face').attr('value' , res);
		}
    });
        
    $('#finish').submit(function() {
        //assign hidden fields values.        
		$('#input-name').attr('value' , $('#c-name').attr('value'));
		$('#input-phone').attr('value' , $('#c-phone').attr('value'));
		$('#input-email').attr('value' , $('#c-email').attr('value'));
		
		//name validation
		var name = $('#input-name').attr('value');
		if(name == ''){
		    $('#validation-err').text('שדה השם הנו שדה חובה');
            return false;
		}
		
		//phone number validation
        var phone = $('#input-phone').attr('value');
        phone = phone.replace("-" , "");
        if(phone == ''){
            $('#validation-err').text('שדה הטלפון הנו שדה חובה');
            return false;
        }
        if(isNaN(phone)){
            $('#validation-err').text(' מספר טלפון לא חוקי');
            return false;
        }
        if(phone.length != 10){
            $('#validation-err').text("מס' טלפון לא חוקי.");
            return false;
        }
		
		//validate email
		var email = $('#input-email').attr('value');
		if(email == ''){
		    $('#validation-err').text('חובה להכניס כתובת דואר אלקטרוני');
		    return false;
		}
		if(!is_email(email)){
		    $('#validation-err').text("דואר אלקטרוני לא חוקי.");
		    return false;
		}
		
		return true;
    });
    
    
    ColorPicker(
        document.getElementById('slide'),
        document.getElementById('picker'),
        function(hex, hsv, rgb) {
            document.getElementById('preview-card-title').style.color = hex;
	        document.getElementById('input-color').value = hex;
    });
        
});
	
