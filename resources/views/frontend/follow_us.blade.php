<div class="widget follow-us">
    <h1 class="section-title title">ফলো করুন</h1>
    <ul class="list-inline social-icons">

        @if(facebook())
            <li><a href="{{ facebook() }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
        @endif

        @if(twitter())
            <li><a href="{{ twitter() }}"><i class="fa fa-twitter"></i></a></li>
        @endif

        @if(youtube())
            <li><a href="{{ youtube() }}"><i class="fa fa-youtube"></i></a></li>
        @endif

        @if(google())
            <li><a href="{{ google() }}"><i class="fa fa-google-plus"></i></a></li>
        @endif

        @if(linkedin())
            <li><a href="{{ linkedin() }}"><i class="fa fa-linkedin"></i></a></li>
        @endif

    </ul>
</div>