var img0 = false;
var img1 = false;
var img2 = false;
var stop = false;

window.onload = function() {

	images = new Array();
	images[0]="/images/quitet_logo.png";
	images[1]="/images/but.png";

	var imgsObjcs = new Array();
    for (i = 0; i < images.length; i++) {
		var imageObj = new Image();
    	imageObj.src = images[i];
		imgsObjcs[i] = imageObj;
    }

	setTimeout(function() {
		var t = 400;
		$("#ps-left").css({opacity: 0}).show().animate({opacity: 1, top: 78}, t, 'swing');
		$("#macbook").css({opacity: 0}).show().animate({opacity: 1, top: -168}, t, 'swing', function() { $("#macbook-glow-on").fadeIn(); });
		$(".ps-right-text:first-child").animate({top: 139, opacity: 1}, t, 'swing').addClass("prt-cur");
	}, 1000);
}

$(function() {
	var t = setInterval("slide()", 7000);
	$("#s-controls li").click(function() {
		if (!$(this).hasClass("active") && !stop) {
			clearInterval(t);
			slide($("#s-controls li").index(this))
		}
	});

	if ($("#prod-slider").length != 0) {
		initProductSlider();
	}

	$("#send-but").hover(
		function() {
			if (this.className != "sended") {
				$("#but").animate({top: -6}, 100);
			}
		},
		function() {
			if (this.className != "sended") {
				$("#but").animate({
					top: 0
				}, 100);
			}
		}
	);

});

function slide(i) {
	var items = $("#s-wrap .item");
	var curItem = items.filter(".cur");
	var bgs = $("#s-bgs .sbg");
	var curIdx = items.index(curItem);
	var idx;
	var t = 1000;

	stop = true;

	if (i || i == 0) {
		idx = i;
	}
	else {
		idx = items.index(curItem);
		if (idx < 2) {
			idx++;
		}
		else {
			idx = 0;
		}
	}

	$("#s-controls li").removeClass("active").eq(idx).addClass("active");

	bgs.eq(idx).css({left: 946});
	if (items.eq(idx).attr("id") == "sw-blotter") {
		items.eq(idx).css({top: 0});
		t = 1500;
	}
	else {
		items.eq(idx).css({top: -20});
		t = 1000;
	}
	curItem.animate({opacity: 0}, 300, function() {
		bgs.eq(curIdx).animate({left: -946}, 750);
		bgs.eq(idx).animate({left: 0}, 750, function() {
			items.eq(idx).animate({top: 0, opacity: 1}, t).addClass("cur");
			stop = false;
		});
	}).removeClass("cur");
}

function initProductSlider() {
	var items = $("#ps-wrap .item");
	var curItem = items.filter(".act");
	var slState = $("#ps-selector").attr("class");

	$("#ps-controls li").click(function() {
		psSlide($("#ps-controls li").index(this));
	});

	$("#ps-selector").click(changeState);

	function psSlide(i) {
		curItem = items.filter(".act");
		var idx;
		if (i || i == 0) {
			idx = i;
		}
		else {
			idx = items.index(curItem);
			if (idx < 2) {
				idx++;
			}
			else {
				idx = 0;
			}
		}

		$("#ps-controls li").removeClass("act").eq(idx).addClass("act");

		items.eq(idx).css({
			left: 411
		});
		$("#mb").animate({top: 95}, 300, 'swing', function() {
			$(this).animate({top: 115}, 600, 'swing')
		});
		$(".ps-right-text.prt-cur").animate({top: 144, opacity: 0}, 300, function() {
			$(".ps-right-text[rel='" + items.eq(idx).attr("rel") + "']").css({top: 159}).animate({top: 139, opacity: 1}, 400).addClass("prt-cur");
		}).removeClass("prt-cur");

		curItem.animate({left: -411}, 400).removeClass("act");
		items.eq(idx).animate({left: 0}, 400).addClass("act");

		if (slState == "on") {
			changeState();
		}

	}

	function changeState() {
		if (slState == "on") {
			slState = "off";
			$("#ps-selector div").animate({left: 0}, 400, function() {
				$("#macbook").attr("class", slState);
				$("#pss-lbl span").text("on");
				$("#ps-selector").attr("class", "on");
			});
			$("#ps-wrap .act img.on").fadeOut(400, function() {
				$("#ps-wrap .item:not('.act') img.on").hide();
			});
			$("#macbook-glow-on").fadeIn(400);
			$("#macbook-glow-off").fadeOut(400);
		}
		else {
			slState = "on";
			$("#ps-selector div").animate({left: 49}, 400, function() {
				$("#macbook").attr("class", slState);
				$("#pss-lbl span").text("off");
				$("#ps-selector").attr("class", "off");
			});
			$("#ps-wrap .act img.on").fadeIn(400, function() {
				$("#ps-wrap .item:not('.act') img.on").show();
			});
			$("#macbook-glow-on").fadeOut(400);
			$("#macbook-glow-off").fadeIn(400);
		}
	}
}
