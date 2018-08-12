(function ($) {
	winHeight = $(window).height();
	winWidth = $(window).width();

	/*if(winWidth < 998){
		$('.sect.main_option .option_miniblock__restoran').detach();
	}*/

	if(winWidth <= 998 && winWidth > 668){
		$('.sect.main_option .option_miniblock__hunting').insertBefore($('.sect.main_option .option_main_block__hunting'));
	}

	var cont_block = [];
	$('.container_options > div').each(function(){
		cont_block.push($(this).offset().top);
		$(this).attr('data-top',$(this).offset().top);
	});

	$('.option_caption__button').each(function(){
		$(this).attr('data-btn-text',$.trim($(this).text()));
	});

	//console.log(winHeight);
	var now_top;
	var reset_top = winHeight;
	$(window).scroll(function(){
		now_top = $(this).scrollTop();
		if(now_top < (reset_top + now_top)){
			console.log(now_top);
		} else {
			console.log(reset_top);
		}
	});

	var lastScrollTop = 0;
	$(window).scroll(function(event){
	    var sts = $(this).scrollTop();
	    //console.log(st);

	});

	if(winWidth > 300){
		var vh_size;

		if(winWidth <= 1366 && winWidth > 1280){
			vh_size = winHeight - 60;
		} else if(winWidth <= 1280 && winWidth > 1000){
			vh_size = winHeight - 40;
		} else {
			vh_size = winHeight - 120;
		}
		
		//console.log(section_about_position);
		$(window).resize(function(e){
			winHeight = $(window).height();
			winWidth = $(window).width();
			
			if(winWidth <= 1366 && winWidth > 1280){
				vh_size = winHeight - 60;
			} else if(winWidth <= 1280 && winWidth > 1000){
				vh_size = winHeight - 40;
			} else {
				vh_size = winHeight - 120;
			}

			/*if(winWidth == 1024 || winWidth == 768){
				location.reload();
			}*/

			//console.log(winWidth +'px -> '+winHeight+'px');
		});

		console.log(cont_block);

		$(window).scroll(function(){
			
			var ts = $(this).scrollTop();
			var st;

			if(winWidth > 1440){
				st = ts + winHeight - 80;
			} else if(winWidth > 1024 && winWidth < 1440){
				st = ts + winHeight - 50;
			} else {
				st = ts + winHeight + 20;
			}

			if($('body').hasClass('node-type-huntings') || $('body').hasClass('node-type-fishings')){
				setTimeout(function(){
					if(ts <= 50){
						$('.container_options > div').eq(1).addClass('show_lunch');
					}
					//console.log('show_lunch');
				},2000);
			} 
			console.log('st='+st);
			for(var i = 0; i < cont_block.length; i++){
				if(st > cont_block[i]){
					$('.container_options > div').eq(i).addClass('show_lunch');
				} else {
					$('.container_options > div').eq(i).removeClass('show_lunch');
				}
			}

			if($('body').hasClass('front') && winWidth > 1024){
				if(ts >= vh_size){
					$('.section_header > .wrapper > .header, .section_main_head .container_main_head').css({'position': 'absolute', 'margin-top': vh_size+'px'});
				} else {
					$('.section_header > .wrapper > .header, .section_main_head .container_main_head').removeAttr('style');
				}
			}
			//console.log(section_about_position);
			//console.log(ts);
		});

		$(window).trigger('scroll');
	} else {
		$('.container_options > div').addClass('show_lunch');

		$('.container_about > .container_about__text').wrapInner('<div class="container_about__text_mob_scroll"></div>');
		$('.sect.section_map .container_map > .container_map_text > p').wrapInner('<span></span>')
	}

	$(window).scroll(function(){
		var mts = $(this).scrollTop();

		if (mts > lastScrollTop) {
		      if($('body').hasClass('front') && winWidth > 1024){
		      	if (mts > vh_size){
			         $('.menu_header').addClass('headerhidden');
			       }
		      } else {
		      	if (mts > 139){
			         $('.menu_header').addClass('headerhidden');
			       }
		      }
		    } else {
		      // upscroll code
		      if(!$('body').hasClass('modal-open') && mts > 80){
		      	$('.menu_header').removeClass('headerhidden');
		      }
		    }
		    lastScrollTop = mts;
	});
	
	function news_height_h3(){
		$('.sect.main_news .container_news .cb_news__width_all.cb_news__photo-text .news_block > .news_block_images > h3.news_block__title').each(function(){
			news_height_h3 = $(this).innerHeight();
			news_height_h3 += 57;
			//console.log(news_height_h3);
			$(this).css('margin-top','-'+news_height_h3+'px');
		});
	};

	function full_height_images(){
		$('.news_block').each(function(){
			block_height = parseFloat($(this).height()) + 1;
			//console.log(block_height);
			$(this).find('.news_block_images > img').css('height', block_height+'px');
		});
	};

	$('#read_more').click(function(){
		myAjaxNode($(this).attr('data-type'), $(this).attr('data-offset'));
	});

	function myAjaxNode(type, offset){
		//console.log(type +' -> '+offset);
		$.ajax({
			url: '/includes/myajax/ajax-nodes.php',
			data: {data: {type: type, offset: offset}},
			type: 'post',
			dataType: 'html',
			success: function(html){
				if(offset == 0){
					$('.container_news__block').html(html);
				} else {
					$('.container_news__block').append(html);
				}
				//console.log('ajax запрос выполнен!');
				offset = offset - (-4);
				$('#read_more[data-type="'+type+'"]').attr('data-offset',offset);
				
				$('.sect.main_news .container_news .cb_news__width_all.cb_news__photo-text .news_block > .news_block_images > h3.news_block__title').each(function(){
					news_height_h3 = $(this).innerHeight();
					news_height_h3 += 37;
					//console.log(news_height_h3);
					$(this).css('margin-top','-'+news_height_h3+'px');
				});

				$('.cb_news__photo-text .news_block').each(function(){
					block_height = parseFloat($(this).height()) + 1;
					$(this).find('.news_block_images > img').css('height', block_height+'px');
				});

				//if(html == '') $('#read_more[data-type="'+type+'"]').detach();
				$(window).trigger('scroll');
			},
			error: function(xhr, ajaxOptions, thrownError) {
  				//console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
  			}
		}); 
	}

	function menu_before_click(){
		//console.log(123);
		$('.mb_menu').slideDown(300);
		/*$('.menu_header').addClass('headerhidden');*/
		//console.log(13123123213);
	}

	$(document).ready(function() {
		var ww = $(window).width();

		if(ww <= 1024){
			var menu_before_m, menu_before_m1;
			menu_before_m = $('.section_header .menu_before');
			menu_before_m1 = menu_before_m.clone();
			//menu_before_m.empty();

			menu_before_m1.toggleClass('menu_before mb_menu');
			menu_before_m1.find('a').wrapAll('<div class="mb_menu_list"></div>');
			menu_before_m1.prepend('<div class="mb_menu_site_logo" onclick="location = \'/\'"></div><div class="mb_menu_close"></div>');
			menu_before_m1.prependTo($('body'));

			$('.mb_menu > .mb_menu_list > a').each(function(){
				if($(this).hasClass('active')){
					$(this).wrapInner('<span></span>');
				}
			});

			$('.menu_before').click(function(){
				$('.mb_menu').slideDown(300);
				//$(this).parents('.menu_header').addClass('headerhidden');
				console.log(13123123213);
			});

			$('.mb_menu_close').click(function(){
				$('.mb_menu').slideUp(300);
			});
		}

		var clone_menu = $('.section_header').clone();
		clone_menu.toggleClass('section_header menu_header');
		//clone_menu.addClass('headerhidden');
		//if(ww <= 768) clone_menu.find('.menu_before').attr('onclick','menu_before_click()');
		clone_menu.find('.content.header').removeAttr('style');
		clone_menu.prependTo($('body'));

		var uri_path = location.pathname;
		var expr_path;
		var expr_art = new RegExp('articles', 'ig');
		$('.menu_before > a, .mb_menu_list > a').each(function(){
			expr = new RegExp($(this).attr('href'), 'ig');

			if(expr_art.test(uri_path)){
				uri_path = '/blog/';
			}

			console.log(uri_path);

			if(expr.test(uri_path)){
				$(this).addClass('active');
				$(this).wrapInner('<span></span>');
			}
		});
		
		if(winWidth > 1024){
			$('.mhf_pic').appearHover();
		}

		var nex_block;
		$('.edit_node_block').each(function(){
			if($(this).next().hasClass('option_miniblock') || $(this).next().hasClass('option_block')){
				nex_block = $(this).next();
				nex_block.prepend($(this));
			}
		});

		if(winWidth <= 998){
			$('.sect.main_option .option_main_block__restoran > .option_caption > .option_caption__title').text($('.sect.main_option .option_main_block__restoran > .option_caption > .option_caption__title').text());
			$('.sect.section_map').after('<section class="sect section_map_2"><div class="wrapper"><div class="content map cm_text">'+$('.sect.section_map .container_map > .container_map_info_btn').html()+'</div></div></section>');
			$('.restoran_menu.bar > .rm_title > br').replaceWith(' ');

			if(winWidth <= 668){
				//$('.sect.main_option .option_miniblock__hunting').insertAfter($('.sect.main_option .option_main_block__hunting'));
				$('.main_head__caption_title > br').detach();
				//
				
				$('.sect.section_map .container_map > .container_map_info_btn').detach();
				
				$('.section_hotel .container_hotel .hotel_number').each(function(){
					$(this).find('.hotel_number__block_caption__list').insertAfter($(this).find('.hotel_number__block_caption__text'));
				});
				
				var ob_fishn = $('.option_main_block__fishing_night > .option_caption').clone();
				$('.option_main_block__fishing_night').detach();
				
				ob_fishn.toggleClass('option_caption option_caption__offers_block')
				ob_fishn.appendTo($('.section_fishing .container_fishing .option_block__fishing_offers > .option_caption'));
				
				
				$('.page-node-85 .main_head__caption_text br').replaceWith('<span> </span>');
				
				$('.section_animal .container_animal_block .container_animal_descriptions > .animal_description img').prependTo($('.section_animal .container_animal_block .container_animal_descriptions'));
			} else {
				$('.main_head__caption_title > br, .sect.section_foot .copyright > p > br').detach();
				
				$('.sect.main_option .option_miniblock__hunting').insertBefore($('.sect.main_option .option_main_block__hunting'));

				$('.option_main_block__fishing_night').insertAfter($('.container_fishing .option_block__fishing_offers'));
			}
		}

		if(winWidth == 768){
			$('.hotel_number__block_caption').each(function(){
				$(this).children('.hotel_number__block_caption__text').insertAfter($(this));
			});
		}

		$('.popup_restoran').addClass('fade');

		$('.popup_restoran').each(function(){
			$(this).children('.popup_close').prependTo($(this).children('.popup_box'));
		});

		/************************************************/

		var slider_lux = $('#bxGalleryHotelLux').bxSlider({
		  mode: 'fade',
		  responsive: true,
		  /*touchEnabled: true,
		  swipeThreshold: 1,
		  oneToOneTouch: false,
		  preventDefaultSwipeX: false,*/
		  pager: true,
		  pagerType: 'short'
		});

		var slider_polulux = $('#bxGalleryHotelPolulux').bxSlider({
		  mode: 'fade',
		  responsive: true,
		  /*touchEnabled: true,
		  swipeThreshold: 1,
		  oneToOneTouch: false,
		  preventDefaultSwipeX: false,*/
		  pager: true,
		  pagerType: 'short'
		});

		if(location.pathname == '/otdyh'){
			var slider_lux_count = slider_lux.getSlideCount();
			var slider_polulux_count = slider_polulux.getSlideCount();
		}
		
		//$('.hotel_number_lux .hotel_number__control > .control_count > .count_photo').detach();

		$('.hotel_number_lux .hotel_number__control > .control_count > .this_photo').text($('.hotel_number_lux .bx-pager.bx-default-pager').text());
		$('.hotel_number_polulux .hotel_number__control > .control_count > .this_photo').text($('.hotel_number_polulux .bx-pager.bx-default-pager').text());

		function this_slide_num(this_class){
			var this_slide = $('.'+this_class).find('.bx-pager.bx-default-pager').text();
			$('.'+this_class).find('.hotel_number__control > .control_count > .this_photo').text(this_slide);
			//$('.'+this_class).find('.hotel_number__control > .control_count > .count_photo').detach();
			return false;
		}

		$('.hotel_number_lux .control_prev').click(function(){
		  slider_lux.goToPrevSlide();
		  this_slide_num('hotel_number_lux');
		  return false;
		});

		$('.hotel_number_lux .control_next').click(function(){
		  slider_lux.goToNextSlide();
		  this_slide_num('hotel_number_lux');
		  return false;
		});

		$('.hotel_number_polulux .control_prev').click(function(){
		  slider_polulux.goToPrevSlide();
		  this_slide_num('hotel_number_polulux');
		  return false;
		});

		$('.hotel_number_polulux .control_next').click(function(){
		  slider_polulux.goToNextSlide();
		  this_slide_num('hotel_number_polulux');
		  return false;
		});

		if($('body').hasClass('page-node-82')){
			var objectlux = document.getElementById('bxGalleryControlLux');
			var startPos = 0, stopPos = 0;

			objectlux.addEventListener('touchstart', function(event) {
				event.stopPropagation();
				startPos = event.changedTouches[0].pageX;
			}, false);

			objectlux.addEventListener('touchend', function(event) {
				event.stopPropagation();
				stopPos = event.changedTouches[0].pageX;
				if((startPos - stopPos) > 30){
					//console.log('>');
					$('.hotel_number_lux .control_next').trigger('click');
				} else if((startPos - stopPos) < -30){
					//console.log('<');
					$('.hotel_number_lux .control_prev').trigger('click');
				}
				startPos = 0;
				stopPos = 0;
			}, false);

			var objectpolulux = document.getElementById('bxGalleryControlPolulux');

			objectpolulux.addEventListener('touchstart', function(event) {
				event.stopPropagation();
				startPos = event.changedTouches[0].pageX;
			}, false);

			objectpolulux.addEventListener('touchend', function(event) {
				event.stopPropagation();
				stopPos = event.changedTouches[0].pageX;
				if((startPos - stopPos) > 30){
					//console.log('>');
					$('.hotel_number_polulux .control_next').trigger('click');
				} else if((startPos - stopPos) < -30){
					//console.log('<');
					$('.hotel_number_polulux .control_prev').trigger('click');
				}
				startPos = 0;
				stopPos = 0;
			}, false);
		}

		/*swape_bx_slider('bxGalleryHotelLux');
		swape_bx_slider('bxGalleryHotelPolulux');*/

		var slider_gl_home = $('ul#bxGalleryHome').bxSlider({
		  mode: 'fade',
		  responsive: true,
		  touchEnabled: true,
		  pager: true,
		  pagerType: 'short'
		});
		
		$('.main_gallery .control_prev').click(function(){
		  slider_gl_home.goToPrevSlide();
		  this_slide_num('main_gallery');
		  return false;
		});

		$('.main_gallery .control_next').click(function(){
		  slider_gl_home.goToNextSlide();
		  this_slide_num('main_gallery');
		  return false;
		});

		//var slider_gl_home = slider_lux.getSlideCount();

		if($('#bxGalleryHome').hasClass('bxgallery')){
			var objecthome = document.getElementById('bxGalleryControlHome');

			objecthome.addEventListener('touchstart', function(event) {
				event.stopPropagation();
				startPos = event.changedTouches[0].pageX;
			}, false);

			objecthome.addEventListener('touchend', function(event) {
				event.stopPropagation();
				stopPos = event.changedTouches[0].pageX;
				if((startPos - stopPos) > 30){
					//console.log('>');
					$('.main_gallery .control_next').trigger('click');
				} else if((startPos - stopPos) < -30){
					//console.log('<');
					$('.main_gallery .control_prev').trigger('click');
				}
				startPos = 0;
				stopPos = 0;
			}, false);
		}

		$('.main_gallery .hotel_number__control > .control_count > .this_photo').text($('.main_gallery .bx-pager.bx-default-pager').text());

		$('#popup.popup_restoran').insertBefore($('#popup_fade'));


		if(winWidth > 768){
			var slider_svadba = $('#bxGallerySvadba').bxSlider({
				mode: 'fade',
				responsive: true,
			    touchEnabled: true,
			    pager: true,
				buildPager: function(slideIndex){
				    switch(slideIndex){
				      case 0:
				        return '<img src="/sites/default/files/new180218/rest/svad/preview/svadba_1.jpg">';
				      case 1:
				        return '<img src="/sites/default/files/new180218/rest/svad/preview/svadba_2.jpg">';
				      case 2:
				        return '<img src="/sites/default/files/new180218/rest/svad/preview/svadba_3.jpg">';
				      case 3:
				        return '<img src="/sites/default/files/new180218/rest/svad/preview/svadba_4.jpg">';
				      case 4:
				        return '<img src="/sites/default/files/new180218/rest/svad/preview/svadba_5.jpg">';
				      case 5:
				        return '<img src="/sites/default/files/new180218/rest/svad/preview/svadba_6.jpg">';
				      case 6:
				        return '<img src="/sites/default/files/new180218/rest/svad/preview/svadba_7.jpg">';
				      case 7:
				        return '<img src="/sites/default/files/new180218/rest/svad/preview/svadba_8.jpg">';
				    }
				}
			});

			var slider_korp = $('#bxGalleryKorporative').bxSlider({
				mode: 'fade',
				responsive: true,
			    touchEnabled: true,
			    pager: true,
				buildPager: function(slideIndex){
				    switch(slideIndex){
				      case 0:
				        return '<img src="/sites/default/files/new180218/rest/korp/preview/korp_1.jpg">';
				      case 1:
				        return '<img src="/sites/default/files/new180218/rest/korp/preview/korp_2.jpg">';
				      case 2:
				        return '<img src="/sites/default/files/new180218/rest/korp/preview/korp_3.jpg">';
				      case 3:
				        return '<img src="/sites/default/files/new180218/rest/korp/preview/korp_4.jpg">';
				      case 4:
				        return '<img src="/sites/default/files/new180218/rest/korp/preview/korp_5.jpg">';
				      case 5:
				        return '<img src="/sites/default/files/new180218/rest/korp/preview/korp_6.jpg">';
				      case 6:
				        return '<img src="/sites/default/files/new180218/rest/korp/preview/korp_7.jpg">';
				      case 7:
				        return '<img src="/sites/default/files/new180218/rest/korp/preview/korp_8.jpg">';
				    }
				}
			});

			var slider_mushrooms = $('#bxGalleryMushrooms').bxSlider({
				mode: 'fade',
				responsive: true,
			    touchEnabled: true,
			    pager: true,
				buildPager: function(slideIndex){
				    switch(slideIndex){
				      case 0:
				        return '<img src="/sites/default/files/restoran/svadba/thumb_svadba_0.png">';
				      case 1:
				        return '<img src="/sites/default/files/restoran/svadba/thumb_svadba_1.png">';
				      case 2:
				        return '<img src="/sites/default/files/restoran/svadba/thumb_svadba_2.png">';
				      case 3:
				        return '<img src="/sites/default/files/restoran/svadba/thumb_svadba_3.png">';
				      case 4:
				        return '<img src="/sites/default/files/restoran/svadba/thumb_svadba_4.png">';
				      case 5:
				        return '<img src="/sites/default/files/restoran/svadba/thumb_svadba_5.png">';
				      case 6:
				        return '<img src="/sites/default/files/restoran/svadba/thumb_svadba_6.png">';
				    }
				}
			});

			var slider_jeep_excurs = $('#bxGalleryJeepExcurs').bxSlider({
				mode: 'fade',
				responsive: true,
			    touchEnabled: true,
			    pager: true,
				buildPager: function(slideIndex){
				    switch(slideIndex){
				      case 0:
				        return '<img src="/sites/default/files/new180218/service/prev/katok1.jpg">';
				      case 1:
				        return '<img src="/sites/default/files/new180218/service/prev/katok2.jpg">';
				      case 2:
				        return '<img src="/sites/default/files/new180218/service/prev/katok3.jpg">';
				      case 3:
				        return '<img src="/sites/default/files/new180218/service/prev/katok4.jpg">';
				      case 4:
				        return '<img src="/sites/default/files/new180218/service/prev/katok5.jpg">';
				      case 5:
				        return '<img src="/sites/default/files/new180218/service/prev/katok6.jpg">';
				      case 6:
				        return '<img src="/sites/default/files/new180218/service/prev/katok7.jpg">';
				      case 7:
				        return '<img src="/sites/default/files/new180218/service/prev/katok8.jpg">';
				    }
				}
			});
		} else {
			var slider_svadba = $('#bxGallerySvadba').bxSlider({
				mode: 'fade',
				responsive: true,
			    touchEnabled: true,
			    pager: true,
				pagerType: 'short'
			});

			var slider_korp = $('#bxGalleryKorporative').bxSlider({
				mode: 'fade',
				responsive: true,
			    touchEnabled: true,
			    pager: true,
				pagerType: 'short'
			});

			var slider_mushrooms = $('#bxGalleryMushrooms').bxSlider({
				mode: 'fade',
				responsive: true,
			    touchEnabled: true,
			    pager: true,
				pagerType: 'short'
			});

			var slider_jeep_excurs = $('#bxGalleryJeepExcurs').bxSlider({
				mode: 'fade',
				responsive: true,
			    touchEnabled: true,
			    pager: true,
				pagerType: 'short'
			});
		}

		$('span#view_svadba').click(function(){
			setTimeout(function(){
				slider_svadba.reloadSlider();
			},200);
		});

		$('span#view_korporative').click(function(){
			setTimeout(function(){
				slider_korp.reloadSlider();
			},200);
		});

		$('span#view_mushrooms').click(function(){
			setTimeout(function(){
				slider_mushrooms.reloadSlider();
			},200);
		});

		$('span#view_jeep_excurs').click(function(){
			setTimeout(function(){
				slider_jeep_excurs.reloadSlider();
			},200);
		});

		/*******************************************************************/

		//$('.popup_box__form_phone').mask("+7 (999) 999-9999");

		var uri_page = location.pathname;
		var expr = new RegExp(uri_page, 'ig');

		$('.container_animal_menu > .animal_menu_links > li > a').each(function(){
			if(expr.test($(this).attr('href'))){
				$(this).addClass('active');
			}
		});
		
	});

	/*$('#edit-webform-ajax-submit-120').click(function(){
		setTimeout(function(){
			$('.popup_box__form_phone').mask("+7 (999) 999-9999");
		},200);
		//console.log('frorm click');
	});*/
	
	$('li#map').click(function(){
		//console.log($(this).attr('data-map'));

		if($(this).hasClass('active')){
			return false;
		} else {
			var data_map = $(this).attr('data-map');
			$('.container_map_hotel__switch li, img.mh_absolute').removeClass('active');
			$(this).addClass('active');
			$('img.mh_absolute.'+data_map).addClass('active');
		}
	});

	$('.switch_label').on('click',function(){
		//console.log('Click switch_label');
		if($(this).hasClass('active')){
			return false;
		} else {
			var switch_data = $(this).attr('data-switch');
			var data_block = $('.section_switch').parent();
			
			$('.switch_label').removeClass('active');
			$(this).addClass('active');
			
			if(data_block.hasClass('section_hotel')){
				$('.content_view').removeClass('active');
				data_block.find('#'+switch_data).addClass('active');

				cont_block = [];
				$('.container_options > div').each(function(){
					cont_block.push($(this).offset().top);
				});
			}

			if($('body').hasClass('page-articles') || $('body').hasClass('page-blog')){
				myAjaxNode($(this).attr('data-type'), $(this).attr('data-offset'));
				$('#read_more').attr('data-type',$(this).attr('data-type'));
			}
		}
	});

	window.onload = function(){

		var winW = $(window).width();
		var winH = $(window).height();

		news_height_h3();
		
		if(winW > 768){
			full_height_images();
		}

		if($('body').hasClass('front')){
			var cm_height = $('.container_main_head').height();
			var about_height = $('.container_about').innerHeight();
			if(winW > 1024) $('.section_about').css('margin-bottom',(cm_height - about_height)+'px');
			//console.log('cm_height = '+cm_height+'; about_height = '+about_height+'; c - a = '+(cm_height - about_height));
		}

		var srr;
		$('#rcPopupForm, #rcPopupFormFooter, span#view_svadba, span#view_korporative, span#view_mushrooms, span#view_jeep_excurs, #rcPopupFormFish').click(function() {
			var form_id = $(this).attr('id');
			//console.log(form_id);
			var form_data = $('#popup[data-modal='+form_id+']');

			$('body').addClass('modal-open');

			var os = 0;
			if (navigator.userAgent.indexOf ('Windows') != -1) os = 1;
			if (navigator.userAgent.indexOf ('Linux')!= -1) os = 2;
			if (navigator.userAgent.indexOf ('Mac')!= -1) os = 3;
			if (navigator.userAgent.indexOf ('FreeBSD')!= -1) os = 4;
			if(os != 1){
				$('body').addClass('apple');
			}
			form_data.fadeIn(200);

			//$('.menu_header').addClass('headerhidden');
			//form_data.css('display','block');
			form_data.addClass('in');
			//$('#popup_fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn();

			$(window).scroll(function(){
				srr = $(this).scrollTop();
			});
				
			$(window).trigger('scroll');
			
			if(winWidth > 1024){
				var sr_top = srr + 130;
			} else {
				var sr_top = srr + 10;
			}				

			//form_data.css('margin-top',sr_top+'px');
			//console.log(srr);

			if(!$(this).hasClass('request_call__button')){
				form_data.addClass('no_before_form');
			} else {
				form_data.removeClass('no_before_form');
			}

			/*if(winWidth >= 728){
				var popup_left_margin = (form_data.width() + 10) / 2;
				form_data.css('margin-left', -popup_left_margin);
			}*/
		});

		$('.popup_close').click(function() {
			$(this).parents('#popup').removeClass('in').delay(300).fadeOut(200);
			//$('#popup').css('display','none');
			setTimeout(function(){
				$('body').removeClass('modal-open');
			},220);
			return false;
		});

		/*form_data.mouseup(function (e) {
			if($(this).is('div')){
				var container = $(this).find('.popup_box');
			    if (container.has(e.target).length === 0){
			        $('.popup_close').trigger('click');
			    }
			}
		});*/

		$('.menu_header .menu_before').click(function(){
			$('.mb_menu').slideDown(300);
			//$(this).parents('.menu_header').addClass('headerhidden');
		});

		$('.mb_menu_close').click(function(){
			$('.mb_menu').slideUp(300);
			$('.menu_header').removeClass('headerhidden');
		});

		if(winW > 320){
			$('.control_prev_next').each(function(){
				var hight_gallery = $(this).parent().prev('.bx-wrapper').children().height();
				var result_gallery_pn_top = (hight_gallery - 52) / 2;
				$(this).children().css('top',result_gallery_pn_top+'px');
				console.log(hight_gallery+' t -> h '+result_gallery_pn_top);
			});
		}
		
	};

})(jQuery);