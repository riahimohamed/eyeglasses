// JavaScript Document
jQuery.noConflict();
var is_home_page = false ;
jQuery(document).ready(function(){

	jQuery('#navigation-sub-menu-3 a').css({"pointer-events":"none"});
	jQuery("#navigation-sub-menu-3 a").click(function(e) {
	   e.preventDefault();
	 });

    //reassurance-bar
    truc = jQuery('.bloc_reassurance').children('div');
    jQuery(truc).each(function(){
        this.on('mouseenter', function(){
            jQuery(this).children('img.picto').addClass("hidden");
            jQuery(this).children('div.picto-comment').removeClass("hidden");
        });
    });
    jQuery(truc).each(function(){
        this.on('mouseleave', function(){
            jQuery(this).children('img.picto').removeClass("hidden");
            jQuery(this).children('div.picto-comment').addClass("hidden");
        });
    });
    //  mCustomScrollbar        
jQuery(".FilteringColumn ul").mCustomScrollbar();

jQuery("dl.gan-attribute dd").mCustomScrollbar();
    //menu
    function showTooltip(linkCurrent, tooltipClass, liPath) {
        liCurrent = jQuery(linkCurrent).parent();
        if (liCurrent.children(tooltipClass).length) {
            if (liCurrent.children(tooltipClass).is(':hidden')) {
                jQuery('#voile').show();
                /**/
                jQuery(liPath).removeClass('current');
                jQuery(liPath).children(tooltipClass).hide();
                jQuery("div[rel='popup']").parent().removeClass('current');
                jQuery("div[rel='popup']").hide();
                /**/
                liCurrent.addClass('current');
                liCurrent.children(tooltipClass).show();
            } else {
                liCurrent.removeClass('current');
                liCurrent.children(tooltipClass).hide();
                jQuery('#voile').hide();
            }
        }
    }


    jQuery('.micromodal').microModal({  
        overlay: {  
            color: '#000',
            opacity: 0.9
        }  
    });
    
  jQuery('.bxslider').bxSlider({
      auto: true,
      controls: false,
      autoControls: false,
      speed: 500,
      pause: 4000,
      autoHover: true
  });

  jQuery('.bxsliderProductContacto, .bxsliderProductOptic, .bxsliderProductSolaire').bxSlider({
      auto: true,
      speed: 500,
      pause: 4000,
      autoHover: true
  });

	function shinSwitch(){
		jQuery('.switch li').animate({'width' : '153px'},{complete: function() {
			jQuery('.switch a').addClass("refresh");
			jQuery('.switch li span').show();
		}}).delay(1000);
		jQuery('.switch a').animate({'margin-left' : '125px'}).delay(1000).animate({'margin-left' : '9px'}) ;
		jQuery('.switch li').animate({'width' : '37px'},{complete: function() {
			jQuery('.switch li span').hide();
			jQuery('.switch a').removeClass("refresh");
		}});
	}
	
	shinSwitch();

	//win = centerProductBloc();
	/*jQuery(window).resize(function() {
	  win = centerProductBloc();
	});*/
	
	//winWidth = getIdealWidth();
	//jQuery('.centerBox').css('width',winWidth);
	
	/*
	  var w = jQuery(window).width();
	  // alert(w); 
	  if(w < 500){jQuery('body').css('overflow-x','visible');}
	*/
	/**/
	/*
	jQuery('.switch a').click(function(){
		jQuery(this).toggleClass('portraits');
		jQuery('#productsList').toggleClass('lunettes');							   
	});	
	*/
	canswitch = true ;
	jQuery('.switch li').hover(function(){
		if(canswitch){
			jQuery(this).animate({'width' : '153px'},{complete: function(){
				if(canswitch == false) jQuery('.switch li span').show();
			}}) ;
			jQuery('.switch a').animate({'margin-left' : '125px'}) ;
			jQuery('.switch a').addClass("refresh");
			canswitch = false ;
		}
	},function(){
		jQuery(this).stop();
		jQuery('.switch a').stop();
		
		jQuery(this).animate({'width' : '37px'},{complete: function(){
			canswitch = true ;
			jQuery('.switch a').removeClass("refresh");
			jQuery('.switch li span').hide();
			}}) ;
		jQuery('.switch a').animate({'margin-left' : '9px'}) ;
		jQuery('.switch li span').hide();
	});
	jQuery('.switch li').click(function(){
		if(jQuery('.switch a').hasClass('portraits')){
			if(is_home_page) _gaq.push(['_trackEvent', 'Action_Site_Home_Page', 'clic', 'Picto_changer_visualisation_visage']);
			jQuery('.switch a').removeClass('portraits');
			jQuery('.switch a').addClass('lunettes');
			//jQuery('.stickersBloc').show();
			jQuery('#productsList').removeClass('portraits');
			jQuery('#productsList').addClass('lunettes');
			jQuery('#bigShot').show();
			jQuery('#bigShotPorte').hide();
			jQuery("#COMPONENTS360").hide();

			jQuery('.productItem').addClass("hideVideo");
		}else{
			if(jQuery('.switch a').hasClass('lunettes')){
				if(is_home_page) _gaq.push(['_trackEvent', 'Action_Site_Home_Page', 'clic', 'Picto_changer_visualisation_lunette']);
				jQuery('.productItem').removeClass("hideVideo");
				jQuery('.switch a').removeClass('lunettes');
				jQuery('.switch a').addClass('portraits');
				//jQuery('.stickersBloc').hide();
				
				jQuery('#productsList').removeClass('lunettes');
				jQuery('#productsList').addClass('portraits');
				jQuery('#bigShot').hide();
				jQuery('#bigShotPorte').show();
				jQuery("#COMPONENTS360").hide();

			}else{
				if(is_home_page) _gaq.push(['_trackEvent', 'Action_Site_Home_Page', 'clic', 'Picto_changer_visualisation_visage']);
				jQuery('.switch a').addClass('lunettes');
				jQuery('#productsList').addClass('lunettes');
				jQuery('#bigShot').show();
			}
		}
		jQuery('.switch li').animate({'width' : '37px'},{complete: function(){
			canswitch = true ;
			jQuery('.switch a').removeClass("refresh");
			}}) ;
		jQuery('.switch a').animate({'margin-left' : '9px'}) ;
		jQuery('.switch li span').hide();
	});
	
	jQuery('#selectorItemsArea a.closeIcon').click(function(){
		jQuery('#selectorItemsArea').hide("slide");							  
	});
	
	jQuery('.searchArea').hover(function(){
		jQuery("#search").addClass('focus');
		//this.select();
	},function(){
		jQuery("#search").removeClass('focus');
		if(jQuery("#search").val() == ""){
			jQuery("#search").blur();
			jQuery("#search").val("Recherche tout et n'importe quoi !") ;
		}
		//this.select();
	});
    jQuery(".searchKeysWords").click(function(){
	    if(jQuery(this).val() == "Recherche tout et n'importe quoi !"){
	    	jQuery(this).val("") ;
	    }
    });
	
	jQuery('#header').hover(
	function(){
		return true;
	},
	function(){
		jQuery("#header-sep-bar").removeClass("half");
		jQuery("#selector ul.menu").hide();
	});
	/**
	jQuery('.passWordInput').focus(function(){
		if( jQuery(this).attr('type') == 'text' ){
			jQuery(this).val('');
			jQuery(this).attr('type','password');
		}
	});
	
	jQuery('.passWordInput').focusout(function(){
		if( jQuery(this).val() == '' ){
			jQuery(this).val('MOT DE PASSE');
			jQuery(this).attr('type','text');
		}
	});
	/**/
	jQuery('.mailInput').focus(function(){
		jQuery(this).val('');
    });

    jQuery('.mailInput').focusout(function(){
	if( jQuery(this).val() == '' ){
		jQuery(this).val('votre EMAIL');
	}
    });
	//Cufon.now();
	jQuery("#voile").click(function(){hidetooltips() ;});

});
function clearVal(obj, val){
	if( jQuery(obj).val() == val ){
		jQuery(obj).val('');
	}
}

