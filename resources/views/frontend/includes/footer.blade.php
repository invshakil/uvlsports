<div class="footer-top">
    <div class="container text-center">
        <div class="logo-icon"><img class="img-responsive"
                                    src="{{ asset('image_upload/system_logo.png') }}" alt=""/>
        </div>
    </div>
</div>


<div class="bottom-widgets">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="widget">
                    <h1 class="section-title title">আমাদের সম্পর্কে</h1>
                    <p>
                        এই ওয়েবসয়াইটটি বাংলাদেশের সবচেয়ে বড় ফুটবল কমিউনিটি 'ফুটবল ফ্যানস বাংলাদেশের' একটি অলাভজনক প্রোজেক্ট। ওয়েবসাইটের সকল লেখা আমাদের গ্রুপ মেম্বাদের নিজেদের লেখা।
                    </p>
                    <address>
                        <p>ফোন : +৮৮০১৬৭৫৩৩২২৬৫</p>
                        <p>ইমেইল: <a href="mailto:uvlsports@gmail.com">uvlsports@gmail.com</a></p>
                    </address>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="widget">
                    <h1 class="section-title title">গ্রুত্বপূর্ণ লিঙ্ক</h1>
                    <ul>
                        <li><a href="https://www.facebook.com/groups/footballfansbd">আমাদের গ্রুপ</a></li>
                        <li><a href="https://www.facebook.com/uvlsportsofficial/">আমাদের পেইজ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="widget news-letter">
                    <h1 class="section-title title">নিজলেটার</h1>
                    <p>নতুন আর্টিক্যাল পাবলিশড হওয়া মাত্রই পড়তে চান? আজই সাবস্ক্রিপশন করে নিন
                    </p>

                    <form action="{{ route('create.subscriber') }}" method="post" id="subscribe-form"
                          name="subscribe-form">
                        {{ csrf_field() }}
                        <input type="text" placeholder="Your E-mail" name="email">
                        <button type="submit" name="subscribe" id="subscribe">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="footer-bottom">
    <div class="container text-center">
        <p><a href="https://www.sshakil.com" target="_blank">Developed By Saif Shakil </a>&copy; {{ date('Y') }}
        </p>
    </div>
</div>
