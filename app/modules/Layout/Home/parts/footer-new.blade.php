<!-- Booking ends -->
<div class="clearfix"></div>

<script type="text/javascript" src="{{ asset('js/cycle.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function (e) {

        $("#in_start_time").val($("#timestart").val());
        $("#in_start_ampm").val($("#timestart_am_pm").val());
        $("#out_start_time").val($("#timeend").val());
        $("#out_start_ampm").val($("#timeend_am_pm").val());

        setInterval(function () {
            $("#indate").val($('#dpd1').val());
            $("#outdate").val($('#dpd2').val());
        }, 500);


        $(document).on("change", "#timestart", function () {
            $("#in_start_time").val($(this).val());
            $('#start_ampm').select2('open');
        });

        $(document).on("change", "#timestart_am_pm", function () {
            $("#in_start_ampm").val($(this).val());
            $('#dpd2').focus();
        });

        $(document).on("change", "#timeend", function () {
            $("#out_start_time").val($(this).val());
            $('#end_ampm').select2('open');
        });

        $(document).on("change", "#timeend_am_pm", function () {
            $("#out_start_ampm").val($(this).val());
            $('#guest').focus();
            setTimeout(function () {
                $("input#guest")[0].focus();
            }, 100);
        });

        $(document).on("click", "#select2-start_time-results .select2-results__option", function () {
            ('#start_ampm').select2('open');
        });

        $('#cbox1').cycle({
            fx: 'scrollDown',
            speed: 500,
            timeout: 4000,
            pause: true,
        });
        $('#cbox2').cycle({
            fx: 'scrollLeft',
            speed: 500,
            timeout: 6000,
            pause: true,
        });
        $('#cbox3').cycle({
            fx: 'scrollUp',
            speed: 500,
            timeout: 8000,
            pause: true,
        });
        $('#cbox4').cycle({
            fx: 'scrollUp',
            speed: 500,
            timeout: 4000,
            pause: true,
        });
        $('#cbox5').cycle({
            fx: 'scrollRight',
            speed: 500,
            timeout: 6000,
            pause: true,
        });
        $('#cbox6').cycle({
            fx: 'scrollDown',
            speed: 500,
            timeout: 8000,
            pause: true,
        });

    });
</script>
<!-- Ends -->

<!-- Date range picker ends -->
<script type="text/javascript">
    $(document).ready(function (e) {
        //map mobile click
        function viewport() {
            var e = window, a = 'inner';
            if (!('innerWidth' in window)) {
                a = 'client';
                e = document.documentElement || document.body;
            }
            return {
                width: e[a + 'Width'],
                height: e[a + 'Height']
            };
        }


        $(document).on('click', '.indexheaderwrper .menu li.has-submenu>a', function () {
            var w = viewport();
            if (w.width < 992) {
                $(this).closest('li').find('.sub-menu').slideToggle();
                $(this).closest('li').toggleClass('open');
            }
        });
        $(document).on('click', '.indexheaderwrper .responsivehomebtn', function () {
            $('.indexheaderwrper .menu').slideToggle();
        });
        $(document).on('click', '.tabsproperty .tabs a', function () {
            var id = $(this).attr('data-id');
            $('.tabsproperty .tabcontainer .tabwrapper').hide();
            $('.tabsproperty .tabcontainer #' + id).show();
            $('.tabsproperty .tabs a').removeClass('active')
            $(this).addClass('active');
        });
        var id = $('.tabsproperty .tabs a.active').attr('data-id');
        $('.tabsproperty .tabcontainer .tabwrapper').hide();
        $('.tabsproperty .tabcontainer #' + id).show();

        // footer fixed
        var windowwidth = $(window).width();
        var footerheight = $('.fulfooter').outerHeight(true);
        if (windowwidth > 1000) {
            $('.footergap').css({
                "height": footerheight
            });
        } else {
            $('.footergap').css({
                "height": 0
            });
        }
        $(window).resize(function () {

            var windowwidth = $(window).width();
            var footerheight = $('.fulfooter').outerHeight(true);
            if (windowwidth > 1000) {
                $('.footergap').css({
                    "height": footerheight
                });
            } else {
                $('.footergap').css({
                    "height": 0
                });
            }

        });
    });

</script>

<!-- Footer section -->
<script type="text/javascript" src="js/common.js"></script>

<div class="clearfix"></div>

<script type="text/javascript">
    $(document).ready(function (e) {

        $('.myacounthover').hover(function () {

            $(this).children('.myacountdropdown').stop().fadeIn(200);

        }, function () {
            $(this).children('.myacountdropdown ').stop().fadeOut(200);
        });

        // RESPONSIVE MENU Starts

        var menucontent = $('.rightmenu').html();
        // main menu's Html

        $('.responsive_menulist').html(menucontent);
        // adding main menu to responsive menu

        // if width > 1000px responsive menu and close btn Hide Starts

        // if width > 1000px responsive menu and close btn Hide Ends

        $('.responsivebtn').click(function (e) {
            $(this).toggleClass("active");
            $('.responsive_menulist').fadeToggle(200);
            //$('.responsive_menulist').toggle( "drop", { direction: "right" }, 200);
        });

        $('.responsivebtn, .responsive_menulist').click(function (event) {
            event.stopPropagation();

        });
        $(document).click(function (e) {
            $('.responsivebtn').removeClass("active");
            $('.responsive_menulist').fadeOut(200);
        });

        // Sub Menu showing in Responsive menu
        $(".responsive_menulist .myacounthover").click(function () {

            $(this).children('.responsive_menulist .myacountdropdown ').slideToggle(200);
        });

        // Sub Menu showing in Responsive menu	 Ends

        // RESPONSIVE MENU ENDS

    });

</script>
<script type="text/javascript" src="js/signinpopup.js"></script>

<!-- Menu ends -->


<script src="libs/lazy-load/intersection-observer.js"></script>
<script async src="libs/lazy-load/lazyload.min.js"></script>
<script>
    // Set the options to make LazyLoad self-initialize
    window.lazyLoadOptions = {
        elements_selector: ".lazy",
        // ... more custom settings?
    };

    // Listen to the initialization event and get the instance of LazyLoad
    window.addEventListener('LazyLoad::Initialized', function (event) {
        window.lazyLoadInstance = event.detail.instance;
    }, false);


</script>


<script src="libs/lodash.min.js"></script>
<script src="libs/jquery-3.3.1.min.js"></script>

<script src="libs/vue/vue.js"></script>
<script src="libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="libs/bootbox/bootbox.min.js"></script>
<script src="libs/carousel-2/owl.carousel.min.js"></script>
<script type="text/javascript" src="libs/daterange/moment.min.js"></script>
<script type="text/javascript" src="libs/daterange/daterangepicker.min.js"></script>
<script src="libs/select2/js/select2.min.js"></script>
<script src="js/functions.js"></script>

<script
    src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCRu_qlT0HNjPcs45NXXiOSMd3btAUduSc&libraries=places'></script>
<script src='https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js'></script>
<script src='http://ss22001.mybackpocket.co/libs/infobox.js'></script>
<script src='http://ss22001.mybackpocket.co/module/core/js/map-engine.js?_ver=2.2.2'></script>
<script src="libs/pusher.min.js"></script>
<script src="js/home.js"></script>

