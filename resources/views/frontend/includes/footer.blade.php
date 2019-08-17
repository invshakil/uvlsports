<div class="footer-top">
    <div class="container text-center">
        <div class="logo-icon"><img class="img-responsive"
                                    src="{{ asset(logo()) }}" alt=""/>
        </div>
    </div>
</div>


<div class="bottom-widgets">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="widget">
                    <h1 class="section-title title">আমাদের সম্পর্কে</h1>

                    @if(footerContent())
                        <p align="justify" style="color: #aeaeae">
                            {{ footerContent() }}
                        </p>
                    @endif
                    <address>
                        @if(phone())
                            <p>Phone : {{ phone() }}</p>
                        @endif
                        @if(email())
                            <p>ইমেইল: <a href="mailto:{{ email() }}">{{ email() }}</a></p>
                        @endif
                    </address>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="widget">
                    <h1 class="section-title title">গুরুত্বপূর্ন লিঙ্ক</h1>
                    @if(footerLinks())
                    <ul>
                        @foreach(footerLinks() as $link)
                        <li><a href="{{ $link->link }}">{{ $link->title }}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            <div class="col-sm-4">
                <div class="widget news-letter">
                    <h1 class="section-title title">নিউজলেটার</h1>
                    <p>নতুন আর্টিক্যাল পাবলিশড হওয়া মাত্রই পড়তে চান? আজই সাবস্ক্রিপশন করে নিন
                    </p>

                    <form action="{{ route('create.subscriber') }}" method="post" id="subscribe-form"
                          name="subscribe-form">
                        {{ csrf_field() }}
                        <input type="text" placeholder="Your E-mail" name="subscription_email"
                               @if ($errors->has('subscription_email')) class="has-error" @endif>
                        @if ($errors->has('subscription_email'))
                            <div class="errors">{{ $errors->first('subscription_email') }}</div>
                        @endif
                        <button type="submit" name="subscribe" id="subscribe">সাবসাক্রাইব</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="footer-bottom">
    <div class="container">
        <div class="col-md-4 col-xs-12" style="padding-left: 0">
            <a href="{{ url('/robots.txt') }}">Robots</a>
        </div>
        <div class="col-md-4 col-xs-12">
            <a href="https://www.sshakil.com" target="_blank">Developed By Md. Syful Islam
                Shakil </a>&copy; {{ date('Y') }}
        </div>
        <div class="col-md-4 col-xs-12" style="padding-right: 0; text-align: right">
            <a href="{{ url('/sitemap') }}">Sitemap</a>
        </div>
    </div>

</div>
