var img0 = false;
var img1 = false;
var img2 = false;
var stop = false;

window.onload = function() {
    // Preload images.
	images = new Array();
	images[0]="/wp-content/themes/wireload-02/images/quitet_logo.png";
	images[1]="/wp-content/themes/wireload-02/images/but.png";

	var imgsObjcs = new Array();
    for (i = 0; i < images.length; i++) {
		var imageObj = new Image();
    	imageObj.src = images[i];
		imgsObjcs[i] = imageObj;
    }

	setTimeout(function() {
		var t = 400;
		$("#macbook-glow-on").css('opacity', 0).show();
		$("#ps-left").css({opacity: 0}).show().animate({opacity: 1, top: 78}, t, 'swing');
		$("#macbook").css({opacity: 0}).show().animate({opacity: 1, top: -168}, t, 'swing', function() {
		    $("#macbook-glow-on").animate({opacity: 0.5}, t);
		});
		// Animate the shadow downwards instead so it looks like the MB and the shadow start
		// together and then separate, like if the MB is lifting up.
		$("#macbook-shadow").css({top: 397, opacity: 0}).animate({top: 427, opacity: 1}, t, 'swing');
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

	if ($.browser.msie && ($.browser.version == "7.0" || $.browser.version == "8.0")) {
		curItem.css("visibility", "hidden").hide(function() {
			bgs.eq(curIdx).animate({left: -946}, 750);
			bgs.eq(idx).animate({left: 0}, 750, function() {
				items.eq(idx).show().css("visibility", "visible");
				items.eq(idx).animate({top: 0}, t).addClass("cur");
				stop = false;
			});
		}).removeClass("cur");
	}
	else {
		curItem.fadeOut(300, function() {
			bgs.eq(curIdx).animate({left: -946}, 750, 'swing');
			bgs.eq(idx).animate({left: 0}, 750, function() {
			    items.eq(idx).css({opacity: 0}).show().animate({top: 0, opacity: 1}, t, 'swing').addClass("cur");
				stop = false;
			});
		}).removeClass("cur");
	}
}

function getFrame(element) {
    var rect = element.offset();
        rect.right = rect.left + element.width();
        rect.bottom = rect.top + element.height();
    return rect;
}

function inRect(point, rect) {
    return (point.x >= rect.left &&
        point.x < rect.right &&
        point.y >= rect.top &&
        point.y < rect.bottom);
}

function setSelectable(element, aFlag) {
    if (aFlag)
        element.removeClass('unselectable');
    else
        element.addClass('unselectable');
}

function initProductSlider() {
	var items = $("#ps-wrap .item"),
	    curItem = items.filter(".act"),
	    slState = $("#ps-selector").attr("class");

	$("#ps-controls li").click(function() {
		psSlide($("#ps-controls li").index(this));
	});

	var grabbed = false,
	    clickedBackground = false,
	    firstPos,
	    lastPos,
	    originalLeft;

    // Clicking the background (and not the knob) causes a slide.
	$("#ps-selector").mousedown(function(event) {
	    firstPos = { x: event.pageX, y: event.pageY };
        clickedBackground = true;
        // While the user is interacting with the toggle, don't select text.
        setSelectable($('body.quiet'), false);
	});

    // Clicking the knob enables it to be dragged around.
	$("#ps-selector div").mousedown(function(event) {
	    grabbed = true;
	    firstPos = {x: event.pageX, y: event.pageY};
	    lastPos = {x: event.pageX, y: event.pageY};
	    originalLeft = $("#ps-selector div").css('left').replace('px', '');
        // While the user is interacting with the toggle, don't select text.
        setSelectable($('body.quiet'), false);
	});

    // React to mouseup anywhere on the page in case the mouse slides off
    // the original click target.
	$("body.quiet").mouseup(function(event) {
        if (!grabbed && !clickedBackground)
            return;

        // The user is done interacting, allow text selection again.
        setSelectable($('body.quiet'), true);

        var endPos = {x: event.pageX, y: event.pageY};

        // Detect simple clicks on the background (outside of the knob).
	    if (clickedBackground && !grabbed)
	    {
	        clickedBackground = false;

	        var backRect = getFrame($("#ps-selector"));
            if (Math.abs(firstPos.x - endPos.x) < 3 &&
                Math.abs(firstPos.y - endPos.y) < 3 &&
                inRect(endPos, backRect))
            {
                changeState();
            }
	        return;
	    }

        // The end of click and drag of the knob.
	    grabbed = false;

        var knob = $("#ps-selector div"),
            left = knob.css('left').replace('px', '');

        lastPos = {x: event.pageX, y: event.pageY};

        var knobRect = getFrame(knob);

        // If the user just clicked and released, slide over.
        if (Math.abs(firstPos.x - endPos.x) < 3 &&
            Math.abs(firstPos.y - endPos.y) < 3 &&
            inRect(endPos, knobRect))
        {
            changeState();
        }
        // Otherwise check how far the knob was dragged.
        else if (originalLeft == 49 && left < 25)
            changeState();
        else if (originalLeft == 0 && left > 24)
            changeState();
        else if (left != originalLeft)
        	$("#ps-selector div").animate({left: originalLeft}, 200);

	});

	$("body.quiet").mousemove(function(event) {
	    if (!grabbed)
	        return;

        var endPos = { x: event.pageX, y: event.pageY },
            left = $("#ps-selector div").css('left').replace('px', ''),
	        dx = lastPos.x - endPos.x;
	    lastPos = { x: event.pageX, y: event.pageY };

	    left = left - dx;
	    if (left < 0)
	        left = 0;
	    if (left > 49)
	        left = 49;
	    $("#ps-selector div").css('left', left);
	});

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
			$(this).animate({top: 115}, 600, 'swing');
		});
		$("#macbook-shadow").animate({top: 432}, 300, 'swing', function() {
			$(this).animate({top: 427}, 600, 'swing');
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
			$("#macbook-glow-on").animate({opacity: 0.5}, 400);
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
			$("#macbook-glow-on").animate({opacity: 1}, 400);
		}
	}
}