<script type="text/javascript" src="libs/ion_rangeslider/js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="libs/fotorama/fotorama.js"></script>
<script type="text/javascript" src="libs/sticky/jquery.sticky.js"></script>
<script type="text/javascript" src="js/single-space.js"></script>

<script src="libs/toastr/toastr.min.js"></script>


<!-- animation and select -->
<script type="text/javascript" src="js/animate/animate.js"></script>
<script type="text/javascript" src="js/animate/wow.js"></script>
<script type="text/javascript" src="js/select2.js"></script>
<script type="text/javascript">
    $(document).ready(function (e) {

        $(".formselect").select2();

        $(".selectsearch, .footerselect").select2();

        wow = new WOW({
            animateClass: 'animated',
            mobile: false,

            offset: 100
        });
        wow.init();
        // slect style

    });
</script>
<script type="text/javascript">
    $(document).ready(function (e) {
        $(".detailschkin, .w_privcyslect").select2();

        $(".wishlistselect").select2();

        // create category

        $('.createnew_wclick').click(function (e) {
            $('.cratewinput').fadeToggle(200);
        });

        // wishlist fadeIn

        $('.wishlistclose').click(function (e) {
            $('.wishlistouter, .overlayb').fadeOut(200);
        });
        $(document).click(function (e) {
            $('.wishlistouter, .overlayb').fadeOut(200);
        });
        $('.lobox, .wishlistopen').click(function (event) {
            event.stopPropagation();
        });

        // contact host section

        $('.contacthostopen').click(function (e) {

            var userloginstat = '0';

            if (userloginstat == 0) {
                $(".signinbtn").click();
                return false;

            }
            $('.conacthostouter, .overlayContact').fadeIn(200);
        });
        $('.conacthostclose ').click(function (e) {
            $('.conacthostouter, .overlayContact').fadeOut(200);
        });


        $('#openCalendar').click(function (e) {
            $('.calendarview, .overlayContact').fadeIn(200);

            setTimeout(function () {
                if ($("#calendar").hasClass("isLoading")) {
                    $("#calendar").html("");
                    initCalendar();
                    $("#calendar").removeClass("isLoading");
                }
            }, 2000);

        });
        $('.openCalendarClose').click(function (e) {
            $('.calendarview, .overlayContact').fadeOut(200);
        });


    });

</script>
<script type="text/javascript" src="js/datepikernew.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('#tempsend').hide();
        $('#tempmsg').show();
        $('#tempeff').hide();
        $('#temperror').show();
        var today = new Date();
        var dd = today.getDate() + 1;
        var mm = today.getMonth() + 1;
        //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd
        }

        if (mm < 10) {
            mm = '0' + mm
        }

        today = mm + '/' + dd + '/' + yyyy;
        var temp = '';
        // alert(temp);

        var blockedarray = temp.split('#');

        // alert(blockedarray);
        $('.input-daterange').datepicker({
            clearBtn: true,
            autoclose: true,
            startDate: '+0d'
        });

        $("#accounmentationGuests").on("keyup", function () {
            getPricingOfListing();
        });

        function getPricingOfListing() {

            $("#temperror").show().html("");
            //validate guest count
            var maxiGuestAllo = 1;
            maxiGuestAllo = maxiGuestAllo * 1;


            var fromval = $('#dpd1x1').val();
            var toval = $('#dpd2x2').val();
            $('#listselprice').hide();
            if (fromval == toval && fromval != "" && toval != "") {
                //$('#dpd2x2').focus();

            }

            var flag = 0;
            if (fromval != "") {

                var fromtimestamp = new Date(fromval).getTime();

            } else {

                flag = 4;
            }
            if (toval != "") {

                var totimestamp = new Date(toval).getTime();

            } else {

                flag = 4;
            }
            var tdaytimestamp = new Date(today).getTime();

            /*if (totimestamp == fromtimestamp) {
					flag = 2;

				}*/

            var fromvalnew = $('#dpd1x1').val();
            var tovalnew = $('#dpd2x2').val();
            var newtimestampfrom = new Date(fromvalnew).getTime();
            var newtimestampto = new Date(tovalnew).getTime();
            var requestGutestor = $("#accounmentationGuests").val();
            requestGutestor = requestGutestor * 1;
            var guestselect = requestGutestor;
            if (requestGutestor > maxiGuestAllo) {
                $("#tempeff").hide();
                $("#temperror").show().html("Maximum number of guests allowed are " + maxiGuestAllo + ".");
                return false;
            } else if (flag == 1) {
                $('#tempeff').hide();
                $('#msgx').html('Those dates are not available');
                //alert('Those dates are not available');
                $('#temperror').show();
                //$('#dpd1x1').focus();
            } else if (flag == 2) {
                $('#tempeff').hide();
                $('#msgx').html('Check In and Check Out Cannot be on Same Day');
                $('#temperror').show();
                $('#dpd2x2').trigger("click");

            } else if (flag == 4) {
                $('#tempeff').hide();
                $('#msgx').html('Select a Check In and Check out date');
                $('#temperror').show();

            } else {

                var listid = "12722";
                //	var loguserid="{$loguserid}";
                var hourprice = "0";
                var dayprice = "25";
                var weekprice = "55";
                var monthprice = "100";


                var start_time = $("#start_time").val();
                var start_ampm = $("#start_ampm").val();
                var end_time = $("#end_time").val();
                var end_ampm = $("#end_ampm").val();


                var time_array = [{
                    url: window.location.href,
                    'indate': fromvalnew,
                    'outdate': tovalnew,
                    'in_start_time': start_time,
                    'in_start_ampm': start_ampm,
                    'out_start_time': end_time,
                    'out_start_ampm': end_ampm,
                    'guestselect': guestselect
                }];
                localStorage.setItem('time_array', JSON.stringify(time_array));


                $('#tempeff').hide();
                $('#listselprice').hide();
                $('#loading-image').show();
                $.ajax({

                    type: "POST",
                    cache: false,

                    url: "http://mofront.myoffice.ca/index.php?page=rental/listpriceset",

                    data: {
                        'fromdate': fromvalnew,
                        'todate': tovalnew,
                        'listid': listid,
                        'hourprice': hourprice,
                        'dayprice': dayprice,
                        'weekprice': weekprice,
                        'monthprice': monthprice,
                        'start_time': start_time,
                        'start_ampm': start_ampm,
                        'end_time': end_time,
                        'end_ampm': end_ampm
                    },

                    success: function (data) {
                        //alert(data);
                        var requestGutestor = $("#accounmentationGuests").val();
                        requestGutestor = requestGutestor * 1;
                        if (requestGutestor > maxiGuestAllo) {
                            $("#tempeff").hide();
                            $("#temperror").show().html("Maximum number of guests allowed are " + maxiGuestAllo + ".");
                            return false;
                        } else if ($.trim(data) == "dayblocked") {
                            $("#tempeff").hide();
                            $("#temperror").show().html("Selected timing is not Available. Check Availablity Calendar for More Information");
                        } else if ($.trim(data) == "pasttime") {
                            $("#tempeff").hide();
                            $("#temperror").show().html("Time should be greater than now.");
                        } else if ($.trim(data) == "checktime") {
                            $("#tempeff").hide();
                            $("#temperror").show().html("In-Valid Timings");
                        } else if ($.trim(data) == "sometimeblockbetween") {
                            $("#tempeff").hide();
                            $("#temperror").show().html("Some Hours are not Available in Selected Timing. Check Availablity Calendar for More Information");
                        } else if ($.trim(data) == "sometimeresevered") {
                            $("#tempeff").hide();
                            $("#temperror").show().html("Some Hours are already booked between Selected Timing. Check Availablity Calendar for More Information");
                        } else {

                            $('#listselprice').html("");
                            //alert(data);
                            $('#listselprice').html(data);
                            $('#listselprice').show();
                            $('#tempeff').show();
                            $("#temperror").hide().html("");
                        }

                    },
                    complete: function () {
                        $('#loading-image').hide();
                    }
                });

            }


        }


        $(document).on("change", "#start_time,#start_ampm,#end_time,#end_ampm", function () {
            getPricingOfListing();
        })


        $('.input-daterange input').each(function () {
            $(this).on('changeDate', function () {
                getPricingOfListing();
            });

            $(this).on('clearDate', function () {
                var id = $(this).parent('div').parent('div').attr('id');
                if (id == "datepicker") {
                    $('#listselprice').hide();
                    $('#tempeff').hide();
                    $('#msgx').html('Select a Check In and Check out date');
                    $('#temperror').show();
                }

                //$('#dpd2x2').focus();
                if (id == "datepickercontact") {
                    $('#tempsend').hide();
                    $('#msgy').html('Choose a Check In and Check Out date & type in the Message you want to Send! ');
                    $('#tempmsg').show();
                }

            });

        });

        //check local storage for already present values
        if (localStorage.getItem("time_array") !== null) {
            timesArray = JSON.parse(localStorage["time_array"]);
            timeArrayKey = timesArray[0];
            if (timeArrayKey['url'] == window.location.href) {
                if (timeArrayKey['indate'] != null) {
                    $("#dpd1x1").val(timeArrayKey['indate']);
                }
                if (timeArrayKey['outdate'] != null) {
                    $("#dpd2x2").val(timeArrayKey['outdate']);
                }

                if (timeArrayKey['in_start_time'] != '') {
                    var vald = timeArrayKey['in_start_time'];
                    $("#start_time").val(vald);
                    $("#select2-start_time-container").html(vald).attr("title", vald);
                } else {
                    $("#start_time").val("12:00");
                    $("#select2-start_time-container").html("12:00").attr("title", "12:00");
                }

                if (timeArrayKey['out_start_time'] != '') {
                    var vald = timeArrayKey['out_start_time'];
                    $("#end_time").val(vald);
                    $("#select2-end_time-container").html(vald).attr("title", vald);
                } else {
                    $("#end_time").val("11:30");
                    $("#select2-end_time-container").html("11:30").attr("title", "11:30");
                }

                if (timeArrayKey['in_start_ampm'] != '') {
                    var vald = timeArrayKey['in_start_ampm'];
                    $("#start_ampm").val(vald);
                    $("#select2-start_ampm-container").html(vald).attr("title", vald);
                } else {
                    $("#start_ampm").val("AM");
                    $("#select2-start_ampm-container").html("AM").attr("title", "AM");
                }

                if (timeArrayKey['out_start_ampm'] != '') {
                    var vald = timeArrayKey['out_start_ampm'];
                    $("#end_ampm").val(vald);
                    $("#select2-end_ampm-container").html(vald).attr("title", vald);
                } else {
                    $("#end_ampm").val("PM");
                    $("#select2-end_ampm-container").html("PM").attr("title", "PM");
                }

                if (timeArrayKey['guestselect'] != '') {
                    var vald = timeArrayKey['guestselect'];
                    $("#accounmentationGuests").val(vald);
                }


                getPricingOfListing();
            } else {
                //console.log("Fsdf");
                $("#start_time").val('10:00');
                $("#select2-start_time-container").html('10:00').attr("title", '10:00');
                $("#end_time").val('1:00');
                $("#select2-end_time-container").html('1:00').attr("title", '1:00');
                $("#start_ampm").val('AM');
                $("#select2-start_ampm-container").html('AM').attr("title", 'AM');
                $("#end_ampm").val('PM');
                $("#select2-end_ampm-container").html('PM').attr("title", 'PM');
            }

        }

    });

