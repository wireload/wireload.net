$(document).ready(function(){
	InitGallery();
});
function InitGallery(){
	$('.gallery-box').Gallery({
		speed: 800,
		duration: 10000,
		effect: 'slide',
		infinitive: true,
		holder: '.gallery',
		pager: 'ul.paging',
		pause: 'ul.gallery-list'
	});
};
jQuery.fn.Gallery = function(_options){
	// default options
	var _options = jQuery.extend({
		speed: 800,
		duration: 4000,
		effect: 'fade', //slide
		holder: '.holder',
		list: 'li',
		prev: 'a.prev',
		next: 'a.next',
		vertical: false,
		buttonsOnHover: false,
		pager: 'ul.switcher',
		circle: false,
		infinitive: false,
		waitActive: false,
		pause: 'a.pause',
		random: false,
		IEversion: 7
	},_options);

	return this.each(function(){
//--input--------------------------------------------------------------------------------//
		var _hold = jQuery(this);
		var _speed = _options.speed;
		var _duration = _options.duration;
		var _effect = _options.effect;
		var _holder = _hold.find(_options.holder);
		var _slide = _holder.find('ul');
		var _list = _slide.find(_options.list);
		var _prev = _hold.find(_options.prev);
		var _next = _hold.find(_options.next);
		var _vert = _options.vertical;
		var _btn = _options.buttonsOnHover;
		var _switcher = _hold.find(_options.pager).empty();
		var _pause = _hold.find(_options.pause);
		var _circle = _options.circle;
		var _inf = _options.infinitive;
		var _wait = _options.waitActive;
		var _ieVersion = _options.IEversion;
		var _random = _options.random;
		var _f = true;
		var _max = _list.length;
		var _a = _list.index(_list.filter('.active:eq(0)'));
		if (_a == -1) {_a = 0};
		_list.removeClass('active');
		if (_btn){
			_next.hide();_prev.hide();
			_hold.mouseenter(function(){
				_next.show();_prev.show();
			}).mouseleave(function(){
				_next.hide();_prev.hide();
			})
		}
		var _new, _old = _a, _t, _tr, _i, _left;
	//--------CREATING THUMBNAILS----------//
		_list.each(function(i){
			$('<li><a href="#">'+(i+1)+'</a></li>').appendTo(_switcher);
		});
		var _thumb = _switcher.find('li');
	//-------------------------------------//
		if (_effect == 'fade') {
			_holder.addClass('plug-fade');
			if (jQuery.browser.msie && jQuery.browser.version < _ieVersion){	_list.hide().eq(_a).show();
			}else{	_list.show().css({opacity:0}).eq(_a).css({opacity:1});	}
		}
		if (_effect == 'slide') {
			if (_vert){_holder.addClass('plug-Vslide');
			}else{_holder.addClass('plug-slide');}
			var _x = 0;
			if (_vert){var _dir = 'top'; //var _dirVar = '_top'
				var _d = _list.eq(0).outerHeight(true);
				var _vis = Math.ceil(_holder.height()/_d);
			}else{var _dir = 'left'
				var _d = _list.eq(0).outerWidth(true);
				var _vis = Math.ceil(_holder.width()/_d);
			}

			var _ws = _max*_d;
			if (_inf){
				for	(var i=0; i < _vis; i++){	_list.eq(i).clone().appendTo(_slide);	};
			};
			if (!_inf && !_circle) {_f = false;if (_a == 0) {_prev.addClass('disabled')};}
		}
		_thumb.eq(_a).addClass('active');	_list.eq(_a).addClass('active');

//--functions-----------------------------------------------------------------------------------//
		if (_f) Run(_a);
		function Run(_a){
			_t = setTimeout(function(){
				if(_random){
					do {_i = Math.floor(Math.random()*_max)}
					while (_i == _a);
					_a = _i;
				}else{
					_a++; if (_a >= _max){_a = 0}
				}
				ChangeEl(_a);
			}, _duration);
		};
		function ChangeEl(_new){
		    if (_new === _old)
		        return;
			if(_t) clearTimeout(_t);
			if (_effect == 'fade'){
				if(jQuery.browser.msie && jQuery.browser.version < _ieVersion){
					_list.eq(_old).removeClass('active').hide();
					_list.eq(_new).addClass('active').show();
				}else{
					_list.eq(_old).removeClass('active').animate({opacity:0}, {queue:false, duration:_speed});
					_list.eq(_new).addClass('active').animate({opacity:1}, {queue:false, duration:_speed});
				}
				_thumb.removeClass('active').eq(_new).addClass('active');
				_old = _new;_a = _new;
			}if (_effect == 'slide') {
				if (_inf){
					if (_old == 0) {
						if (_new == 1) {_left = 0}
						if (_new == _max - 1) {_left = _ws}
						_slide.css(_dir, -_left);
					}
					if (_new == 0) {
						if (_old == _max - 1) {_x = _ws; _left = 0}
						if (_old == 1) {_x = 0; _left = _ws}
					}else { _x = _new*_d; }
					if (_vert){
						_slide.animate({top: -_x}, {queue:false, duration:_speed, complete:function(){
							_list.removeClass('active').eq(_new).addClass('active');
							_thumb.removeClass('active').eq(_new).addClass('active');
							if (_new == 0) { _slide.css(_dir, -_left); }
							_old = _new;_a = _new;
						}});
					}else{
					    $(_prev).css('z-index', 0);
					    $(_next).css('z-index', 0);
						_slide.animate({left: -_x}, {queue:false, duration:_speed, complete:function(){
    					    $(_prev).css('z-index', 50);
    					    $(_next).css('z-index', 50);
							_list.removeClass('active').eq(_new).addClass('active');
							_thumb.removeClass('active').eq(_new).addClass('active');
							if (_new == 0) { _slide.css(_dir, -_left); }
							_old = _new;_a = _new;
						}});
					}
				}else{
					if (_circle){
						if (_wait){
							if (_new <= _max - _vis){_x = _new*_d;}
							else{_x = (_max - _vis)*_d;}
						}else{
							if (_new >= _max - _vis +1){_new = 0;};
							_x = _new*_d;
						}
					}else{
						_next.removeClass('disabled');
						_prev.removeClass('disabled');
						if (_wait){
							if (_new <= _max - _vis){ _x = _new*_d;
							}else{
								_x = (_max - _vis)*_d;
								if ( _new == _max - 1){_next.addClass('disabled');}
							}
						}else{
							if (_new < _max - _vis){ _x = _new*_d;
							}else{
								_x = (_max - _vis)*_d; _new = _max - _vis;
								_next.addClass('disabled');
							}
						}
						if (_new == 0){ _prev.addClass('disabled'); }
					}
					_list.removeClass('active').eq(_new).addClass('active');
					_thumb.removeClass('active').eq(_new).addClass('active');
					if(_vert){	_slide.animate({top: -_x}, {queue:false, duration:_speed});
					}else{_slide.animate({left: -_x}, {queue:false, duration:_speed});}
					_old = _new;_a = _new;
				}
			}
			if (_f){Run(_new);}
		};
		_pause.mouseover(function(){
				_f = false;
				clearTimeout(_t);
		}).mouseleave(function(){
				_f = true;
				Run(_a);
		});
		_thumb.click(function(){
			_a = _thumb.index($(this));
			ChangeEl(_a);
			return false;
		});
		_next.click(function(){
			_a++;
			if (_a >= _max){
				if (_effect == 'slide' && !_inf && !_circle) {
					_a--;
				}else{_a = 0;}
			}
			ChangeEl(_a);
			return false;
		});
		_prev.click(function(){
			_a--;
			if (_a <= -1){
				if (_effect == 'slide' && !_inf && !_circle) {
					_a++;
				}else{_a = _max-1}
			}
			ChangeEl(_a);
			return false;
		});
	});
};