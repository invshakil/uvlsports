<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.includes.header_script')

    @yield('after_style')
</head><!--/head-->
<body>

<div id="main-wrapper" class="homepage">
    <header id="navigation">
        <div class="navbar" role="banner">
            {{--TOP BAR INCLUDE--}}
            @include('frontend.includes.top_bar')


            <div id="menubar" class="container">
            {{--NAVIGATION INCLUDE--}}

            @include('frontend.includes.navigation')


            @include('frontend.includes.searchNlogin')
            <!-- searchNlogin -->

            </div>
        </div>
    </header><!--/#navigation-->


    {{--CONTENT --}}

    @yield('content')


</div><!--/#main-wrapper-->

<footer id="footer">
    @include('frontend.includes.footer')
</footer>


@include('frontend.includes.footer_script')

@yield('after_script')


<script type="text/javascript" src="{{ asset('frontend') }}/js/jquery.subscribe-better.min.js"></script>

<div class="subscribe-me text-center" id="subscribe-show">
    <h1>নতুন আর্টিক্যাল পাবলিশড হওয়া মাত্রই পড়তে চান? </h1>
    <h2>আজই সাবস্ক্রিপশন করে নিন</h2>
    <a href="#close" class="sb-close-btn"><img class="<img-responsive></img-responsive>"
                                               src="{{ asset('frontend') }}/images/others/close-button.png"
                                               alt=""/></a>
    <form action="{{ route('create.subscriber') }}" method="post" id="popup-subscribe-form" name="subscribe-form">
        {{ csrf_field() }}
        <div class="input-group">
            <span class="input-group-addon"><img src="{{ asset('frontend') }}/images/others/icon-message.png"
                                                 alt=""/></span>
            <input type="text" placeholder="Enter your email" name="email">
            <button type="submit" name="subscribe">Go</button>
        </div>
    </form>
</div>  <!--/.subscribe-me-->

<script>
    $(document).ready(function () {
        if (sessionStorage.getItem('popState') != 'shown') {
            $('#subscribe-show').css('display', 'block');
        } else {
            $('#subscribe-show').css('display', 'none');
        }

    })
</script>


<script>
    $(document).ready(function () {

        $('.save-favorite').on('click', function (e) {
            var string = e.target.id;
            var id = parseInt(string.replace(/[A-Za-z$-]/g, ""));
            @if(Auth::check())
                user_id = "{{ auth()->user()->id }}";
            @endif
            $.ajax({
                method: "post",
                url: "{{ url('save-favorite-article') }}",
                data: {id: id, user_id: user_id, '_token': "{{ csrf_token() }}"},
                success: function (data) {
                    articleSelector = $("#" + string + "");
                    if (data.user_status == 1) {
                        articleSelector.text(" " + data.total_number + " ");
                        articleSelector.addClass("fav-color");
                        toastr.success("This article saved as your favorite article.");
                    } else {
                        articleSelector.text(" " + data.total_number + " ");
                        articleSelector.removeClass("fav-color");
                        toastr.success("This article removed from your favorite articles list.");
                    }

                },
                error: function (error) {
                    console.log(error);
                }

            })
        })
    })
</script>

<style>
    .fav-color {
        color: #ed1c24;
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: #ed1c24;
    }
</style>

<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
            @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}";


    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

</body>
</html>