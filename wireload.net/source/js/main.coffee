$ ->
  # Preload images.

  # Animate the shadow downwards instead so it looks like the MB and the shadow start
  # together and then separate, like if the MB is lifting up.

  # Simplified code for IE only.
  browserCanAnimateOpacity = ->
    not ($.browser.msie and ($.browser.version is "7.0" or $.browser.version is "8.0"))
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
    slState = $("#ps-selector").attr("class")
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
      return  if not grabbed and not clickedBackground
      setSelectable $("body.folder-products-quiet"), true
      endPos =
        x: event.pageX
        y: event.pageY

      if clickedBackground and not grabbed
        clickedBackground = false
        backRect = getFrame($("#ps-selector"))
        changeState()  if Math.abs(firstPos.x - endPos.x) < 3 and Math.abs(firstPos.y - endPos.y) < 3 and inRect(endPos, backRect)
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

  img0 = false
  img1 = false
  img2 = false
  stop = false
  window.onload = ->
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

  initProductSlider()  unless $("#prod-slider").length is 0
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