</script>

<script
    src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCRu_qlT0HNjPcs45NXXiOSMd3btAUduSc&libraries=places'></script>
<script src='https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js'></script>
<script src='libs/infobox.js'></script>
<script src='http://ss22001.mybackpocket.co/module/core/js/map-engine.js?_ver=2.2.2'></script>
<script src="libs/pusher.min.js"></script>
<script src="js/home.js"></script>

<script>
    var bravo_map_data = {
        markers: [{
            "id": 10,
            "title": "LILY DALE VILLAGE",
            "lat": 51.517883,
            "lng": -0.134314,
            "gallery": [{
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-10.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-10.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg"
            }],
            "infobox": "<div class=\"item-loop infobox-item\">\n            <div class=\"featured\">\n            Featured\n        <\/div>\n        <div class=\"thumb-image \">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/lily-dale-village?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                                                <img src=\"http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-10.jpg\" class=\"img-responsive\" alt=\"\">\n                                    <\/a>\n        <div class=\"price-wrapper\">\n            <div class=\"price\">\n                <span class=\"onsale\"><\/span>\n                <span class=\"text-price\">\n                    $250\n                                            <span class=\"unit\">\/day<\/span>\n                                    <\/span>\n            <\/div>\n        <\/div>\n        <div class=\"service-wishlist \" data-id=\"10\" data-type=\"space\">\n            <i class=\"fa fa-heart\"><\/i>\n        <\/div>\n    <\/div>\n    <div class=\"item-title\">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/lily-dale-village?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                            <i class=\"fa fa-bolt d-none\"><\/i>\n                            LILY DALE VILLAGE\n        <\/a>\n            <\/div>\n    <div class=\"location\">\n                                Paris\n            <\/div>\n            <div class=\"service-review\">\n        <span class=\"rate\">\n             4.7\/5  <span class=\"rate-text\">Excellent<\/span>\n        <\/span>\n        <span class=\"review\">\n                             3 Reviews\n                    <\/span>\n    <\/div>\n        <div class=\"amenities\">\n                    <span class=\"amenity total\" data-toggle=\"tooltip\"  title=\"No. People\">\n                <i class=\"input-icon field-icon icofont-people  \"><\/i> 9\n            <\/span>\n                            <span class=\"amenity bed\" data-toggle=\"tooltip\" title=\"No. Bed\">\n                <i class=\"input-icon field-icon icofont-hotel\"><\/i> 3\n            <\/span>\n                            <span class=\"amenity bath\" data-toggle=\"tooltip\" title=\"No. Bathroom\" >\n                <i class=\"input-icon field-icon icofont-bathtub\"><\/i> 3\n            <\/span>\n                            <span class=\"amenity size\" data-toggle=\"tooltip\" title=\"Square\" >\n                <i class=\"input-icon field-icon icofont-ruler-compass-alt\"><\/i> 111 sqft\n            <\/span>\n            <\/div>\n<\/div>\n",
            "marker": "http:\/\/ss22001.mybackpocket.co\/images\/icons\/png\/pin.png"
        }, {
            "id": 3,
            "title": "BEAUTIFUL LOFT",
            "lat": 51.461875,
            "lng": -0.211246,
            "gallery": [{
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-3.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-3.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg"
            }],
            "infobox": "<div class=\"item-loop infobox-item\">\n            <div class=\"featured\">\n            Featured\n        <\/div>\n        <div class=\"thumb-image \">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/beautiful-loft?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                                                <img src=\"http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-3.jpg\" class=\"img-responsive\" alt=\"\">\n                                    <\/a>\n        <div class=\"price-wrapper\">\n            <div class=\"price\">\n                <span class=\"onsale\"><\/span>\n                <span class=\"text-price\">\n                    $650\n                                            <span class=\"unit\">\/day<\/span>\n                                    <\/span>\n            <\/div>\n        <\/div>\n        <div class=\"service-wishlist \" data-id=\"3\" data-type=\"space\">\n            <i class=\"fa fa-heart\"><\/i>\n        <\/div>\n    <\/div>\n    <div class=\"item-title\">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/beautiful-loft?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                            BEAUTIFUL LOFT\n        <\/a>\n            <\/div>\n    <div class=\"location\">\n                                California\n            <\/div>\n            <div class=\"service-review\">\n        <span class=\"rate\">\n             4.5\/5  <span class=\"rate-text\">Excellent<\/span>\n        <\/span>\n        <span class=\"review\">\n                             2 Reviews\n                    <\/span>\n    <\/div>\n        <div class=\"amenities\">\n                    <span class=\"amenity total\" data-toggle=\"tooltip\"  title=\"No. People\">\n                <i class=\"input-icon field-icon icofont-people  \"><\/i> 9\n            <\/span>\n                            <span class=\"amenity bed\" data-toggle=\"tooltip\" title=\"No. Bed\">\n                <i class=\"input-icon field-icon icofont-hotel\"><\/i> 8\n            <\/span>\n                            <span class=\"amenity bath\" data-toggle=\"tooltip\" title=\"No. Bathroom\" >\n                <i class=\"input-icon field-icon icofont-bathtub\"><\/i> 4\n            <\/span>\n                            <span class=\"amenity size\" data-toggle=\"tooltip\" title=\"Square\" >\n                <i class=\"input-icon field-icon icofont-ruler-compass-alt\"><\/i> 116 sqft\n            <\/span>\n            <\/div>\n<\/div>\n",
            "marker": "http:\/\/ss22001.mybackpocket.co\/images\/icons\/png\/pin.png"
        }, {
            "id": 1,
            "title": "LUXURY STUDIO",
            "lat": 51.528564,
            "lng": -0.20301,
            "gallery": [{
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-1.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-1.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg"
            }],
            "infobox": "<div class=\"item-loop infobox-item\">\n            <div class=\"featured\">\n            Featured\n        <\/div>\n        <div class=\"thumb-image \">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/luxury-studio?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                                                <img src=\"http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-1.jpg\" class=\"img-responsive\" alt=\"\">\n                                    <\/a>\n        <div class=\"price-wrapper\">\n            <div class=\"price\">\n                <span class=\"onsale\"><\/span>\n                <span class=\"text-price\">\n                    $300\n                                            <span class=\"unit\">\/day<\/span>\n                                    <\/span>\n            <\/div>\n        <\/div>\n        <div class=\"service-wishlist \" data-id=\"1\" data-type=\"space\">\n            <i class=\"fa fa-heart\"><\/i>\n        <\/div>\n    <\/div>\n    <div class=\"item-title\">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/luxury-studio?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                            LUXURY STUDIO\n        <\/a>\n            <\/div>\n    <div class=\"location\">\n                                New York, United States\n            <\/div>\n            <div class=\"service-review\">\n        <span class=\"rate\">\n             4.4\/5  <span class=\"rate-text\">Very Good<\/span>\n        <\/span>\n        <span class=\"review\">\n                             5 Reviews\n                    <\/span>\n    <\/div>\n        <div class=\"amenities\">\n                    <span class=\"amenity total\" data-toggle=\"tooltip\"  title=\"No. People\">\n                <i class=\"input-icon field-icon icofont-people  \"><\/i> 10\n            <\/span>\n                            <span class=\"amenity bed\" data-toggle=\"tooltip\" title=\"No. Bed\">\n                <i class=\"input-icon field-icon icofont-hotel\"><\/i> 9\n            <\/span>\n                            <span class=\"amenity bath\" data-toggle=\"tooltip\" title=\"No. Bathroom\" >\n                <i class=\"input-icon field-icon icofont-bathtub\"><\/i> 7\n            <\/span>\n                            <span class=\"amenity size\" data-toggle=\"tooltip\" title=\"Square\" >\n                <i class=\"input-icon field-icon icofont-ruler-compass-alt\"><\/i> 195 sqft\n            <\/span>\n            <\/div>\n<\/div>\n",
            "marker": "http:\/\/ss22001.mybackpocket.co\/images\/icons\/png\/pin.png"
        }, {
            "id": 11,
            "title": "STAY GREENWICH VILLAGE",
            "lat": 51.514892,
            "lng": -0.176181,
            "gallery": [{
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-11.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-11.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg"
            }],
            "infobox": "<div class=\"item-loop infobox-item\">\n        <div class=\"thumb-image \">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/stay-greenwich-village?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                                                <img src=\"http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-11.jpg\" class=\"img-responsive\" alt=\"\">\n                                    <\/a>\n        <div class=\"price-wrapper\">\n            <div class=\"price\">\n                <span class=\"onsale\">$300<\/span>\n                <span class=\"text-price\">\n                    $150\n                                            <span class=\"unit\">\/day<\/span>\n                                    <\/span>\n            <\/div>\n        <\/div>\n        <div class=\"service-wishlist \" data-id=\"11\" data-type=\"space\">\n            <i class=\"fa fa-heart\"><\/i>\n        <\/div>\n    <\/div>\n    <div class=\"item-title\">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/stay-greenwich-village?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                            <i class=\"fa fa-bolt d-none\"><\/i>\n                            STAY GREENWICH VILLAGE\n        <\/a>\n                    <div class=\"sale_info\">50%<\/div>\n            <\/div>\n    <div class=\"location\">\n                                Paris\n            <\/div>\n            <div class=\"service-review\">\n        <span class=\"rate\">\n             4.4\/5  <span class=\"rate-text\">Very Good<\/span>\n        <\/span>\n        <span class=\"review\">\n                             5 Reviews\n                    <\/span>\n    <\/div>\n        <div class=\"amenities\">\n                    <span class=\"amenity total\" data-toggle=\"tooltip\"  title=\"No. People\">\n                <i class=\"input-icon field-icon icofont-people  \"><\/i> 7\n            <\/span>\n                            <span class=\"amenity bed\" data-toggle=\"tooltip\" title=\"No. Bed\">\n                <i class=\"input-icon field-icon icofont-hotel\"><\/i> 7\n            <\/span>\n                            <span class=\"amenity bath\" data-toggle=\"tooltip\" title=\"No. Bathroom\" >\n                <i class=\"input-icon field-icon icofont-bathtub\"><\/i> 8\n            <\/span>\n                            <span class=\"amenity size\" data-toggle=\"tooltip\" title=\"Square\" >\n                <i class=\"input-icon field-icon icofont-ruler-compass-alt\"><\/i> 200 sqft\n            <\/span>\n            <\/div>\n<\/div>\n",
            "marker": "http:\/\/ss22001.mybackpocket.co\/images\/icons\/png\/pin.png"
        }, {
            "id": 9,
            "title": "LUXURY SINGLE",
            "lat": 51.569555,
            "lng": 0.012563,
            "gallery": [{
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-9.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-9.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg"
            }],
            "infobox": "<div class=\"item-loop infobox-item\">\n        <div class=\"thumb-image \">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/luxury-single?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                                                <img src=\"http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-9.jpg\" class=\"img-responsive\" alt=\"\">\n                                    <\/a>\n        <div class=\"price-wrapper\">\n            <div class=\"price\">\n                <span class=\"onsale\">$400<\/span>\n                <span class=\"text-price\">\n                    $350\n                                            <span class=\"unit\">\/day<\/span>\n                                    <\/span>\n            <\/div>\n        <\/div>\n        <div class=\"service-wishlist \" data-id=\"9\" data-type=\"space\">\n            <i class=\"fa fa-heart\"><\/i>\n        <\/div>\n    <\/div>\n    <div class=\"item-title\">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/luxury-single?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                            LUXURY SINGLE\n        <\/a>\n                    <div class=\"sale_info\">12%<\/div>\n            <\/div>\n    <div class=\"location\">\n                                Paris\n            <\/div>\n            <div class=\"service-review\">\n        <span class=\"rate\">\n             4.3\/5  <span class=\"rate-text\">Very Good<\/span>\n        <\/span>\n        <span class=\"review\">\n                             3 Reviews\n                    <\/span>\n    <\/div>\n        <div class=\"amenities\">\n                    <span class=\"amenity total\" data-toggle=\"tooltip\"  title=\"No. People\">\n                <i class=\"input-icon field-icon icofont-people  \"><\/i> 7\n            <\/span>\n                            <span class=\"amenity bed\" data-toggle=\"tooltip\" title=\"No. Bed\">\n                <i class=\"input-icon field-icon icofont-hotel\"><\/i> 8\n            <\/span>\n                            <span class=\"amenity bath\" data-toggle=\"tooltip\" title=\"No. Bathroom\" >\n                <i class=\"input-icon field-icon icofont-bathtub\"><\/i> 3\n            <\/span>\n                            <span class=\"amenity size\" data-toggle=\"tooltip\" title=\"Square\" >\n                <i class=\"input-icon field-icon icofont-ruler-compass-alt\"><\/i> 123 sqft\n            <\/span>\n            <\/div>\n<\/div>\n",
            "marker": "http:\/\/ss22001.mybackpocket.co\/images\/icons\/png\/pin.png"
        }, {
            "id": 8,
            "title": "PARIS GREENWICH VILLA",
            "lat": 51.556749,
            "lng": -0.091124,
            "gallery": [{
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-8.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-8.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg"
            }],
            "infobox": "<div class=\"item-loop infobox-item\">\n        <div class=\"thumb-image \">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/paris-greenwich-villa?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                                                <img src=\"http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-8.jpg\" class=\"img-responsive\" alt=\"\">\n                                    <\/a>\n        <div class=\"price-wrapper\">\n            <div class=\"price\">\n                <span class=\"onsale\"><\/span>\n                <span class=\"text-price\">\n                    $500\n                                            <span class=\"unit\">\/day<\/span>\n                                    <\/span>\n            <\/div>\n        <\/div>\n        <div class=\"service-wishlist \" data-id=\"8\" data-type=\"space\">\n            <i class=\"fa fa-heart\"><\/i>\n        <\/div>\n    <\/div>\n    <div class=\"item-title\">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/paris-greenwich-villa?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                            PARIS GREENWICH VILLA\n        <\/a>\n            <\/div>\n    <div class=\"location\">\n                                Paris\n            <\/div>\n            <div class=\"service-review\">\n        <span class=\"rate\">\n             4.3\/5  <span class=\"rate-text\">Very Good<\/span>\n        <\/span>\n        <span class=\"review\">\n                             3 Reviews\n                    <\/span>\n    <\/div>\n        <div class=\"amenities\">\n                    <span class=\"amenity total\" data-toggle=\"tooltip\"  title=\"No. People\">\n                <i class=\"input-icon field-icon icofont-people  \"><\/i> 6\n            <\/span>\n                            <span class=\"amenity bed\" data-toggle=\"tooltip\" title=\"No. Bed\">\n                <i class=\"input-icon field-icon icofont-hotel\"><\/i> 3\n            <\/span>\n                            <span class=\"amenity bath\" data-toggle=\"tooltip\" title=\"No. Bathroom\" >\n                <i class=\"input-icon field-icon icofont-bathtub\"><\/i> 3\n            <\/span>\n                            <span class=\"amenity size\" data-toggle=\"tooltip\" title=\"Square\" >\n                <i class=\"input-icon field-icon icofont-ruler-compass-alt\"><\/i> 108 sqft\n            <\/span>\n            <\/div>\n<\/div>\n",
            "marker": "http:\/\/ss22001.mybackpocket.co\/images\/icons\/png\/pin.png"
        }, {
            "id": 7,
            "title": "EAST VILLAGE",
            "lat": 51.524292,
            "lng": -0.022489,
            "gallery": [{
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-7.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-7.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg"
            }],
            "infobox": "<div class=\"item-loop infobox-item\">\n        <div class=\"thumb-image \">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/east-village?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                                                <img src=\"http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-7.jpg\" class=\"img-responsive\" alt=\"\">\n                                    <\/a>\n        <div class=\"price-wrapper\">\n            <div class=\"price\">\n                <span class=\"onsale\">$300<\/span>\n                <span class=\"text-price\">\n                    $260\n                                            <span class=\"unit\">\/day<\/span>\n                                    <\/span>\n            <\/div>\n        <\/div>\n        <div class=\"service-wishlist \" data-id=\"7\" data-type=\"space\">\n            <i class=\"fa fa-heart\"><\/i>\n        <\/div>\n    <\/div>\n    <div class=\"item-title\">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/east-village?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                            EAST VILLAGE\n        <\/a>\n                    <div class=\"sale_info\">13%<\/div>\n            <\/div>\n    <div class=\"location\">\n                                Paris\n            <\/div>\n            <div class=\"service-review\">\n        <span class=\"rate\">\n             5.0\/5  <span class=\"rate-text\">Excellent<\/span>\n        <\/span>\n        <span class=\"review\">\n                             3 Reviews\n                    <\/span>\n    <\/div>\n        <div class=\"amenities\">\n                    <span class=\"amenity total\" data-toggle=\"tooltip\"  title=\"No. People\">\n                <i class=\"input-icon field-icon icofont-people  \"><\/i> 6\n            <\/span>\n                            <span class=\"amenity bed\" data-toggle=\"tooltip\" title=\"No. Bed\">\n                <i class=\"input-icon field-icon icofont-hotel\"><\/i> 8\n            <\/span>\n                            <span class=\"amenity bath\" data-toggle=\"tooltip\" title=\"No. Bathroom\" >\n                <i class=\"input-icon field-icon icofont-bathtub\"><\/i> 9\n            <\/span>\n                            <span class=\"amenity size\" data-toggle=\"tooltip\" title=\"Square\" >\n                <i class=\"input-icon field-icon icofont-ruler-compass-alt\"><\/i> 126 sqft\n            <\/span>\n            <\/div>\n<\/div>\n",
            "marker": "http:\/\/ss22001.mybackpocket.co\/images\/icons\/png\/pin.png"
        }, {
            "id": 6,
            "title": "THE MEATPACKING SUITES",
            "lat": 51.475135,
            "lng": 0.003592,
            "gallery": [{
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-6.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-6.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg"
            }],
            "infobox": "<div class=\"item-loop infobox-item\">\n        <div class=\"thumb-image \">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/the-meatpacking-suites?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                                                <img src=\"http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-6.jpg\" class=\"img-responsive\" alt=\"\">\n                                    <\/a>\n        <div class=\"price-wrapper\">\n            <div class=\"price\">\n                <span class=\"onsale\"><\/span>\n                <span class=\"text-price\">\n                    $320\n                                            <span class=\"unit\">\/day<\/span>\n                                    <\/span>\n            <\/div>\n        <\/div>\n        <div class=\"service-wishlist \" data-id=\"6\" data-type=\"space\">\n            <i class=\"fa fa-heart\"><\/i>\n        <\/div>\n    <\/div>\n    <div class=\"item-title\">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/the-meatpacking-suites?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                            <i class=\"fa fa-bolt d-none\"><\/i>\n                            THE MEATPACKING SUITES\n        <\/a>\n            <\/div>\n    <div class=\"location\">\n                                Paris\n            <\/div>\n            <div class=\"service-review\">\n        <span class=\"rate\">\n             4.5\/5  <span class=\"rate-text\">Excellent<\/span>\n        <\/span>\n        <span class=\"review\">\n                             2 Reviews\n                    <\/span>\n    <\/div>\n        <div class=\"amenities\">\n                    <span class=\"amenity total\" data-toggle=\"tooltip\"  title=\"No. People\">\n                <i class=\"input-icon field-icon icofont-people  \"><\/i> 8\n            <\/span>\n                            <span class=\"amenity bed\" data-toggle=\"tooltip\" title=\"No. Bed\">\n                <i class=\"input-icon field-icon icofont-hotel\"><\/i> 3\n            <\/span>\n                            <span class=\"amenity bath\" data-toggle=\"tooltip\" title=\"No. Bathroom\" >\n                <i class=\"input-icon field-icon icofont-bathtub\"><\/i> 5\n            <\/span>\n                            <span class=\"amenity size\" data-toggle=\"tooltip\" title=\"Square\" >\n                <i class=\"input-icon field-icon icofont-ruler-compass-alt\"><\/i> 115 sqft\n            <\/span>\n            <\/div>\n<\/div>\n",
            "marker": "http:\/\/ss22001.mybackpocket.co\/images\/icons\/png\/pin.png"
        }, {
            "id": 4,
            "title": "BEST OF WEST VILLAGE",
            "lat": 51.427638,
            "lng": -0.170752,
            "gallery": [{
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-4.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-4.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-1.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-2.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-3.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-4.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-5.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-6.jpg"
            }, {
                "large": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg",
                "thumb": "http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/gallery\/space-gallery-7.jpg"
            }],
            "infobox": "<div class=\"item-loop infobox-item\">\n        <div class=\"thumb-image \">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/best-of-west-village?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                                                <img src=\"http:\/\/ss22001.mybackpocket.co\/uploads\/demo\/space\/space-4.jpg\" class=\"img-responsive\" alt=\"\">\n                                    <\/a>\n        <div class=\"price-wrapper\">\n            <div class=\"price\">\n                <span class=\"onsale\"><\/span>\n                <span class=\"text-price\">\n                    $800\n                                            <span class=\"unit\">\/day<\/span>\n                                    <\/span>\n            <\/div>\n        <\/div>\n        <div class=\"service-wishlist \" data-id=\"4\" data-type=\"space\">\n            <i class=\"fa fa-heart\"><\/i>\n        <\/div>\n    <\/div>\n    <div class=\"item-title\">\n        <a  href=\"http:\/\/ss22001.mybackpocket.co\/space\/best-of-west-village?start=2022-05-11&amp;end=2022-05-12&amp;adults=1\">\n                            <i class=\"fa fa-bolt d-none\"><\/i>\n                            BEST OF WEST VILLAGE\n        <\/a>\n            <\/div>\n    <div class=\"location\">\n                                United States\n            <\/div>\n            <div class=\"service-review\">\n        <span class=\"rate\">\n             4.8\/5  <span class=\"rate-text\">Excellent<\/span>\n        <\/span>\n        <span class=\"review\">\n                             4 Reviews\n                    <\/span>\n    <\/div>\n        <div class=\"amenities\">\n                    <span class=\"amenity total\" data-toggle=\"tooltip\"  title=\"No. People\">\n                <i class=\"input-icon field-icon icofont-people  \"><\/i> 7\n            <\/span>\n                            <span class=\"amenity bed\" data-toggle=\"tooltip\" title=\"No. Bed\">\n                <i class=\"input-icon field-icon icofont-hotel\"><\/i> 10\n            <\/span>\n                            <span class=\"amenity bath\" data-toggle=\"tooltip\" title=\"No. Bathroom\" >\n                <i class=\"input-icon field-icon icofont-bathtub\"><\/i> 7\n            <\/span>\n                            <span class=\"amenity size\" data-toggle=\"tooltip\" title=\"Square\" >\n                <i class=\"input-icon field-icon icofont-ruler-compass-alt\"><\/i> 113 sqft\n            <\/span>\n            <\/div>\n<\/div>\n",
            "marker": "http:\/\/ss22001.mybackpocket.co\/images\/icons\/png\/pin.png"
        }],
        map_lat_default: 0,
        map_lng_default: 0,
        map_zoom_default: 6,
    };
