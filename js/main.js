jQuery(document).ready(function(){});jQuery(document).on('click','.footer-title',function(){var width=jQuery(window).width();var collapsed=jQuery(this).data('collapsed');if(width<768){jQuery('.footer-title').removeClass('active');jQuery('.footer-title').data('collapsed',1);jQuery('.footer-title').find('i').removeClass('fa-caret-down').addClass('fa-caret-right');jQuery('.footer-mob-collapse').slideUp();if(collapsed==1){jQuery(this).find('i').removeClass('fa-caret-right').addClass('fa-caret-down');jQuery(this).data('collapsed',0);jQuery(this).addClass('active');jQuery(this).parent().find('.footer-mob-collapse').slideDown();}}});jQuery('#video-modal-open').click(function(){jQuery('#video-modal').fadeIn();});jQuery('#video-modal-close').click(function(){jQuery('#video-modal').fadeOut();jQuery("#video-modal iframe").attr("src",jQuery("#video-modal iframe").attr("src"));});