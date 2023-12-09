<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{$html_class ?? ''}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php event(new \Modules\Layout\Events\LayoutBeginHead()); @endphp
    @php
        $favicon = setting_item('site_favicon');
    @endphp
    @if($favicon)
        @php
            $file = (new \Modules\Media\Models\MediaFile())->findById($favicon);
        @endphp
        @if(!empty($file))
            <link rel="icon" type="{{$file['file_type']}}" href="{{asset('uploads/'.$file['file_path'])}}"/>
        @else:
        <link rel="icon" type="image/png" href="{{url('images/favicon.png')}}"/>
        @endif
    @endif
    @include('Layout::Home.parts.seo-meta')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate/animate.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
    <link href="{{ asset('libs/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/frontend/css/notification.css') }}" rel="newest stylesheet">
    <link href="{{ asset('dist/frontend/css/app.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset("libs/daterange/daterangepicker.css") }}">--}}
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href={{ asset("libs/fotorama/fotorama.css") }}">
    <link rel="stylesheet" href="{{ asset('css/hotel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/space.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom-style.css') }}"/>
    <script src="{{ asset('js/main.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/superslides.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link
        href="https://fonts.googleapis.com/css?family=Eczar:700|Work+Sans:300,400,500,600,700|Montserrat:300,400,500,600,700"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery_ui.js') }}"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/iefix.css" type="text/css') }}">
    <link rel="stylesheet" href="{{ asset('css/sangaslider/ie8.css') }}" type="text/css">
    <script src="{{ asset('js/html5shiv.js') }}"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="{{ asset('libs/fullcalendar/main.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/daterange/daterangepicker.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('libs/daterange/daterangepicker.css')}}">--}}
    <link rel="stylesheet" href="{{ asset('libs/fullcalendar/main.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/toastr/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="libs/daterange/daterangepicker.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel='stylesheet' id='google-font-css-css'
          href='https://fonts.googleapis.com/css?family=Poppins%3A300%2C400%2C500%2C600' type='text/css' media='all'/>
    {!! \App\Helpers\Assets::css() !!}
    {!! \App\Helpers\Assets::js() !!}

    <link rel="stylesheet" type="text/css" href="css/icongc.css"/>
    <link rel="stylesheet" type="text/css" href="css/simpledatapiker/datepicker.css"/>
    <link href='css/fullcalendar.min.css' rel='stylesheet'/>
    <link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print'/>
    <script src="js/moment-new.min.js"></script>
    <script src="js/fullcalendar.min.js"></script>
    <style>
      html, body {
            width: 100%;
            height: 100%;
        }

        .mainslider {
            width: 100%;
            height: 100%;
            background-color: #EBEFEF;
        }

        .slides-container {
            z-index: 1;
        }
        .registerboxin .lgraytext
        {
            margin-top:unset;
        }
        .dateInputC {
            width: 40%;
            float: left;
        }

        .timeInputC {
            width: 30%;
            float: left;
            margin: 0px 2.5%;
        }

        .whenInputC {
            width: 25%;
            float: left;
        }

        .calendarview {
            z-index: 9999999;
            display: none;
            position: fixed;
            height: 100%;
            width: 100%;
            overflow: auto;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
        }

        .calendarview .whitebg {

            background-color: #FFFFFF;
            box-shadow: 0px 15px 15px rgba(0, 0, 0, 0.5);

        }

        .btnGroups span {
            padding: 5px 11px;
            border-radius: 0px;
            margin-right: 5px;
        }

        .notAvailableBtn {
            background: #e07272;
            color: #fff;
        }

        .bookedBtn {
            background: #65aa5f;
            color: #fff;
        }

        .pendingAppBtn {
            background: #00bcd4;
            color: #fff;
        }

        .wishlistopen,
        .resultlove {
            position: relative !important;
        }
    </style>
    <script>
        var bookingCore = {
            url: '/',
            url_root: '/',
            booking_decimals: 0,
            thousand_separator: '.',
            decimal_separator: ',',
            currency_position: 'left',
            currency_symbol: '$',
            currency_rate: '1',
            date_format: 'MM/DD/YYYY',
            map_provider: 'gmap',
            map_gmap_key: '',
            routes: {
                login: '/login',
                register: '/register',
            },
            currentUser: 0,
            rtl: 0
        };
        var i18n = {
            warning: "Warning",
            success: "Success",
        };
        var daterangepickerLocale = {
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "weekLabel": "W",
            "daysOfWeek": [
                "Su",
                "Mo",
                "Tu",
                "We",
                "Th",
                "Fr",
                "Sa"
            ],
            "monthNames": [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October}",
                "November",
                "December"
            ],
        };
    </script>
    <!-- Styles -->
    @yield('head')
    {{--Custom Style--}}
    <script type="text/javascript">
        $(document).ready(function () {

            if (window.location.href.indexOf("rental/details") > -1) {

            } else {
                localStorage.removeItem('time_array');
            }

            google.maps.event.addDomListener(window, 'load', function () {
                var options = {
                    types: ['(regions)']

                };
                var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'), options);
                google.maps.event.addListener(places, 'place_changed', function () {
                    var place = places.getPlace();
                    var address = place.formatted_address;
                    var latitude = place.geometry.location.lat();
                    var longitude = place.geometry.location.lng();
                    var fulllocation = document.getElementById('txtPlaces').value;
                    $('#location').val(fulllocation);
                    $('#address').val(address);
                    $('#lat').val(latitude);
                    $('#long').val(longitude);

                    if ($('#dpd1').val().trim() == "") {

                        $('#dpd1').focus();

                    } else if ($('#dpd2').val().trim() == "") {

                        //$('#dpd2').focus();

                    }

                    var geocoder = new google.maps.Geocoder;
                    geocoder.geocode({
                        'address': address
                    }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            result = results[0].address_components;
                            var info = [];
                            for (var i = 0; i < result.length; ++i) {
                                if (result[i].types[0] == "route") {
                                    var stas = result[i].long_name;
                                }
                                if (result[i].types[0] == "administrative_area_level_1") {
                                    var state = result[i].long_name;
                                    if (state != undefined && state != "") {
                                        state = state.trim();
                                    }
                                }
                                if (result[i].types[0] == "locality") {
                                    var city = result[i].long_name;
                                    if (city != undefined && city != "") {
                                        city = city.trim();
                                    }
                                }
                                if (result[i].types[0] == "country") {
                                    var country = result[i].long_name;
                                    if (country != undefined && country != "") {
                                        country = country.trim();
                                    }

                                }

                            }

                            if (city != undefined && city != "") {
                                $('#searchcity').val(city);
                            }
                            if (state != undefined && state != "") {
                                $('#searchstate').val(state);
                            }

                        }
                    });

                });
            });

            $('#txtPlaces').click(function () {

                $('#errordisp').hide();

                $('#txtPlaces').val("");

                $('#location').val("");
                $('#address').val("");
                $('#lat').val("");
                $('#long').val("");

            });

        });
        $(document).ready(function () {
            $('#errordisp').hide();
            $('#searchx').click(function () {
                if ($('#txtPlaces').val().trim() == "") {

                    $('#errordisp').html("Please Set a Location");
                    $('#errordisp').show();
                    $('#errordisp').fadeOut(5000);
                    return false;

                }

                if ($('#location').val() == "") {
                    $('#errordisp').html("Please Choose a Location from the List");
                    $('#errordisp').show();
                    $('#errordisp').fadeOut(5000);
                    return false;

                }

                if ($('#dpd1').val().trim() != "") {

                    var indate = $('#dpd1').val();
                    if (isDate(indate)) {
                        $('#indate').val(indate);
                    } else {
                        alert("Invalid Date!");
                        return false;
                    }
                }

                if ($('#dpd2').val().trim() != "") {

                    var outdate = $('#dpd2').val();
                    if (isDate(outdate)) {
                        $('#outdate').val(outdate);
                    } else {
                        alert("Invalid date format");
                        return false;
                    }

                }

                if (isNaN($('#guest').val())) {

                    $('#errordisp').html("Number of Guests can be in Numeric Only");
                    $('#errordisp').show();
                    $('#errordisp').fadeOut(5000);
                    return false;

                }

                var guestno = $('#guest').val();
                $('#guests').val(guestno);

                $('form#searchsubmit').submit();

            });
            /*
                 $('#dpd2').on('focus', function() {

                 var nowTemp = new Date();
                 var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

                 var newDate = new Date(now)
                 newDate.setDate(newDate.getDate() + 1);
                 checkout.setValue(newDate);

                 });
                 */
            $('.clrnn').click(function () {

                var value = "";
                $('#dpd1').datepicker('setValue', "");
                $('#dpd2').datepicker('setValue', "");
                $('#dpd1').val("");
                $('#dpd2').val("");

            });

            $('.boxcimage').click(function () {

                var loc = $(this).attr("id");

                var get = loc.split('##');
                var id = get[0];
                var place = get[1];

                if (id.trim() != "" && place.trim() != "") {

                    window.location = 'http://mofront.myoffice.ca/index.php?page=search/rentals/' + id + '/' + place + '';

                }

            });

            $('.middle').click(function () {

                var loc = $(this).attr("id");

                if (loc != undefined) {
                    var get = loc.split('##');
                    var id = get[0];
                    var place = get[1];

                    if (id.trim() != "" && place.trim() != "") {

                        window.location = 'http://mofront.myoffice.ca/index.php?page=search/rentals/' + id + '/' + place + '';

                    }

                }

            });

            function isDate(dateStr) {

                var datePat = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
                var matchArray = dateStr.match(datePat);
                // is the format ok?

                if (matchArray == null) {
                    // alert("Please enter date as either mm/dd/yyyy or mm-dd-yyyy.");
                    return false;
                }

                month = matchArray[1];
                // p@rse date into variables
                day = matchArray[3];
                year = matchArray[5];

                if (month < 1 || month > 12) {// check month range
                    // alert("Month must be between 1 and 12.");
                    return false;
                }

                if (day < 1 || day > 31) {
                    // alert("Day must be between 1 and 31.");
                    return false;
                }

                if ((month == 4 || month == 6 || month == 9 || month == 11) && day == 31) {
                    // alert("Month " + month + " doesn`t have 31 days!")
                    return false;
                }

                if (month == 2) {// check for february 29th
                    var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
                    if (day > 29 || (day == 29 && !isleap)) {
                        // alert("February " + year + " doesn`t have " + day + " days!");
                        return false;
                    }
                }
                return true;
                // date is valid
            }

        });

        function logout() {

            $.ajax({

                type: "POST",
                cache: false,

                url: "/logout",

                success: function (data) {
                    //alert(data);
                    if (data == "1") {
                        location.reload(true);
                    }

                }
            });
        }

        function login() {

    var email = $('#username_login').val().trim();
    var password = $('#password_login').val();
    var pass_len = password.length;
    if (email == "") {
    $('#unameerror').html('Please Enter Your Email');

    $('#unameerror').addClass('show');
    setTimeout(function () {
        $('#unameerror').removeClass('show');
    }, 1700);

    }
    if (password == "") {
    $('#passerror').html('Please Enter Your Password');
    $('#passerror').addClass('show');

    setTimeout(function () {
        $('#passerror').removeClass('show');
    }, 1700);

    return false;
    }

        $.ajax({

            type: "POST",
            cache: false,

            url: "{{route('login')}}",

            data: {
                'email': email,
                'password': password
            },

            success: function (data) {
                console.log(data);
                if (data == "1") {

                    $('#unameerror').html('Please Enter Your Email');

                    $('#unameerror').addClass('show');

                    setTimeout(function () {
                        $('#unameerror').removeClass('show');
                    }, 1700);

                    return false;

                }
                if (data == "2") {

                    $('#passerror').html('Please Enter Your Password');

                    $('#passerror').addClass('show');

                    setTimeout(function () {
                        $('#passerror').removeClass('show');
                    }, 1700);

                    return false;

                }
                if (data.error) {

                    $('#passerror').html('Invalid Email or Password ');

                    $('#passerror').addClass('show');

                    setTimeout(function () {
                        $('#passerror').removeClass('show');
                    }, 1700);

                    return false;

                } else {
                    window.location.href = "/user/user-dashboard";
                }

            }
        });
        }

        $(document).ready(function () {
            $("#emailuser").blur(function () {

                var email = $('#emailuser').val().trim();
                //	if(email!="" && isemail
                //alert(email);
                $.ajax({

                    type: "POST",
                    cache: false,

                    url: "http://mofront.myoffice.ca/index.php?page=index/emailexist",

                    data: {
                        'email': email
                    },

                    success: function (data) {
                        //alert(data);

                        if (data == "1") {

                            $('#emailerror').html('This Email already Exists ');

                            $('#emailerror').addClass('show');
                            setTimeout(function () {
                                $('#emailerror').removeClass('show');
                            }, 1700);

                            return false;

                        }

                    }
                });

            })
        });

        function register() {

            var fname = $('#fname').val().trim();

            var lname = $('#lname').val().trim();
            //var email=$('#emailuser').val().trim();
            var email = document.getElementById("emailuser").value;
            var country = $('#country').val().trim();
            var cpassword = $('#cpassword').val();
            var password = $('#password').val();
            var register_as = $('#register_as').val();
            if (fname == "") {

                $('#fnameerror').html('Please Enter Your First Name');

                $('#fnameerror').addClass('show');
                setTimeout(function () {
                    $('#fnameerror').removeClass('show');
                }, 1700);

                return false;
            }
            if (lname == "") {

                $('#lnameerror').html('Please Enter Your Last Name');

                $('#lnameerror').addClass('show');
                setTimeout(function () {
                    $('#lnameerror').removeClass('show');
                }, 1700);

                return false;
            }
            if (/^[A-Za-z\s]+$/.test(fname) == false) {
                $('#fnameerror').html('First Name Must Contain only Letters');

                $('#fnameerror').addClass('show');
                setTimeout(function () {
                    $('#fnameerror').removeClass('show');
                }, 1700);

                return false;
            }
            if (/^[A-Za-z\s]+$/.test(lname) == false) {
                $('#lnameerror').html('Last Name Must Contain only Letters');

                $('#lnameerror').addClass('show');
                setTimeout(function () {
                    $('#lnameerror').removeClass('show');
                }, 1700);

                return false;
            }
            if (email == "") {

                $('#emailerror').html('Please Enter Your Email');

                $('#emailerror').addClass('show');
                setTimeout(function () {
                    $('#emailerror').removeClass('show');
                }, 1700);

                return false;
            }
            var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;

            if (!regex.test(email)) {
                $('#emailerror').html('Invalid Email');

                $('#emailerror').addClass('show');
                setTimeout(function () {
                    $('#emailerror').removeClass('show');
                }, 1700);

                return false;
            }
            if (country == "") {

                $('#countyerror').html('Please Select a Country');

                $('#countyerror').addClass('show');
                setTimeout(function () {
                    $('#countyerror').removeClass('show');
                }, 1700);

                return false;
            }
            if (password == "") {

                $('#passwrderror').html('Please Enter a Password');

                $('#passwrderror').addClass('show');
                setTimeout(function () {
                    $('#passwrderror').removeClass('show');
                }, 1700);

                return false;
            }
            if (cpassword == "") {

                $('#cpassworderror').html('Please Confirm Your Password');

                $('#cpassworderror').addClass('show');
                setTimeout(function () {
                    $('#cpassworderror').removeClass('show');
                }, 1700);

                return false;
            }
            var min_password = '4';
            var pass_len = password.length;
            var cpass_len = cpassword.length;
            if (pass_len < min_password) {
                $('#passwrderror').html('Minimum Password Length Must be ' + min_password);

                $('#passwrderror').addClass('show');
                setTimeout(function () {
                    $('#passwrderror').removeClass('show');
                }, 1700);

                return false;
            }

            if (cpass_len < min_password) {
                $('#cpassworderror').html('Minimum Password Length Must be ' + min_password);

                $('#cpassworderror').addClass('show');
                setTimeout(function () {
                    $('#cpassworderror').removeClass('show');
                }, 1700);

                return false;
            }
            if (password != cpassword) {
                $('#cpassworderror').html('Password and Confirm password Must be Same');

                $('#cpassworderror').addClass('show');
                setTimeout(function () {
                    $('#cpassworderror').removeClass('show');
                }, 1700);

                return false;
            }
            //var emailid=JSON.stringify(email);

            $.ajax({

                type: "POST",
                cache: false,

                url: "/register",

                data: {
                    'password': password,
                    'country': country,
                    'first_name': fname,
                    'last_name': lname,
                    'email': email,
                    'register_as':register_as
                },

                success: function (data) {
                    //alert(data);

                    if (data == "1") {

                        $('#fnameerror').html('Please Enter Your First Name');

                        $('#fnameerror').addClass('show');
                        setTimeout(function () {
                            $('#fnameerror').removeClass('show');
                        }, 1700);

                        return false;

                    } else if (data == "2") {
                        $('#lnameerror').html('Please Enter Your Last Name');

                        $('#lnameerror').addClass('show');
                        setTimeout(function () {
                            $('#lnameerror').removeClass('show');
                        }, 1700);

                        return false;

                    } else if (data == "3") {
                        $('#emailerror').html('Please Enter Your Email');

                        $('#emailerror').addClass('show');
                        setTimeout(function () {
                            $('#emailerror').removeClass('show');
                        }, 1700);

                        return false;
                    } else if (data == "4") {
                        $('#countyerror').html('Please Select a Country');

                        $('#countyerror').addClass('show');
                        setTimeout(function () {
                            $('#countyerror').removeClass('show');
                        }, 1700);

                        return false;

                    } else if (data == "5") {

                        $('#passwrderror').html('Please Enter a Password');

                        $('#passwrderror').addClass('show');
                        setTimeout(function () {
                            $('#passwrderror').removeClass('show');
                        }, 1700);

                        return false;

                    } else if (data == "6") {

                        $('#passwrderror').html('Minimum Password Length Must be ' + min_password);

                        $('#passwrderror').addClass('show');
                        setTimeout(function () {
                            $('#passwrderror').removeClass('show');
                        }, 1700);

                        return false;

                    } else if (data == "7") {

                        $('#cpassworderror').html('Please Confirm Your Password');

                        $('#cpassworderror').addClass('show');
                        setTimeout(function () {
                            $('#cpassworderror').removeClass('show');
                        }, 1700);

                        return false;

                    } else if (data == "8") {

                        $('#cpassworderror').html('Password and Confirm password Must be Same');

                        $('#cpassworderror').addClass('show');
                        setTimeout(function () {
                            $('#cpassworderror').removeClass('show');
                        }, 1700);

                        return false;

                    } else if (data == "9") {

                        $('#emailerror').html('Invalid Email');

                        $('#emailerror').addClass('show');
                        setTimeout(function () {
                            $('#emailerror').removeClass('show');
                        }, 1700);

                        return false;

                    } else if (data == "10") {

                        $('#fnameerror').html('First Name Must Contain only Letters');

                        $('#fnameerror').addClass('show');
                        setTimeout(function () {
                            $('#fnameerror').removeClass('show');
                        }, 1700);

                        return false;

                    } else if (data == "11") {

                        $('#lnameerror').html('Last Name Must Contain only Letters');

                        $('#lnameerror').addClass('show');
                        setTimeout(function () {
                            $('#lnameerror').removeClass('show');
                        }, 1700);

                        return false;

                    } else if (data == 12) {
                        $('#cpassworderror').html('Minimum Password Length Must be ' + min_password);

                        $('#cpassworderror').addClass('show');
                        setTimeout(function () {
                            $('#cpassworderror').removeClass('show');
                        }, 1700);

                        return false;
                    } else if (data == 13) {
                        $('#emailerror').html('This Email already Exists ');

                        $('#emailerror').addClass('show');
                        setTimeout(function () {
                            $('#emailerror').removeClass('show');
                        }, 1700);

                        return false;
                    } else {
                        var cx = data.split("-");
                        var id = cx[0];
                        var defaultsatys = cx[1];

                        if (defaultsatys == 2) {

                            $('#regs').hide();
                            //$('#msg1').html('Successfully Registered <p class="robotoregular fontsize13 lgraytext">Your account is currently in Pending. Admin will verify and approve it soon.</p> ');
                            $('#msg1').html('Successfully Registered <p class="robotoregular fontsize13 lgraytext">Account activation link is sent to your email. please check your email and confirm your account.</p> ');

                            //$('#msg2').html('Your account is currently in Pending. Admin will verify and approve it soon.');

                        } else {

                            $('#regs').hide();
                            $('#msg1').html('Successfully Registered <p class="robotoregular fontsize13 lgraytext">Thank You for Registering with us. Your account is now active.</p> ');
                            //$('#msg2').html('Thank You for Registering with us. Your account is now active.');

                        }

                        $.ajax({

                            type: "POST",
                            cache: false,
                            url: "http://mofront.myoffice.ca/index.php?page=index/verifyemailaddress",

                            data: {
                                'id': id
                            }

                        });

                        if (defaultsatys == 1) {

                            location.reload(true);
                        }
                    }

                }
            });

        }

        function registerHost() 
        {

        var FnameHost = $('#FnameHost').val().trim();
        var LnameHost = $('#LnameHost').val().trim();
        var emailHost = document.getElementById("emailuserHost").value;
        var countryHost = $('#countryHost').val().trim();
        var cpasswordHost = $('#cpasswordHost').val();
        var passwordHost = $('#passwordHost').val();
        var register_asHost = $('#register_asHost').val();

        if (FnameHost == "") 
        {
            $('#FnameerrorHost').html('Please Enter Your First Name');
            $('#FnameerrorHost').addClass('show');
            setTimeout(function () {
                $('#FnameerrorHost').removeClass('show');
            }, 1700);
            return false;
        }
        if (/^[A-Za-z\s]+$/.test(FnameHost) == false) 
        {
            $('#FnameerrorHost').html('First Name Must Contain only Letters');
            $('#FnameerrorHost').addClass('show');
            setTimeout(function () {
                $('#FnameerrorHost').removeClass('show');
            }, 1700);

            return false;
        }

        if (LnameHost == "") 
        {
            $('#LnameerrorHost').html('Please Enter Your Last Name');
            $('#LnameerrorHost').addClass('show');
            setTimeout(function () {
                $('#LnameerrorHost').removeClass('show');
            }, 1700);
            return false;
        }

        if (/^[A-Za-z\s]+$/.test(LnameHost) == false) 
        {
            $('#LnameerrorHost').html('Last Name Must Contain only Letters');
            $('#LnameerrorHost').addClass('show');
            setTimeout(function () {
                $('#LnameerrorHost').removeClass('show');
            }, 1700);

            return false;
        }

        if (emailHost == "") 
        {

            $('#emailerrorHost').html('Please Enter Your Email');
            $('#emailerrorHost').addClass('show');
            setTimeout(function () {
                $('#emailerrorHost').removeClass('show');
            }, 1700);

            return false;
        }

        var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;

        if (!regex.test(emailHost)) 
        {
            $('#emailerrorHost').html('Invalid Email');
            $('#emailerrorHost').addClass('show');
            setTimeout(function () {
                $('#emailerrorHost').removeClass('show');
            }, 1700);

            return false;
        }

        if (countryHost == "") {

            $('#countyerrorHost').html('Please Select a Country');
            $('#countyerrorHost').addClass('show');
            setTimeout(function () {
                $('#countyerrorHost').removeClass('show');
            }, 1700);

            return false;
        }

        if (passwordHost == "") {

            $('#passwrderrorHost').html('Please Enter a Password');
            $('#passwrderrorHost').addClass('show');
            setTimeout(function () {
                $('#passwrderrorHost').removeClass('show');
            }, 1700);

            return false;
        }

        if (cpasswordHost == "") {

            $('#cpassworderrorHost').html('Please Confirm Your Password');
            $('#cpassworderrorHost').addClass('show');
            setTimeout(function () {
                $('#cpassworderrorHost').removeClass('show');
            }, 1700);

            return false;
        }

        var min_passwordHost = '4';
        var pass_lenHost = passwordHost.length;
        var cpass_lenHost = cpasswordHost.length;
        if (pass_lenHost < min_passwordHost) {
            $('#passwrderrorHost').html('Minimum Password Length Must be ' + min_passwordHost);

            $('#passwrderrorHost').addClass('show');
            setTimeout(function () {
                $('#passwrderrorHost').removeClass('show');
            }, 1700);

            return false;
        }

        if (cpass_lenHost < min_passwordHost) {
            $('#cpassworderrorHost').html('Minimum Password Length Must be ' + min_passwordHost);

            $('#cpassworderrorHost').addClass('show');
            setTimeout(function () {
                $('#cpassworderrorHost').removeClass('show');
            }, 1700);

            return false;
        }
        if (passwordHost != cpasswordHost) {
            $('#cpassworderrorHost').html('Password and Confirm password Must be Same');

            $('#cpassworderrorHost').addClass('show');
            setTimeout(function () {
                $('#cpassworderrorHost').removeClass('show');
            }, 1700);

            return false;
        }

        $.ajax({

            type: "POST",
            cache: false,

            url: "/register",

            data: {
                'password': passwordHost,
                'country': countryHost,
                'first_name': FnameHost,
                'last_name': LnameHost,
                'email': emailHost,
                'register_as':register_asHost
            },

            success: function (data) {
                //alert(data);

                if (data == "1") {
                    $('#FnameerrorHost').html('Please Enter Your First Name');
                    $('#FnameerrorHost').addClass('show');
                    setTimeout(function () {
                        $('#FnameerrorHost').removeClass('show');
                    }, 1700);
                    return false;

                } else if (data == "2") {
                    $('#LnameerrorHost').html('Please Enter Your Last Name');
                    $('#LnameerrorHost').addClass('show');
                    setTimeout(function () {
                        $('#LnameerrorHost').removeClass('show');
                    }, 1700);
                    return false;
                } else if (data == "3") {
                    $('#emailerrorHost').html('Please Enter Your Email');

                    $('#emailerrorHost').addClass('show');
                    setTimeout(function () {
                        $('#emailerrorHost').removeClass('show');
                    }, 1700);

                    return false;
                } else if (data == "4") {
                    $('#countyerrorHost').html('Please Select a Country');

                    $('#countyerrorHost').addClass('show');
                    setTimeout(function () {
                        $('#countyerrorHost').removeClass('show');
                    }, 1700);

                    return false;

                } else if (data == "5") {

                    $('#passwrderrorHost').html('Please Enter a Password');

                    $('#passwrderrorHost').addClass('show');
                    setTimeout(function () {
                        $('#passwrderrorHost').removeClass('show');
                    }, 1700);

                    return false;

                } else if (data == "6") {

                    $('#passwrderrorHost').html('Minimum Password Length Must be ' + min_password);

                    $('#passwrderrorHost').addClass('show');
                    setTimeout(function () {
                        $('#passwrderrorHost').removeClass('show');
                    }, 1700);

                    return false;

                } else if (data == "7") {

                    $('#cpassworderrorHost').html('Please Confirm Your Password');

                    $('#cpassworderrorHost').addClass('show');
                    setTimeout(function () {
                        $('#cpassworderrorHost').removeClass('show');
                    }, 1700);

                    return false;

                } else if (data == "8") {

                    $('#cpassworderrorHost').html('Password and Confirm password Must be Same');

                    $('#cpassworderrorHost').addClass('show');
                    setTimeout(function () {
                        $('#cpassworderrorHost').removeClass('show');
                    }, 1700);

                    return false;

                } else if (data == "9") {

                    $('#emailerrorHost').html('Invalid Email');

                    $('#emailerrorHost').addClass('show');
                    setTimeout(function () {
                        $('#emailerrorHost').removeClass('show');
                    }, 1700);

                    return false;

                } else if (data == "10") {

                    $('#FnameerrorHost').html('First Name Must Contain only Letters');

                    $('#FnameerrorHost').addClass('show');
                    setTimeout(function () {
                        $('#FnameerrorHost').removeClass('show');
                    }, 1700);

                    return false;

                } else if (data == "11") {

                    $('#LnameerrorHost').html('Last Name Must Contain only Letters');

                    $('#LnameerrorHost').addClass('show');
                    setTimeout(function () {
                        $('#LnameerrorHost').removeClass('show');
                    }, 1700);

                    return false;

                } else if (data == 12) {
                    $('#cpassworderrorHost').html('Minimum Password Length Must be ' + min_password);

                    $('#cpassworderrorHost').addClass('show');
                    setTimeout(function () {
                        $('#cpassworderrorHost').removeClass('show');
                    }, 1700);

                    return false;
                } else if (data == 13) {
                    $('#emailerrorHost').html('This Email already Exists ');

                    $('#emailerrorHost').addClass('show');
                    setTimeout(function () {
                        $('#emailerrorHost').removeClass('show');
                    }, 1700);

                    return false;
                } else {
                    var cx = data.split("-");
                    var id = cx[0];
                    var defaultsatys = cx[1];

                    if (defaultsatys == 2) {

                        $('#regs').hide();
                        $('#msg1').html('Successfully Registered <p class="robotoregular fontsize13 lgraytext">Account activation link is sent to your email. please check your email and confirm your account.</p> ');

                    } else {

                        $('#regs').hide();
                        $('#msg1').html('Successfully Registered <p class="robotoregular fontsize13 lgraytext">Thank You for Registering with us. Your account is now active.</p> ');

                    }

                    // $.ajax({

                    //     type: "POST",
                    //     cache: false,
                    //     url: "http://mofront.myoffice.ca/index.php?page=index/verifyemailaddress",

                    //     data: {
                    //         'id': id
                    //     }

                    // });

                    if (defaultsatys == 1) {

                        location.reload(true);
                    }
                }

            }
        });

        }
        function forgotpassword() {
            window.location.href = "/password/reset";
        }

        function howimage(id) {
            window.location.href = "http://mofront.myoffice.ca/index.php?page=help/section/" + id;
        }
    </script>
    <link href="{{ asset('libs/carousel-2/owl.carousel.css') }}" rel="stylesheet">
    @if(setting_item_with_lang('enable_rtl'))
        <link href="{{ asset('dist/frontend/css/rtl.css') }}" rel="stylesheet">
    @endif
    @if(!is_demo_mode())
        {!! setting_item('head_scripts') !!}
        {!! setting_item_with_lang_raw('head_scripts') !!}
    @endif
    @php event(new \Modules\Layout\Events\LayoutEndHead()); @endphp
