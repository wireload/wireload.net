jQuery.fn.Gallery = (_options) ->
  
  # default options
  _options = jQuery.extend(
    speed: 800
    duration: 4000
    effect: "fade" #slide
    holder: ".holder"
    list: "li"
    prev: "a.prev"
    next: "a.next"
    vertical: false
    buttonsOnHover: false
    pager: "ul.switcher"
    circle: false
    infinitive: false
    waitActive: false
    pause: "a.pause"
    random: false
    IEversion: 7
  , _options)
  @each ->
    
    Run = (_a) ->
      _t = setTimeout(->
        if _random
          loop
            _i = Math.floor(Math.random() * _max)
            break unless _i is _a
          _a = _i
        else
          _a++
          _a = 0  if _a >= _max
        ChangeEl _a
      , _duration)
    ChangeEl = (_new) ->
      return  if _new is _old
      clearTimeout _t  if _t
      if _effect is "fade"
        if jQuery.browser.msie and jQuery.browser.version < _ieVersion
          _list.eq(_old).removeClass("active").hide()
          _list.eq(_new).addClass("active").show()
        else
          _list.eq(_old).removeClass("active").animate
            opacity: 0
          ,
            queue: false
            duration: _speed

          _list.eq(_new).addClass("active").animate
            opacity: 1
          ,
            queue: false
            duration: _speed

        _thumb.removeClass("active").eq(_new).addClass "active"
        _old = _new
        _a = _new
      if _effect is "slide"
        if _inf
          if _old is 0
            _left = 0  if _new is 1
            _left = _ws  if _new is _max - 1
            _slide.css _dir, -_left
          if _new is 0
            if _old is _max - 1
              _x = _ws
              _left = 0
            if _old is 1
              _x = 0
              _left = _ws
          else
            _x = _new * _d
          if _vert
            _slide.animate
              top: -_x
            ,
              queue: false
              duration: _speed
              complete: ->
                _list.removeClass("active").eq(_new).addClass "active"
                _thumb.removeClass("active").eq(_new).addClass "active"
                _slide.css _dir, -_left  if _new is 0
                _old = _new
                _a = _new

          else
            $(_prev).css "z-index", 0
            $(_next).css "z-index", 0
            _slide.animate
              left: -_x
            ,
              queue: false
              duration: _speed
              complete: ->
                $(_prev).css "z-index", 50
                $(_next).css "z-index", 50
                _list.removeClass("active").eq(_new).addClass "active"
                _thumb.removeClass("active").eq(_new).addClass "active"
                _slide.css _dir, -_left  if _new is 0
                _old = _new
                _a = _new

        else
          if _circle
            if _wait
              if _new <= _max - _vis
                _x = _new * _d
              else
                _x = (_max - _vis) * _d
            else
              _new = 0  if _new >= _max - _vis + 1
              _x = _new * _d
          else
            _next.removeClass "disabled"
            _prev.removeClass "disabled"
            if _wait
              if _new <= _max - _vis
                _x = _new * _d
              else
                _x = (_max - _vis) * _d
                _next.addClass "disabled"  if _new is _max - 1
            else
              if _new < _max - _vis
                _x = _new * _d
              else
                _x = (_max - _vis) * _d
                _new = _max - _vis
                _next.addClass "disabled"
            _prev.addClass "disabled"  if _new is 0
          _list.removeClass("active").eq(_new).addClass "active"
          _thumb.removeClass("active").eq(_new).addClass "active"
          if _vert
            _slide.animate
              top: -_x
            ,
              queue: false
              duration: _speed

          else
            _slide.animate
              left: -_x
            ,
              queue: false
              duration: _speed

          _old = _new
          _a = _new
      Run _new  if _f
    _hold = jQuery(this)
    _speed = _options.speed
    _duration = _options.duration
    _effect = _options.effect
    _holder = _hold.find(_options.holder)
    _slide = _holder.find("ul")
    _list = _slide.find(_options.list)
    _prev = _hold.find(_options.prev)
    _next = _hold.find(_options.next)
    _vert = _options.vertical
    _btn = _options.buttonsOnHover
    _switcher = _hold.find(_options.pager).empty()
    _pause = _hold.find(_options.pause)
    _circle = _options.circle
    _inf = _options.infinitive
    _wait = _options.waitActive
    _ieVersion = _options.IEversion
    _random = _options.random
    _f = true
    _max = _list.length
    _a = _list.index(_list.filter(".active:eq(0)"))
    _a = 0  if _a is -1
    _list.removeClass "active"
    if _btn
      _next.hide()
      _prev.hide()
      _hold.mouseenter(->
        _next.show()
        _prev.show()
      ).mouseleave ->
        _next.hide()
        _prev.hide()

    _new = undefined
    _old = _a
    _t = undefined
    _tr = undefined
    _i = undefined
    _left = undefined
    _list.each (i) ->
      $("<li><a href=\"#\">" + (i + 1) + "</a></li>").appendTo _switcher

    _thumb = _switcher.find("li")
    if _effect is "fade"
      _holder.addClass "plug-fade"
      if jQuery.browser.msie and jQuery.browser.version < _ieVersion
        _list.hide().eq(_a).show()
      else
        _list.show().css(opacity: 0).eq(_a).css opacity: 1
    if _effect is "slide"
      if _vert
        _holder.addClass "plug-Vslide"
      else
        _holder.addClass "plug-slide"
      _x = 0
      if _vert
        _dir = "top"
        _d = _list.eq(0).outerHeight(true)
        _vis = Math.ceil(_holder.height() / _d)
      else
        _dir = "left"
        _d = _list.eq(0).outerWidth(true)
        _vis = Math.ceil(_holder.width() / _d)
      _ws = _max * _d
      if _inf
        i = 0

        while i < _vis
          _list.eq(i).clone().appendTo _slide
          i++
      if not _inf and not _circle
        _f = false
        _prev.addClass "disabled"  if _a is 0
    _thumb.eq(_a).addClass "active"
    _list.eq(_a).addClass "active"
    Run _a  if _f
    _pause.mouseover(->
      _f = false
      clearTimeout _t
    ).mouseleave ->
      _f = true
      Run _a

    _thumb.click ->
      _a = _thumb.index($(this))
      ChangeEl _a
      false

    _next.click ->
      _a++
      if _a >= _max
        if _effect is "slide" and not _inf and not _circle
          _a--
        else
          _a = 0
      ChangeEl _a
      false

    _prev.click ->
      _a--
      if _a <= -1
        if _effect is "slide" and not _inf and not _circle
          _a++
        else
          _a = _max - 1
      ChangeEl _a
      false


