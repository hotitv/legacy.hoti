  function premium_slider() {
  
        my_slider_counter = 0;
        curr_slide = 0;
        
        $('#slideshow img').each(function() {
            $(this).addClass('slide_' + my_slider_counter);
            my_slider_counter++;
        });
        
        function home_switch_slide() {
  
            if(curr_slide >= my_slider_counter)
                curr_slide = 0;
            else if(curr_slide < 0)
                curr_slide = (my_slider_counter-1);
                
            //alert(curr_slide);
            
            $('.slide_' + curr_slide).fadeIn(2000);
                
        }
        
        function hide_curr_slide() {
               $('.slide_' + curr_slide).stop();
               $('.slide_' + curr_slide).fadeOut(1000);
        }
        
        function next_slide_slider(jump_to_slide) {

            hide_curr_slide(); 
            
            if(jump_to_slide == null)
                curr_slide++;     
            else 
                curr_slide = jump_to_slide;
            
            t_slide=setTimeout(home_switch_slide,500); 
            //home_switch_image();
        }
        
        function prev_slide_slider(jump_to_slide) {

            hide_curr_slide();
            
            
//            curr_slide--;        

            if(jump_to_slide == null)
                curr_slide--;     
            else 
                curr_slide = jump_to_slide;

            //home_switch_image();
            t_slide=setTimeout(home_switch_slide,500);
        }        
        
        $('.slide_prev').click(function() {
          
            prev_slide_slider();
            clearInterval(intervalID_slide);
            //clearInterval(t_slide);
            intervalID_slide = setInterval(next_slide_slider, 8000);
        });
        
        $('.slide_next').click(function() {
            
            next_slide_slider();
            clearInterval(intervalID_slide);
            intervalID_slide = setInterval(next_slide_slider, 8000);
        });                
        
        //setInterval(next_slide_image, 5000);
        intervalID_slide = setInterval(next_slide_slider, 8000);  
  
  
  }  

$(document).ready(function() {	$('#menu2').click(function() {		$("#cat_menu").toggleClass("highlight");		$("#menu").toggleClass("highlight");		$(this).toggleClass("rayita");	});
	
	premium_slider();

	$('.home_post_box').hover(
		function() {
			$(this).find('.home_post_box_hover').css('display','table');
		},
		function() {
			$(this).find('.home_post_box_hover').css('display','none');
		}
	);
		

	$('.blog_box_img').hover(
		function() {
			$(this).find('.blog_box_img_hover').css('display','table');
		},
		function() {
			$(this).find('.blog_box_img_hover').css('display','none');
		}
	);		
		
	$('#slideshow_cont').hover(
		function() {
			$('.slide_prev').css('display','block');
			$('.slide_next').css('display','block');
		},
		function() {
			$('.slide_prev').css('display','none');
			$('.slide_next').css('display','none');		
		}
	);
	
});	