</head>
<body>
    <div class="loginwrperoverlay"></div>
    <div class="loginbox">
        <div class="loouter">
            <div class="lomiddle">
                <div class="loinner col-md-5 col-sm-6 col-lg-4 col-center nopadding">
                    <div class="lobox whitebg fulwidthm left pdg30 login-box">
                        <div class="loginrow fulwidthm left mgnB15 text-center">
                            <div class="registerclose lgraytext">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="indexlogo text-center">
                                <a href="/" class="fulwidthm left"><img src="/images/logo_white.png"
                                                                        alt="MyOffice Logo" title="MyOffice"></a>
                            </div>
                        </div>
                        <div class="loginrow fulwidthm left josfinsanbold graytext mgnB15">
                            <label class="formlabel fontsize13 robotoregular graytext">Email</label><span
                                class=" required">*</span>
                            <input type="email" id="username_login" name="email"
                                   class="cmnfrminput fulwidthm inputiconpdng" placeholder="Email">
                            <span class="loginicons"><i class="fa fa-user"></i></span>
                            <div class="erorshow" id="unameerror"></div>
                        </div>
                        <div class="loginrow fulwidthm left josfinsanbold graytext mgnB15">
                            <label class="formlabel fontsize13 robotoregular graytext">Password</label><span
                                class=" required">*</span>
                            <input type="password" id="password_login" name="password"
                                   class="cmnfrminput  fulwidthm inputiconpdng" placeholder="Password">
                            <span class="loginicons"><i class="fa fa-lock"></i></span>
                            <div class="erorshow" id="passerror"></div>
                        </div>
    
                        <div class="loginrow fulwidthm left josfinsanbold graytext mgnB15">
                            <div class="col-lg-6 col-md-6 col-sm-6 mgnB15 registerBtntx">
                                <button class=" btn btn-success whitetext fulwidthm font-size14 robotomedium"
                                        onClick="login()" type="submit">
                                    Log In
                                </button>
                            </div>
                        </div>
                        <div class="fulwidthm forget-signup">
                            <div class=" loginrow   robotoregular fontsize12 graytext mgnB15">
                                <a class="greentext frgtpaswrdclick font-weight-bold" onClick="forgotpassword()">Forgot
                                    Password </a>
                            </div>
                            <div class=" loginrow graytext mgnB15 icon-center">
                                <i class="greentext ">|</i>
                            </div>
                            <div class="loginrow   robotoregular fontsize12 graytext mgnB15">
                                <a class="greentext signupclick font-weight-bold">Sign Up</a>
                            </div>
                        </div>
                        <div class="socialAuthStages">
                            <div
                                class="loginrow orPlx fulwidthm left josfinsanregular fontsize16 graytext mgnB15 text-center">
                                <span>or</span>
                            </div>
                            <div class="fontsize12 graytext text-center mb-3">Login Through</div>
                            <div id='wrapper' style='text-align: center;'>
                                <div style='display: inline-block; vertical-align: top;'>
                                    <a href="{{ route('social.login', 'facebook') }}">
                                        <div class="text left pr-3">
                                            <img src="/images/facebook.png">
                                            <p class="robotoregular fontsize11 graytext text-uppercase mt-2">Facebook
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div style='display: inline-block; vertical-align: top;'>
                                    <a href="{{ route('social.login', 'google') }}"">
                                    <div class="text-center left">
                                        <img src="/images/google.png">
                                        <p class="robotoregular fontsize11 graytext text-uppercase mt-2">Google+</p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
    <div class="registerbox">
        <div class="loouter">
            <div class="lomiddle">
                <div class="loinner ">
                    <div class="registerboxin whitebg fulwidthm left  ">
                        <div class="registerclose lgraytext">
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="loginrow fulwidthm left mgnB15 text-center">
                            <div class="indexlogo text-center">
                                <a href="/" class="fulwidthm left"><img src="/images/logo_white.png"
                                                                        alt="MyOffice Logo" title="MyOffice"></a>
                            </div>
                        </div>
                        <div class="loginrow fulwidthm left mgnB15 text-center josfinsanbold blacktext fontsize24"
                             id="msg1">
                            Register Now <p class="robotoregular fontsize13 lgraytext">
                                In order to add your listing you need to
                                create an account first.
                            </p>
                        </div>
                        <div id="regs">
                            <div class="loginrow fulwidthm left josfinsanbold graytext ">
                                <div class="col-lg-6 col-md-6 col-sm-6 mgnB15">
                                    <label class="formlabel fontsize13 robotoregular graytext"> First Name <span
                                            class=" required">*</span></label>
                                    <input id="fname" type="text" class="cmnfrminput fulwidthm" name="first_name">
                                    <!-- errorinput -->
                                    <div class="erorshow" id="fnameerror"></div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 mgnB15">
                                    <label class="formlabel fontsize13 robotoregular graytext">Last Name <span
                                            class=" required">*</span></label>
                                    <input type="text" id="lname" class="cmnfrminput fulwidthm" name="last_name">
    
                                    <div class="erorshow" id="lnameerror"></div>
                                </div>
                            </div>
                            <div class="loginrow fulwidthm left josfinsanbold graytext ">
                                <div class="col-lg-6 col-md-6 col-sm-6 mgnB15">
                                    <label class="formlabel fontsize13 robotoregular graytext"> Email <span
                                            class=" required">*</span></label>
                                    <input type="email" id="emailuser" name="email" class="cmnfrminput fulwidthm ">
    
                                    <div class="erorshow" id="emailerror"></div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 mgnB15">
                                    <label class="formlabel fontsize13 robotoregular graytext">Country of Residence
                                        <span class=" required">*</span></label>
                                    <select id="country" name="country" class="formselect" style="width:100%"
                                            data-placeholder="Select a Country">
                                        <option value="39" selected="selected">Canada</option>
                                        <option value="227">United States</option>
                                        <option value="1">Afghanistan</option>
                                        <option value="2">Albania</option>
                                        <option value="3">Algeria</option>
                                        <option value="4">American Samoa</option>
                                        <option value="5">Andorra</option>
                                        <option value="6">Angola</option>
                                        <option value="7">Anguilla</option>
                                        <option value="8">Antarctica</option>
                                        <option value="9">Antigua and Barbuda</option>
                                        <option value="10">Argentina</option>
                                        <option value="11">Armenia</option>
                                        <option value="12">Aruba</option>
                                        <option value="13">Australia</option>
                                        <option value="14">Austria</option>
                                        <option value="15">Azerbaijan</option>
                                        <option value="16">Bahamas</option>
                                        <option value="17">Bahrain</option>
                                        <option value="18">Bangladesh</option>
                                        <option value="19">Barbados</option>
                                        <option value="20">Belarus</option>
                                        <option value="21">Belgium</option>
                                        <option value="22">Belize</option>
                                        <option value="23">Benin</option>
                                        <option value="24">Bermuda</option>
                                        <option value="25">Bhutan</option>
                                        <option value="26">Bolivia</option>
                                        <option value="27">Bosnia and Herzegovina</option>
                                        <option value="28">Botswana</option>
                                        <option value="29">Bouvet Island</option>
                                        <option value="30">Brazil</option>
                                        <option value="31">British Indian Ocean Territory</option>
                                        <option value="32">British Virgin Islands</option>
                                        <option value="33">Brunei</option>
                                        <option value="34">Bulgaria</option>
                                        <option value="35">Burkina Faso</option>
                                        <option value="36">Burundi</option>
                                        <option value="37">Cambodia</option>
                                        <option value="38">Cameroon</option>
                                        <option value="40">Cape Verde</option>
                                        <option value="41">Cayman Islands</option>
                                        <option value="42">Central African Republic</option>
                                        <option value="43">Chad</option>
                                        <option value="44">Chile</option>
                                        <option value="45">China</option>
                                        <option value="46">Christmas Island</option>
                                        <option value="47">Cocos Islands</option>
                                        <option value="48">Colombia</option>
                                        <option value="49">Comoros</option>
                                        <option value="50">Cook Islands</option>
                                        <option value="51">Costa Rica</option>
                                        <option value="52">Croatia</option>
                                        <option value="53">Cuba</option>
                                        <option value="54">Cyprus</option>
                                        <option value="55">Czech Republic</option>
                                        <option value="56">Democratic Republic of the Congo</option>
                                        <option value="57">Denmark</option>
                                        <option value="58">Djibouti</option>
                                        <option value="59">Dominica</option>
                                        <option value="60">Dominican Republic</option>
                                        <option value="61">East Timor</option>
                                        <option value="62">Ecuador</option>
                                        <option value="63">Egypt</option>
                                        <option value="64">El Salvador</option>
                                        <option value="65">Equatorial Guinea</option>
                                        <option value="66">Eritrea</option>
                                        <option value="67">Estonia</option>
                                        <option value="68">Ethiopia</option>
                                        <option value="69">Falkland Islands</option>
                                        <option value="70">Faroe Islands</option>
                                        <option value="71">Fiji</option>
                                        <option value="72">Finland</option>
                                        <option value="73">France</option>
                                        <option value="74">French Guiana</option>
                                        <option value="75">French Polynesia</option>
                                        <option value="76">French Southern Territories</option>
                                        <option value="77">Gabon</option>
                                        <option value="78">Gambia</option>
                                        <option value="79">Georgia</option>
                                        <option value="80">Germany</option>
                                        <option value="81">Ghana</option>
                                        <option value="82">Gibraltar</option>
                                        <option value="83">Greece</option>
                                        <option value="84">Greenland</option>
                                        <option value="85">Grenada</option>
                                        <option value="86">Guadeloupe</option>
                                        <option value="87">Guam</option>
                                        <option value="88">Guatemala</option>
                                        <option value="89">Guinea</option>
                                        <option value="90">Guinea-Bissau</option>
                                        <option value="91">Guyana</option>
                                        <option value="92">Haiti</option>
                                        <option value="93">Heard Island and McDonald Islands</option>
                                        <option value="94">Honduras</option>
                                        <option value="95">Hong Kong</option>
                                        <option value="96">Hungary</option>
                                        <option value="97">Iceland</option>
                                        <option value="98">India</option>
                                        <option value="99">Indonesia</option>
                                        <option value="100">Iran</option>
                                        <option value="101">Iraq</option>
                                        <option value="102">Ireland</option>
                                        <option value="103">Israel</option>
                                        <option value="104">Italy</option>
                                        <option value="105">Ivory Coast</option>
                                        <option value="106">Jamaica</option>
                                        <option value="107">Japan</option>
                                        <option value="108">Jordan</option>
                                        <option value="109">Kazakhstan</option>
                                        <option value="110">Kenya</option>
                                        <option value="111">Kiribati</option>
                                        <option value="112">Kuwait</option>
                                        <option value="113">Kyrgyzstan</option>
                                        <option value="114">Laos</option>
                                        <option value="115">Latvia</option>
                                        <option value="116">Lebanon</option>
                                        <option value="117">Lesotho</option>
                                        <option value="118">Liberia</option>
                                        <option value="119">Libya</option>
                                        <option value="120">Liechtenstein</option>
                                        <option value="121">Lithuania</option>
                                        <option value="122">Luxembourg</option>
                                        <option value="123">Macao</option>
                                        <option value="124">Macedonia</option>
                                        <option value="125">Madagascar</option>
                                        <option value="126">Malawi</option>
                                        <option value="127">Malaysia</option>
                                        <option value="128">Maldives</option>
                                        <option value="129">Mali</option>
                                        <option value="130">Malta</option>
                                        <option value="131">Marshall Islands</option>
                                        <option value="132">Martinique</option>
                                        <option value="133">Mauritania</option>
                                        <option value="134">Mauritius</option>
                                        <option value="135">Mayotte</option>
                                        <option value="136">Mexico</option>
                                        <option value="137">Micronesia</option>
                                        <option value="138">Moldova</option>
                                        <option value="139">Monaco</option>
                                        <option value="140">Mongolia</option>
                                        <option value="141">Montserrat</option>
                                        <option value="142">Morocco</option>
                                        <option value="143">Mozambique</option>
                                        <option value="144">Myanmar</option>
                                        <option value="145">Namibia</option>
                                        <option value="146">Nauru</option>
                                        <option value="147">Nepal</option>
                                        <option value="148">Netherlands</option>
                                        <option value="149">Netherlands Antilles</option>
                                        <option value="150">New Caledonia</option>
                                        <option value="151">New Zealand</option>
                                        <option value="152">Nicaragua</option>
                                        <option value="153">Niger</option>
                                        <option value="154">Nigeria</option>
                                        <option value="155">Niue</option>
                                        <option value="156">Norfolk Island</option>
                                        <option value="157">North Korea</option>
                                        <option value="158">Northern Mariana Islands</option>
                                        <option value="159">Norway</option>
                                        <option value="160">Oman</option>
                                        <option value="161">Pakistan</option>
                                        <option value="162">Palau</option>
                                        <option value="163">Palestinian Territory</option>
                                        <option value="164">Panama</option>
                                        <option value="165">Papua New Guinea</option>
                                        <option value="166">Paraguay</option>
                                        <option value="167">Peru</option>
                                        <option value="168">Philippines</option>
                                        <option value="169">Pitcairn</option>
                                        <option value="170">Poland</option>
                                        <option value="171">Portugal</option>
                                        <option value="172">Puerto Rico</option>
                                        <option value="173">Qatar</option>
                                        <option value="174">Republic of the Congo</option>
                                        <option value="175">Reunion</option>
                                        <option value="176">Romania</option>
                                        <option value="177">Russia</option>
                                        <option value="178">Rwanda</option>
                                        <option value="179">Saint Helena</option>
                                        <option value="180">Saint Kitts and Nevis</option>
                                        <option value="181">Saint Lucia</option>
                                        <option value="182">Saint Pierre and Miquelon</option>
                                        <option value="183">Saint Vincent and the Grenadines</option>
                                        <option value="184">Samoa</option>
                                        <option value="185">San Marino</option>
                                        <option value="186">Sao Tome and Principe</option>
                                        <option value="187">Saudi Arabia</option>
                                        <option value="188">Senegal</option>
                                        <option value="189">Serbia and Montenegro</option>
                                        <option value="190">Seychelles</option>
                                        <option value="191">Sierra Leone</option>
                                        <option value="192">Singapore</option>
                                        <option value="193">Slovakia</option>
                                        <option value="194">Slovenia</option>
                                        <option value="195">Solomon Islands</option>
                                        <option value="196">Somalia</option>
                                        <option value="197">South Africa</option>
                                        <option value="198">South Georgia and the South Sandwich Islands</option>
                                        <option value="199">South Korea</option>
                                        <option value="200">Spain</option>
                                        <option value="201">Sri Lanka</option>
                                        <option value="202">Sudan</option>
                                        <option value="203">Suriname</option>
                                        <option value="204">Svalbard and Jan Mayen</option>
                                        <option value="205">Swaziland</option>
                                        <option value="206">Sweden</option>
                                        <option value="207">Switzerland</option>
                                        <option value="208">Syria</option>
                                        <option value="209">Taiwan</option>
                                        <option value="210">Tajikistan</option>
                                        <option value="211">Tanzania</option>
                                        <option value="212">Thailand</option>
                                        <option value="213">Togo</option>
                                        <option value="214">Tokelau</option>
                                        <option value="215">Tonga</option>
                                        <option value="216">Trinidad and Tobago</option>
                                        <option value="217">Tunisia</option>
                                        <option value="218">Turkey</option>
                                        <option value="219">Turkmenistan</option>
                                        <option value="220">Turks and Caicos Islands</option>
                                        <option value="221">Tuvalu</option>
                                        <option value="222">U.S. Virgin Islands</option>
                                        <option value="223">Uganda</option>
                                        <option value="224">Ukraine</option>
                                        <option value="225">United Arab Emirates</option>
                                        <option value="226">United Kingdom</option>
                                        <option value="228">United States Minor Outlying Islands</option>
                                        <option value="229">Uruguay</option>
                                        <option value="230">Uzbekistan</option>
                                        <option value="231">Vanuatu</option>
                                        <option value="232">Vatican</option>
                                        <option value="233">Venezuela</option>
                                        <option value="234">Vietnam</option>
                                        <option value="235">Wallis and Futuna</option>
                                        <option value="236">Western Sahara</option>
                                        <option value="237">Yemen</option>
                                        <option value="238">Zambia</option>
                                        <option value="239">Zimbabwe</option>
                                    </select>
    
                                    <div class="erorshow" id="countyerror"></div>
                                </div>
                            </div>
                            <div class="loginrow fulwidthm left josfinsanbold graytext ">
                                <div class="col-lg-6 col-md-6 col-sm-6 mgnB15">
                                    <label class="formlabel fontsize13 robotoregular graytext">Password <span
                                            class=" required">*</span></label>
                                    <input id="password" type="password" class="cmnfrminput fulwidthm"
                                           name="password">
                                    <input type="hidden" id="register_asHost"  name="register_as" value="host">
                                    <div class="erorshow" id="passwrderror"></div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 mgnB15">
                                    <label class="formlabel fontsize13 robotoregular graytext">Confirm Password
                                        <span class=" required">*</span></label>
                                    <input id="cpassword" type="password" class="cmnfrminput fulwidthm"
                                           name="cpassword">
    
                                    <div class="erorshow" id="cpassworderror"></div>
                                </div>
                            </div>
                            <div class="loginrow fulwidthm left josfinsanbold graytext mgnB15">
                                <div class="col-lg-6 col-md-6 col-sm-6 mgnB15 registerBtntx">
                                    <button class=" btn btn-success whitetext fulwidthm font-size14 robotomedium"
                                            onClick="register()" type="submit">
                                        Register
                                    </button>
                                </div>
                            </div>
                            <div
                                class="loginrow fulwidthm left registerBtntxText josfinsanregular fontsize16 graytext mgnB15">
                                Already a MyOffice member? <a class="greentext signinclick">Log In </a>
                            </div>
                            <div class="socialAuthStages register">
                                <div
                                    class="loginrow orPlx fulwidthm left josfinsanregular fontsize16 graytext mgnB15 text-center">
                                    <span>or</span>
                                </div>
                                <div class="fontsize12 graytext text-center mb-3">Login Through</div>
                                <div class="text-center d-block m-auto w-25">
                                    <a href="{{ route('social.login', 'facebook') }}">
                                        <div class="text left pr-3">
                                            <img src="/images/facebook.png">
                                            <p class="robotoregular fontsize12 graytext text-uppercase">Facebook
                                            </p>
                                        </div>
                                    </a>
                                    <a href="{{ route('social.login', 'google') }}">
                                        <div class="text-center left">
                                            <img src="/images/google.png">
                                            <p class="robotoregular fontsize12 graytext text-uppercase">Google+</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
    <div class="registervendorbox">
        <div class="loouter">
            <div class="lomiddle">
                <div class="loinner ">
                    <div class="registerboxin whitebg fulwidthm left  ">
                        <div class="registervendorclose lgraytext">
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="loginrow fulwidthm left mgnB15 text-center">
                            <div class="indexlogo text-center">
                                <a href="/" class="fulwidthm left">
                                    <img src="/images/logo_white.png" alt="MyOffice Logo" title="MyOffice"></a>
                            </div>
                        </div>
                        <div class="loginrow fulwidthm left mgnB15 text-center josfinsanbold blacktext fontsize24" id="msg1">
                            Register as Host <p class="robotoregular fontsize13 lgraytext"> In order to add your listing you need to create an account first.
                            </p>
                        </div>
                        <div id="regs">
                            <div class="loginrow fulwidthm left josfinsanbold graytext ">
                                <div class="col-lg-6 col-md-6 col-sm-6 mgnB15">
                                    <label class="formlabel fontsize13 robotoregular graytext"> First Name <span class=" required">*</span></label>
                                    <input id="FnameHost" type="text" class="cmnfrminput fulwidthm" name="first_name">
                                    <div class="erorshow" id="FnameerrorHost"></div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 mgnB15">
                                    <label class="formlabel fontsize13 robotoregular graytext">Last Name <span class=" required">*</span></label>
                                    <input type="text" id="LnameHost" class="cmnfrminput fulwidthm" name="last_name">
                                    <input type="hidden" id="register_as"  name="register_as" value="host">
                                    <div class="erorshow" id="LnameerrorHost"></div>
                                </div>
                            </div>
                            <div class="loginrow fulwidthm left josfinsanbold graytext ">
                                <div class="col-lg-6 col-md-6 col-sm-6 mgnB15">
                                    <label class="formlabel fontsize13 robotoregular graytext"> Email <span class=" required">*</span></label>
                                    <input type="email" id="emailuserHost" name="email" class="cmnfrminput fulwidthm ">
                                    <div class="erorshow" id="emailerrorHost"></div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 mgnB15">
                                    <label class="formlabel fontsize13 robotoregular graytext">Country of Residence
                                    <span class=" required">*</span></label>
                                    <select id="countryHost" name="country" class="formselect" style="width:100%" data-placeholder="Select a Country">
                                        <option value="39" selected="selected">Canada</option>
                                        <option value="227">United States</option>
                                        <option value="1">Afghanistan</option>
                                        <option value="2">Albania</option>
                                        <option value="3">Algeria</option>
                                        <option value="4">American Samoa</option>
                                        <option value="5">Andorra</option>
                                        <option value="6">Angola</option>
                                        <option value="7">Anguilla</option>
                                        <option value="8">Antarctica</option>
                                        <option value="9">Antigua and Barbuda</option>
                                        <option value="10">Argentina</option>
                                        <option value="11">Armenia</option>
                                        <option value="12">Aruba</option>
                                        <option value="13">Australia</option>
                                        <option value="14">Austria</option>
                                        <option value="15">Azerbaijan</option>
                                        <option value="16">Bahamas</option>
                                        <option value="17">Bahrain</option>
                                        <option value="18">Bangladesh</option>
                                        <option value="19">Barbados</option>
                                        <option value="20">Belarus</option>
                                        <option value="21">Belgium</option>
                                        <option value="22">Belize</option>
                                        <option value="23">Benin</option>
                                        <option value="24">Bermuda</option>
                                        <option value="25">Bhutan</option>
                                        <option value="26">Bolivia</option>
                                        <option value="27">Bosnia and Herzegovina</option>
                                        <option value="28">Botswana</option>
                                        <option value="29">Bouvet Island</option>
                                        <option value="30">Brazil</option>
                                        <option value="31">British Indian Ocean Territory</option>
                                        <option value="32">British Virgin Islands</option>
                                        <option value="33">Brunei</option>
                                        <option value="34">Bulgaria</option>
                                        <option value="35">Burkina Faso</option>
                                        <option value="36">Burundi</option>
                                        <option value="37">Cambodia</option>
                                        <option value="38">Cameroon</option>
                                        <option value="40">Cape Verde</option>
                                        <option value="41">Cayman Islands</option>
                                        <option value="42">Central African Republic</option>
                                        <option value="43">Chad</option>
                                        <option value="44">Chile</option>
                                        <option value="45">China</option>
                                        <option value="46">Christmas Island</option>
                                        <option value="47">Cocos Islands</option>
                                        <option value="48">Colombia</option>
                                        <option value="49">Comoros</option>
                                        <option value="50">Cook Islands</option>
                                        <option value="51">Costa Rica</option>
                                        <option value="52">Croatia</option>
                                        <option value="53">Cuba</option>
                                        <option value="54">Cyprus</option>
                                        <option value="55">Czech Republic</option>
                                        <option value="56">Democratic Republic of the Congo</option>
                                        <option value="57">Denmark</option>
                                        <option value="58">Djibouti</option>
                                        <option value="59">Dominica</option>
                                        <option value="60">Dominican Republic</option>
                                        <option value="61">East Timor</option>
                                        <option value="62">Ecuador</option>
                                        <option value="63">Egypt</option>
                                        <option value="64">El Salvador</option>
                                        <option value="65">Equatorial Guinea</option>
                                        <option value="66">Eritrea</option>
                                        <option value="67">Estonia</option>
                                        <option value="68">Ethiopia</option>
                                        <option value="69">Falkland Islands</option>
                                        <option value="70">Faroe Islands</option>
                                        <option value="71">Fiji</option>
                                        <option value="72">Finland</option>
                                        <option value="73">France</option>
                                        <option value="74">French Guiana</option>
                                        <option value="75">French Polynesia</option>
                                        <option value="76">French Southern Territories</option>
                                        <option value="77">Gabon</option>
                                        <option value="78">Gambia</option>
                                        <option value="79">Georgia</option>
                                        <option value="80">Germany</option>
                                        <option value="81">Ghana</option>
                                        <option value="82">Gibraltar</option>
                                        <option value="83">Greece</option>
                                        <option value="84">Greenland</option>
                                        <option value="85">Grenada</option>
                                        <option value="86">Guadeloupe</option>
                                        <option value="87">Guam</option>
                                        <option value="88">Guatemala</option>
                                        <option value="89">Guinea</option>
                                        <option value="90">Guinea-Bissau</option>
                                        <option value="91">Guyana</option>
                                        <option value="92">Haiti</option>
                                        <option value="93">Heard Island and McDonald Islands</option>
                                        <option value="94">Honduras</option>
                                        <option value="95">Hong Kong</option>
                                        <option value="96">Hungary</option>
                                        <option value="97">Iceland</option>
                                        <option value="98">India</option>
                                        <option value="99">Indonesia</option>
                                        <option value="100">Iran</option>
                                        <option value="101">Iraq</option>
                                        <option value="102">Ireland</option>
                                        <option value="103">Israel</option>
                                        <option value="104">Italy</option>
                                        <option value="105">Ivory Coast</option>
                                        <option value="106">Jamaica</option>
                                        <option value="107">Japan</option>
                                        <option value="108">Jordan</option>
                                        <option value="109">Kazakhstan</option>
                                        <option value="110">Kenya</option>
                                        <option value="111">Kiribati</option>
                                        <option value="112">Kuwait</option>
                                        <option value="113">Kyrgyzstan</option>
                                        <option value="114">Laos</option>
                                        <option value="115">Latvia</option>
                                        <option value="116">Lebanon</option>
                                        <option value="117">Lesotho</option>
                                        <option value="118">Liberia</option>
                                        <option value="119">Libya</option>
                                        <option value="120">Liechtenstein</option>
                                        <option value="121">Lithuania</option>
                                        <option value="122">Luxembourg</option>
                                        <option value="123">Macao</option>
                                        <option value="124">Macedonia</option>
                                        <option value="125">Madagascar</option>
                                        <option value="126">Malawi</option>
                                        <option value="127">Malaysia</option>
                                        <option value="128">Maldives</option>
                                        <option value="129">Mali</option>
                                        <option value="130">Malta</option>
                                        <option value="131">Marshall Islands</option>
                                        <option value="132">Martinique</option>
                                        <option value="133">Mauritania</option>
                                        <option value="134">Mauritius</option>
                                        <option value="135">Mayotte</option>
                                        <option value="136">Mexico</option>
                                        <option value="137">Micronesia</option>
                                        <option value="138">Moldova</option>
                                        <option value="139">Monaco</option>
                                        <option value="140">Mongolia</option>
                                        <option value="141">Montserrat</option>
                                        <option value="142">Morocco</option>
                                        <option value="143">Mozambique</option>
                                        <option value="144">Myanmar</option>
                                        <option value="145">Namibia</option>
                                        <option value="146">Nauru</option>
                                        <option value="147">Nepal</option>
                                        <option value="148">Netherlands</option>
                                        <option value="149">Netherlands Antilles</option>
                                        <option value="150">New Caledonia</option>
                                        <option value="151">New Zealand</option>
                                        <option value="152">Nicaragua</option>
                                        <option value="153">Niger</option>
                                        <option value="154">Nigeria</option>
                                        <option value="155">Niue</option>
                                        <option value="156">Norfolk Island</option>
                                        <option value="157">North Korea</option>
                                        <option value="158">Northern Mariana Islands</option>
                                        <option value="159">Norway</option>
                                        <option value="160">Oman</option>
                                        <option value="161">Pakistan</option>
                                        <option value="162">Palau</option>
                                        <option value="163">Palestinian Territory</option>
                                        <option value="164">Panama</option>
                                        <option value="165">Papua New Guinea</option>
                                        <option value="166">Paraguay</option>
                                        <option value="167">Peru</option>
                                        <option value="168">Philippines</option>
                                        <option value="169">Pitcairn</option>
                                        <option value="170">Poland</option>
                                        <option value="171">Portugal</option>
                                        <option value="172">Puerto Rico</option>
                                        <option value="173">Qatar</option>
                                        <option value="174">Republic of the Congo</option>
                                        <option value="175">Reunion</option>
                                        <option value="176">Romania</option>
                                        <option value="177">Russia</option>
                                        <option value="178">Rwanda</option>
                                        <option value="179">Saint Helena</option>
                                        <option value="180">Saint Kitts and Nevis</option>
                                        <option value="181">Saint Lucia</option>
                                        <option value="182">Saint Pierre and Miquelon</option>
                                        <option value="183">Saint Vincent and the Grenadines</option>
                                        <option value="184">Samoa</option>
                                        <option value="185">San Marino</option>
                                        <option value="186">Sao Tome and Principe</option>
                                        <option value="187">Saudi Arabia</option>
                                        <option value="188">Senegal</option>
                                        <option value="189">Serbia and Montenegro</option>
                                        <option value="190">Seychelles</option>
                                        <option value="191">Sierra Leone</option>
                                        <option value="192">Singapore</option>
                                        <option value="193">Slovakia</option>
                                        <option value="194">Slovenia</option>
                                        <option value="195">Solomon Islands</option>
                                        <option value="196">Somalia</option>
                                        <option value="197">South Africa</option>
                                        <option value="198">South Georgia and the South Sandwich Islands</option>
                                        <option value="199">South Korea</option>
                                        <option value="200">Spain</option>
                                        <option value="201">Sri Lanka</option>
                                        <option value="202">Sudan</option>
                                        <option value="203">Suriname</option>
                                        <option value="204">Svalbard and Jan Mayen</option>
                                        <option value="205">Swaziland</option>
                                        <option value="206">Sweden</option>
                                        <option value="207">Switzerland</option>
                                        <option value="208">Syria</option>
                                        <option value="209">Taiwan</option>
                                        <option value="210">Tajikistan</option>
                                        <option value="211">Tanzania</option>
                                        <option value="212">Thailand</option>
                                        <option value="213">Togo</option>
                                        <option value="214">Tokelau</option>
                                        <option value="215">Tonga</option>
                                        <option value="216">Trinidad and Tobago</option>
                                        <option value="217">Tunisia</option>
                                        <option value="218">Turkey</option>
                                        <option value="219">Turkmenistan</option>
                                        <option value="220">Turks and Caicos Islands</option>
                                        <option value="221">Tuvalu</option>
                                        <option value="222">U.S. Virgin Islands</option>
                                        <option value="223">Uganda</option>
                                        <option value="224">Ukraine</option>
                                        <option value="225">United Arab Emirates</option>
                                        <option value="226">United Kingdom</option>
                                        <option value="228">United States Minor Outlying Islands</option>
                                        <option value="229">Uruguay</option>
                                        <option value="230">Uzbekistan</option>
                                        <option value="231">Vanuatu</option>
                                        <option value="232">Vatican</option>
                                        <option value="233">Venezuela</option>
                                        <option value="234">Vietnam</option>
                                        <option value="235">Wallis and Futuna</option>
                                        <option value="236">Western Sahara</option>
                                        <option value="237">Yemen</option>
                                        <option value="238">Zambia</option>
                                        <option value="239">Zimbabwe</option>
                                    </select>
                                    <div class="erorshow" id="countyerrorHost"></div>
                                </div>
                            </div>
                            <div class="loginrow fulwidthm left josfinsanbold graytext ">
                                <div class="col-lg-6 col-md-6 col-sm-6 mgnB15">
                                    <label class="formlabel fontsize13 robotoregular graytext">Password <span
                                            class=" required">*</span></label>
                                    <input id="passwordHost" type="password" class="cmnfrminput fulwidthm"
                                           name="password">
                                    <div class="erorshow" id="passwrderrorHost"></div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 mgnB15">
                                    <label class="formlabel fontsize13 robotoregular graytext">Confirm Password
                                        <span class=" required">*</span></label>
                                    <input id="cpasswordHost" type="password" class="cmnfrminput fulwidthm"
                                           name="cpassword">
    
                                    <div class="erorshow" id="cpassworderrorHost"></div>
                                </div>
                            </div>
                            <div class="loginrow fulwidthm left josfinsanbold graytext mgnB15">
                                <div class="col-lg-6 col-md-6 col-sm-6 mgnB15 registerBtntx">
                                    <button class=" btn btn-success whitetext fulwidthm font-size14 robotomedium"
                                            onClick="registerHost()" type="submit">
                                        Register
                                    </button>
                                </div>
                            </div>
                            <div
                                class="loginrow fulwidthm left registerBtntxText josfinsanregular fontsize16 graytext mgnB15">
                                Already a MyOffice member? <a class="greentext signinclick">Log In </a>
                            </div>
                            <div class="socialAuthStages register">
                                <div
                                    class="loginrow orPlx fulwidthm left josfinsanregular fontsize16 graytext mgnB15 text-center">
                                    <span>or</span>
                                </div>
                                <div class="fontsize12 graytext text-center mb-3">Login Through</div>
                                <div class="text-center d-block m-auto w-25">
                                    <a href="{{ route('social.login', 'facebook') }}">
                                        <div class="text left pr-3">
                                            <img src="/images/facebook.png">
                                            <p class="robotoregular fontsize12 graytext text-uppercase">Facebook
                                            </p>
                                        </div>
                                    </a>
                                    <a href="{{ route('social.login', 'google') }}">
                                        <div class="text-center left">
                                            <img src="/images/google.png">
                                            <p class="robotoregular fontsize12 graytext text-uppercase">Google+</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>

@if(!is_api())
    @include('Layout::Home.parts.header')
@endif
@yield('content')
@include('Layout::Home.parts.footer')
@php event(new \Modules\Layout\Events\LayoutEndBody()); @endphp

</body>
</html>

