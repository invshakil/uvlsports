<div class="col-sm-3" id="sticky">
    <div id="sitebar">


        @include('frontend.follow_us')

        <div class="widget">
            <h1 class="section-title title">সর্বশেষ সংবাদ</h1>
            <ul class="post-list">
                @include('frontend.latest')
            </ul>
        </div>

        <div class="widget">
            <h1 class="section-title title">জনপ্রিয় সংবাদসমূহ</h1>
            <ul class="post-list">
                @include('frontend.popular')
            </ul>
        </div><!--/#widget-->
    </div><!--/#sitebar-->
</div>