</script>
<script type="text/javascript" src="libs/ion_rangeslider/js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="{{ asset('module/space/js/space-map.js?_ver='.config('app.version')) }}"></script>

<script type="text/javascript">


    $("#range").ionRangeSlider({
        type: "double",
        min: 25,
        max: 1000,
        from: 25,
        to: 1000,
        type: 'double',
        prefix: "$",
        grid: false,
        grid_num: 10,
        max_postfix: "<b>+<b>",
        prettify_enabled: false,
        onFinish: function (data) {
            $('#pstart').val(data.from);
            $('#pend').val(data.to);
            ajaxsearchplaces();

        }
    });
</script>
<script type="text/javascript" src="js/cycle.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function (e) {

        $(".wishlistselect").select2();

        // create category

        $('.createnew_wclick').click(function (e) {
            $('.cratewinput').fadeToggle(200);
        });

        // wishlist fadeIn
        $(document.body).on('click', '.wishlistopen', function () {

            //$('.wishlistselect').select2('data','');
            $(".wishlistselect").select2("val", "");

            if ($(this).parent().parent().parent().attr('id') != undefined) {

                var mid = $(this).parent().parent().parent().attr('id').split("-");

                var ind = lidarrasy.indexOf(mid[1]);
                //alert(ind);

                google.maps.event.trigger(markersArray[ind], "click");
            }
            var userloginstat = '0';

            //	alert(markersArray[0]); return false;
            if (userloginstat == 0) {

                $(".signinbtn").click();
                return false;

            }
            wishlistview();
            var lidstring = $(this).attr("id");
            var lid1 = lidstring.split("_");
            var lid = lid1[1];

            $.ajax({

                type: "POST",
                cache: false,

                url: "http://mofront.myoffice.ca/index.php?page=search/getwishlistdetail",

                data: {
                    'lid': lid
                },

                success: function (data) {
                    var details = data.split("??");
                    if (data != 0) {
                        $('#listaddresswish').html(details[0]);
                        $('#listheadingwish').html(details[1]);
                        $('#listimagewishdiv').html(details[2]);
                        $('#actuallistid').val(lid);

                    }

                }
            });
            $('.wishlistouter, .overlayb').fadeIn(200);
        });

        $('.wishlistopen').click(function (e) {
            $(".wishlistselect").select2("val", "");
            //$(document).on('click', '.wishlistopen', function(){
            var userloginstat = '0';
            var mid = $(this).parent().parent().parent().attr('id').split("-");
            var ind = lidarrasy.indexOf(mid[1]);
            //	var ind=mid[1];
            google.maps.event.trigger(markersArray[ind], "click");

            if (userloginstat == 0) {

                $(".signinbtn").click();
                return false;

            }
            wishlistview();
            var lidstring = $(this).attr("id");
            var lid = lidstring.replace("wishicon_", '');
            var lid = lid.trim();

            $.ajax({

                type: "POST",
                cache: false,

                url: "http://mofront.myoffice.ca/index.php?page=search/getwishlistdetail",

                data: {
                    'lid': lid
                },

                success: function (data) {
                    var details = data.split("??");
                    if (data != 0) {
                        $('#listaddresswish').html(details[0]);
                        $('#listheadingwish').html(details[1]);
                        $('#listimagewishdiv').html(details[2]);
                        $('#actuallistid').val(lid);

                    }

                }
            });
            $('.wishlistouter, .overlayb').fadeIn(200);
        });

        $('.wishlistclose').click(function (e) {
            $('.wishlistouter, .overlayb').fadeOut(200);
        });

        $('.lobox, .wishlistopen').click(function (event) {
            event.stopPropagation();
        });

    });