function resetVal(obj, val){
	if( jQuery(obj).val() == '' ){
		jQuery(obj).val(val);
	}
}

/*function getIdealWidth(){
	windowWidth = jQuery(window).width();
	widthBoxProduct = 190;
	margeborn = (windowWidth % widthBoxProduct) / 2;
	wpi = windowWidth - (windowWidth % widthBoxProduct);
	return wpi;
}*/

/*function centerProductBloc(){
	wpi = getIdealWidth();
	jQuery('.marieLouise').css('width','950px');
}*/
/*
function showSubMenu(index){
	jQuery("#selector ul.menu").hide();
	if(index){
		jQuery("#header-sep-bar").addClass("half");
		jQuery("#submenu"+index+":hidden").show();
		jQuery("#selector").show();
	}
}
*/
function showTab(id){
	jQuery(".tabs li").removeClass('active');
	jQuery(".LiRight a").removeClass('active');
	jQuery(".LiLeftRight p").removeClass('active');
	jQuery("#tab"+id).addClass('active');
	jQuery("#a"+id).addClass('active');
	jQuery("#p"+id).addClass('active');
	jQuery("#panes > div").hide();
	jQuery("#pane_"+id).show();
}
function hidetooltips(){
	jQuery("div[rel='popup']").parent().removeClass('current');
	jQuery("div[rel='popup']").hide();
	jQuery('#voile').hide();
}
function showTooltip(linkCurrent, tooltipClass, liPath){
	liCurrent = jQuery(linkCurrent).parent();
	if(liCurrent.children(tooltipClass).length){								  
		if(liCurrent.children(tooltipClass).is(':hidden')){
			jQuery('#voile').show();
			/**/
			jQuery(liPath).removeClass('current');
			jQuery(liPath).children(tooltipClass).hide();
			jQuery("div[rel='popup']").parent().removeClass('current');
			jQuery("div[rel='popup']").hide();
			/**/
			liCurrent.addClass('current');
			liCurrent.children(tooltipClass).show();
		}else{
			liCurrent.removeClass('current');
			liCurrent.children(tooltipClass).hide();
			jQuery('#voile').hide();
		}
	}
}

(function($){
  $.shuffle = function(arr) {
    for(
      var j, x, i = arr.length; i;
      j = parseInt(Math.random() * i),
      x = arr[--i], arr[i] = arr[j], arr[j] = x
    );
    return arr;
  }
})(jQuery);

jQuery.fn.center = function () {
	jQuery(this).css("top", ((jQuery(window).height() - jQuery(this).outerHeight()) / 2) + "px");
	jQuery(this).css("left", ((jQuery(window).width() - jQuery(this).outerWidth()) / 2) + jQuery(window).scrollLeft() + "px");
    return this;
}

function showO2Popup(text)
{
	jQuery.fn.microModal.dialogs['#O2popup'].open();
	jQuery('#textpopup').html(text);
}

function pwdFocus() {
	jQuery('#fakepassword').hide();
	jQuery('#password').show();
	jQuery('#password').focus();
}

function pwdBlur() {
    if (jQuery('#password').attr('value') == '') {
    	jQuery('#password').hide();
    	jQuery('#fakepassword').show();
    }
}