$ ->
  browserCanAnimateOpacity = ->
    not ($.browser.msie and ($.browser.version is "7.0" or $.browser.version is "8.0"))

  getFrame = (element) ->
    rect = element.offset()
    rect.right = rect.left + element.width()
    rect.bottom = rect.top + element.height()
    rect

  inRect = (point, rect) ->
    point.x >= rect.left and point.x < rect.right and point.y >= rect.top and point.y < rect.bottom

  setSelectable = (element, aFlag) ->
    if aFlag
      element.removeClass "unselectable"
    else
      element.addClass "unselectable"

  stop = false
  slide = (i) ->
    items = $("#s-wrap .item")
    curItem = items.filter(".cur")
    bgs = $("#s-bgs > div")
    curIdx = items.index(curItem)
    idx = undefined
    t = 1000
    stop = true
    if i or i is 0
      idx = i
    else
      idx = items.index(curItem)
      if idx < 2
        idx++
      else
        idx = 0
    $("#s-controls li").removeClass("active").eq(idx).addClass "active"
    bgs.eq(idx).css left: 946
    unless items.eq(idx).hasClass("slide")
      items.eq(idx).css top: 0
      t = 1500
    else
      items.eq(idx).css top: -20
      t = 800
    unless browserCanAnimateOpacity()
      curItem.css("visibility", "hidden").hide(->
        bgs.eq(curIdx).animate
          left: -946
        , 750
        bgs.eq(idx).animate
          left: 0
        , 750, ->
          items.eq(idx).show().css "visibility", "visible"
          items.eq(idx).animate(
            top: 0
          , t).addClass "cur"
          stop = false

      ).removeClass "cur"
    else
      curItem.fadeOut(300, ->
        bgs.eq(curIdx).animate
          left: -946
        , 750, "swing"
        bgs.eq(idx).animate
          left: 0
        , 750, ->
          items.eq(idx).css(opacity: 0).show().animate(
            top: 0
            opacity: 1
          , t, "swing").addClass "cur"
          stop = false

      ).removeClass "cur"

  initProductSlider = ->
    # Clicking the background (and not the knob) causes a slide.
    # While the user is interacting with the toggle, don't select text.
    # Clicking the knob enables it to be dragged around.
    # While the user is interacting with the toggle, don't select text.
    # React to mouseup anywhere on the page in case the mouse slides off
    # the original click target.

    # The user is done interacting, allow text selection again.
    # Detect simple clicks on the background (outside of the knob).
    # The end of click and drag of the knob.
    # If the user just clicked and released, slide over.
    # Otherwise check how far the knob was dragged.

    psSlide = (i) ->
      curItem = items.filter(".act")
      idx = undefined
      if i or i is 0
        idx = i
      else
        idx = items.index(curItem)
        if idx < 2
          idx++
        else
          idx = 0
      $("#ps-controls li").removeClass("act").eq(idx).addClass "act"
      items.eq(idx).css left: 411
      $("#mb").animate
        top: 95
      , 300, "swing", ->
        $(this).animate
          top: 115
        , 600, "swing"

      $("#macbook-shadow").animate
        top: 432
      , 300, "swing", ->
        $(this).animate
          top: 427
        , 600, "swing"

      if browserCanAnimateOpacity()
        $(".ps-right-text.prt-cur").animate(
          top: 144
          opacity: 0
        , 300, ->
          $(".ps-right-text[rel='" + items.eq(idx).attr("rel") + "']").css(
            top: 159
            visibility: "visible"
            opacity: 0
          ).animate(
            top: 139
            opacity: 1
          , 400).addClass "prt-cur"
        ).removeClass "prt-cur"
      else
        $(".ps-right-text.prt-cur").animate(
          top: 144
        , 300).fadeOut(300, ->
          $(".ps-right-text[rel='" + items.eq(idx).attr("rel") + "']").css(
            top: 159
            visibility: "visible"
          ).fadeIn(300).animate(
            top: 139
          , 400).addClass "prt-cur"
        ).removeClass "prt-cur"
      curItem.animate(
        left: -411
      , 400).removeClass "act"
      items.eq(idx).animate(
        left: 0
      , 400).addClass "act"
      changeState()  if slState is "on"

    slState = $("#ps-selector").attr("class")
    changeState = ->
      if slState is "on"
        slState = "off"
        $("#ps-selector div").animate
          left: 0
        , 400, ->
          $("#macbook").attr "class", slState
          $("#pss-lbl span").text "on"
          $("#ps-selector").attr "class", "on"

        $("#ps-wrap .act img.on").fadeOut 400, ->
          $("#ps-wrap .item:not('.act') img.on").hide()

        if browserCanAnimateOpacity()
          $("#macbook-glow-on").animate
            opacity: 0.5
          , 400
        else
          $("#macbook-glow-on").hide()
      else
        slState = "on"
        $("#ps-selector div").animate
          left: 49
        , 400, ->
          $("#macbook").attr "class", slState
          $("#pss-lbl span").text "off"
          $("#ps-selector").attr "class", "off"

        $("#ps-wrap .act img.on").fadeIn 400, ->
          $("#ps-wrap .item:not('.act') img.on").show()

        if browserCanAnimateOpacity()
          $("#macbook-glow-on").animate
            opacity: 1
          , 400
        else
          $("#macbook-glow-on").show()
          
    items = $("#ps-wrap .item")
    curItem = items.filter(".act")
    $("#ps-controls li").click ->
      psSlide $("#ps-controls li").index(this)

    grabbed = false
    clickedBackground = false
    firstPos = undefined
    lastPos = undefined
    originalLeft = undefined
    $("#ps-selector").mousedown (event) ->
      firstPos =
        x: event.pageX
        y: event.pageY

      clickedBackground = true
      setSelectable $("body.folder-products-quiet"), false

    $("#ps-selector div").mousedown (event) ->
      grabbed = true
      firstPos =
        x: event.pageX
        y: event.pageY

      lastPos =
        x: event.pageX
        y: event.pageY

      originalLeft = $("#ps-selector div").css("left").replace("px", "")
      setSelectable $("body.folder-products-quiet"), false

    $("body.folder-products-quiet").mouseup (event) ->
      return if not grabbed and not clickedBackground
      setSelectable $("body.folder-products-quiet"), true
      endPos =
        x: event.pageX
        y: event.pageY

      if clickedBackground and not grabbed
        clickedBackground = false
        backRect = getFrame($("#ps-selector"))
        changeState() if Math.abs(firstPos.x - endPos.x) < 3 and Math.abs(firstPos.y - endPos.y) < 3 and inRect(endPos, backRect)
        return
      grabbed = false
      knob = $("#ps-selector div")
      left = knob.css("left").replace("px", "")
      lastPos =
        x: event.pageX
        y: event.pageY

      knobRect = getFrame(knob)
      if Math.abs(firstPos.x - endPos.x) < 3 and Math.abs(firstPos.y - endPos.y) < 3 and inRect(endPos, knobRect)
        changeState()
      else if originalLeft is 49 and left < 25
        changeState()
      else if originalLeft is 0 and left > 24
        changeState()
      else unless left is originalLeft
        $("#ps-selector div").animate
          left: originalLeft
        , 200

    $("body.folder-products-quiet").mousemove (event) ->
      return  unless grabbed
      endPos =
        x: event.pageX
        y: event.pageY

      left = $("#ps-selector div").css("left").replace("px", "")
      dx = lastPos.x - endPos.x
      lastPos =
        x: event.pageX
        y: event.pageY

      left = left - dx
      left = 0  if left < 0
      left = 49  if left > 49
      $("#ps-selector div").css "left", left

  setupQuiet = ->
    images = new Array()
    images[0] = "/images/quitet_logo.png"
    images[1] = "/images/but.png"
    imgsObjcs = new Array()
    i = 0
    while i < images.length
      imageObj = new Image()
      imageObj.src = images[i]
      imgsObjcs[i] = imageObj
      i++
    setTimeout (->
      t = 400
      $(".ps-right-text:first-child").addClass "prt-cur"
      if browserCanAnimateOpacity()
        $("#macbook-glow-on").css("opacity", 0).show()
        $("#ps-left").css(opacity: 0).show().animate
          opacity: 1
          top: 78
        , t, "swing"
        $("#macbook").css(opacity: 0).show().animate
          opacity: 1
          top: -168
        , t, "swing", ->
          $("#macbook-glow-on").animate
            opacity: 0.5
          , t

        $("#macbook-shadow").css(
          top: 397
          opacity: 0
        ).animate
          top: 427
          opacity: 1
        , t, "swing"
        $(".ps-right-text.prt-cur").css(
          visibility: "visible"
          opacity: 0
        ).animate
          top: 139
          opacity: 1
        , t, "swing"
      else
        $("#ps-left").show()
        $("#macbook").show().animate
          top: -168
        , t, "swing", ->
          $("#macbook-glow-on").hide()

        $("#macbook-shadow").css(top: 427).show()
        $(".ps-right-text.prt-cur").css(visibility: "visible").show().animate
          top: 139
        , t, "swing"
    ), 1000

  t = setInterval(slide, 7000)
  $("#s-controls li").click ->
    if not $(this).hasClass("active") and not stop
      clearInterval t
      slide $("#s-controls li").index(this)

  initProductSlider() if $("#prod-slider").length
  setupQuiet() if $("body.folder-products-quiet").length

  $("#send-but").hover (->
    unless @className is "sended"
      $("#but").animate
        top: -6
      , 100
  ), ->
    unless @className is "sended"
      $("#but").animate
        top: 0
      , 100

  $(".gallery-box").Gallery
    speed: 800
    duration: 10000
    effect: "slide"
    infinitive: true
    holder: ".gallery"
    pager: "ul.paging"
    pause: "ul.gallery-list"