</script>

<input type="hidden" id="startDateVal"/>
<input type="hidden" id="endDateVal"/>

<input type="hidden" id="in_start_ampm"/>
<input type="hidden" id="in_start_time"/>

<input type="hidden" id="out_start_ampm"/>
<input type="hidden" id="out_start_time"/>

<script type="text/javascript">

    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('#dpd1').datepicker({
        onRender: function (date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        if (ev.date.valueOf() >= checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
            $('#dpd2')[0].focus();
        }
        checkin.hide();

    }).data('datepicker');
    var checkout = $('#dpd2').datepicker({
        onRender: function (date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {

        var othercheck = $('#dpd1').val();
        if (othercheck.trim() == "") {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() - 1);
            checkin.setValue(newDate);
            $('#dpd1')[0].focus();
        }
        checkout.hide();

    }).data('datepicker');

    $(document).ready(function () {
        var start = moment().subtract(0, 'days');
        var end = moment();
        $('#reportrange span').html('Dates');

        function cb(start, end) {

            if (start == '' && end == '') {
                $('#reportrange span').html('Dates');
                $("#startDateVal").val("");
                $("#endDateVal").val("");
            } else {
                $('#reportrange span').html(start.format('D MMM hh:mm A') + ' - ' + end.format('D MMM hh:mm A'));

                $("#startDateVal").val(start.format("MM/DD/YYYY"));
                $("#endDateVal").val(end.format("MM/DD/YYYY"));

                $("#in_start_ampm").val(start.format("A"));
                $("#out_start_ampm").val(end.format("A"));

                $("#in_start_time").val(start.format("hh:mm"));
                $("#out_start_time").val(end.format("hh:mm"));

            }
            $('#reportrange').addClass('selected');
        }

        $('#reportrange').daterangepicker({
            "timePicker": true,
            "timePickerIncrement": 30,
            "timePickerSeconds": false,
            startDate: start,
            endDate: end,
            autoUpdateInput: false,
            ranges: {}
        }, cb);

        //cb('', '');
        $(document).on('click', '.daterangepicker td', function () {
            var startDate = $('#reportrange').data('daterangepicker').startDate._d;
            var endDate = $('#reportrange').data('daterangepicker').endDate._d;
            cb(startDate, endDate)
        });
        $('#reportrange').on('show.daterangepicker', function (ev, picker) {
            //do something, like clearing an input
            $('#reportrange').addClass('active');
        });
        $('#reportrange').on('hide.daterangepicker', function (ev, picker) {
            //do something, like clearing an input
            $('#reportrange').removeClass('active');
        });

        function guest_text(o_g_adult = '', o_g_children = '', o_g_infants = '') {
            var filtersearch_desc = $('.guest_filter').find('.filtersearch_desc');
            if (o_g_adult != '') {
                var g_adult = o_g_adult;
                $('[name="g_adult"]').val(o_g_adult);
                $('.guest_filter .adult').find('.screen-reader-text').text(o_g_adult + '+');
            } else
                var g_adult = $('[name="g_adult"]').val();

            if (o_g_children != '') {
                var g_children = o_g_children;
                $('[name="g_children"]').val(o_g_children);
                $('.guest_filter .children').find('.screen-reader-text').text(o_g_children + '+');
            } else
                var g_children = $('[name="g_children"]').val();

            if (o_g_infants != '') {
                var g_infants = o_g_infants;
                $('[name="g_infants"]').val(o_g_infants);
                $('.guest_filter .infants').find('.screen-reader-text').text(o_g_infants + '+');
            } else
                var g_infants = $('[name="g_infants"]').val();

            var adult = parseInt(g_adult) + parseInt(g_children);
            var text = '';
            if (adult > 1) {
                text += adult + ' guests';
            } else {
                text += '1 guest';
            }

            if (g_infants > 1) {
                text += ',' + g_infants + ' infants';
            } else if (g_infants == 1) {
                text += ',' + g_infants + ' infant';
            }
            if (text == '') {
                $(filtersearch_desc).text('Guests');
                $(filtersearch_desc).removeClass('selected');
            } else {
                $(filtersearch_desc).text(text);
                $(filtersearch_desc).addClass('selected');
            }
        }

        $(document).on('click', '.plusminus_ul .plusminus .plus:not(.disabled)', function () {
            var curr_li = $(this).closest('li');
            var min_v = curr_li.attr('data-min');
            var guest_filter = $(this).closest('.guest_filter').length;
            var current_v = curr_li.find('[type="number"]').val();

            var new_v = parseInt(current_v) + parseInt(1);

            curr_li.find('[type="number"]').val(new_v);

            if (guest_filter > 0) {
                guest_text();
            }

            if (new_v <= min_v)
                curr_li.find('.minus').addClass('disabled');
            else
                curr_li.find('.minus').removeClass('disabled');

        });
        $(document).on('click', '.plusminus_ul .plusminus .minus:not(.disabled)', function () {
            var curr_li = $(this).closest('li');
            var min_v = curr_li.attr('data-min');
            var guest_filter = $(this).closest('.guest_filter').length;
            var current_v = curr_li.find('[type="number"]').val();

            var new_v = parseInt(current_v) - parseInt(1);

            curr_li.find('[type="number"]').val(new_v);

            if (guest_filter > 0) {
                guest_text()
            }

            if (new_v <= min_v)
                curr_li.find('.minus').addClass('disabled');
            else
                curr_li.find('.minus').removeClass('disabled');

        });
        $(document).on('click', '.filters .filterinp .filtersearch_desc', function () {
            $(".bottom_filter").hide();
            $(this).closest('.filterinp').find('.bottom_filter').show();
            $('.filtersearch_desc').removeClass('active')
            $(this).closest('.filterinp').find('.filtersearch_desc').addClass('active');
            o_g_adult = $('[name="g_adult"]').val();
            o_g_children = $('[name="g_children"]').val();
            o_g_infants = $('[name="g_infants"]').val();
        });
        $(document).click(function (e) {
            if ($('.filterinp').has(e.target).length === 0) {
                $(".bottom_filter").hide();
                $('.filtersearch_desc').removeClass('active');

            }
        });
        $(document).on('click', '.filters .filterinp .cancel', function () {
            var guest_filter = $(this).closest('.guest_filter').length;
            if (guest_filter > 0)
                guest_text(o_g_adult, o_g_children, o_g_infants);
            $(".bottom_filter").hide();
            $('.filtersearch_desc').removeClass('active');
        });
        mobile_filter_set();
        $(window).resize(function () {
            mobile_filter_set();
        });

        function mobile_filter_set() {
            var w = viewport();
            if (w.width < 768) {
                var officetype_filter = $('.filterinp.officetype_filter .bottom_filter .innerfilter').html();
                var price_fiter = $('.filterinp.price_fiter .bottom_filter .innerfilter').html();
                var instantbook_filter = $('.filterinp.instantbook_filter .bottom_filter .innerfilter').html();

                if (officetype_filter != '') {
                    $('.more_filters .office_type_mobile .hereadd').html(officetype_filter);
                    $('.filterinp.officetype_filter .bottom_filter .innerfilter').html('');
                }
                if (price_fiter != '') {
                    $('.more_filters .price_mobile .hereadd').html('<input type="text" id="range" value="" name="range" />');
                    $('.filterinp.price_fiter .bottom_filter .innerfilter').html('');
                    $("#range").ionRangeSlider({
                        type: "double",
                        min: 25,
                        max: 1000,
                        from: $('#pstart').val(),
                        to: $('#pend').val(),
                        type: 'double',
                        prefix: "$",
                        grid: false,
                        grid_num: 10,
                        max_postfix: "<b>+<b>",
                        prettify_enabled: false,
                        onFinish: function (data) {
                            $('#pstart').val(data.from);
                            $('#pend').val(data.to);
                            ajaxsearchplaces();

                        }
                    });
                }
                if (instantbook_filter != '') {
                    $('.more_filters .instantbook_mobile .hereadd').html(instantbook_filter);
                    $('.filterinp.instantbook_filter .bottom_filter .innerfilter').html('');
                }
            } else {
                var officetype_filter = $('.more_filters .office_type_mobile .hereadd').html();
                var price_fiter = $('.more_filters .price_mobile .hereadd').html();
                var instantbook_filter = $('.more_filters .instantbook_mobile .hereadd').html();

                if (officetype_filter != '') {
                    $('.filterinp.officetype_filter .bottom_filter .innerfilter').html(officetype_filter);
                    $('.more_filters .office_type_mobile .hereadd').html('');
                }
                if (price_fiter != '') {
                    $('.filterinp.price_fiter .bottom_filter .innerfilter').html('<input type="text" id="range" value="" name="range" />');
                    $('.more_filters .price_mobile .hereadd').html('');
                    $("#range").ionRangeSlider({
                        type: "double",
                        min: 25,
                        max: 1000,
                        from: $('#pstart').val(),
                        to: $('#pend').val(),
                        type: 'double',
                        prefix: "$",
                        grid: false,
                        grid_num: 10,
                        max_postfix: "<b>+<b>",
                        prettify_enabled: false,
                        onFinish: function (data) {
                            $('#pstart').val(data.from);
                            $('#pend').val(data.to);
                            ajaxsearchplaces();

                        }
                    });
                }
                if (instantbook_filter != '') {
                    $('.filterinp.instantbook_filter .bottom_filter .innerfilter').html(instantbook_filter);
                    $('.more_filters .instantbook_mobile .hereadd').html('');
                }
            }
        }

        function viewport() {
            var e = window, a = 'inner';
            if (!('innerWidth' in window)) {
                a = 'client';
                e = document.documentElement || document.body;
            }
            return {width: e[a + 'Width'], height: e[a + 'Height']};
        }

        $(document).on('click', '.searchheader .responsivehomebtn', function () {
            $('.searchheader .menu').slideToggle();
        });
        $(document).on('click', '.searchheader .menu li.has-submenu>a', function () {
            var w = viewport();
            if (w.width < 1201) {
                $(this).closest('li').find('.sub-menu').slideToggle();
                $(this).closest('li').toggleClass('open');
            }
        });
    });

</script>


<script>
    $(document).ready(function () {
        function runCheck() {
            var inTime = $("#startDateVal").val();
            var outTime = $("#endDateVal").val();

            var in_start_ampm = $("#in_start_ampm").val();
            var out_start_ampm = $("#out_start_ampm").val();
            var in_start_time = $("#in_start_time").val();
            var out_start_time = $("#out_start_time").val();

            var finalTime = "";
            if (inTime != null) {
                finalTime += inTime + " ";
            }
            if (in_start_time != null) {
                finalTime += in_start_time + " ";
            }
            if (in_start_ampm != null && in_start_time != null) {
                finalTime += in_start_ampm;
            }

            var firstFinal = finalTime;

            var secondFinal = "";

            finalTime += " - ";

            if (outTime != null) {
                secondFinal += outTime + " ";
            }
            if (out_start_time != null) {
                secondFinal += out_start_time + " ";
            }
            if (out_start_ampm != null && out_start_time != null) {
                secondFinal += out_start_ampm;
            }

            finalTime += secondFinal;

            if (finalTime.trim() != "") {
                $('#reportrange span').html(finalTime);
                $('#reportrange').addClass('selected');
            }

            if (secondFinal.trim() == "" && firstFinal.trim() == "") {
                $('#reportrange span').html("Dates");
                $('#reportrange').removeClass('selected');
            }


            //guests
            var guestDDD = $("#g_adult_guests").val();
            if (guestDDD > 0) {
                $(".guest_filter").find(".filtersearch_desc").addClass("active");
                $(".guest_filter").find(".filtersearch_desc").html(guestDDD + " Guests");
            }


        }

        runCheck();
    });
</script>
