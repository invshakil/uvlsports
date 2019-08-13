<div class="section">

    <div class="row">
        <div class="site-content col-md-12">
            <div class="row">

                <div class="col-sm-7">
                    <div id="home-slider">

                        @foreach($sliders as $slider)

                            <div class="post feature-post">
                                <div class="entry-header">
                                    <div class="entry-thumbnail">

                                        @if(file_exists('image_upload/post_image/'.$slider->image))
                                            <img class="img-responsive"
                                                 src="{{ asset('image_upload/post_image/'.$slider->image) }}"
                                                 alt=""/>
                                        @else
                                            <img class="img-responsive"
                                                 src="https://via.placeholder.com/800x450"
                                                 alt=""/>
                                        @endif
                                    </div>
                                    @php $categories = explode(',',$slider->category_id); $category_id = $categories[0]; @endphp
                                    <div class="catagory world"><a
                                                href="{{ route('article.by.category', ['slug'=>str_replace(' ','-',$slider->category($category_id))]) }}">
                                            {{ $slider->category($category_id) }}
                                        </a>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <div class="entry-meta">
                                        <ul class="list-inline">
                                            <li class="publish-date"><i class="fa fa-clock-o"></i><a
                                                        href="#"> {{ $slider->created_at->format('d-M-Y') }} </a></li>
                                            <li class="views"><i class="fa fa-eye"></i><a
                                                        href="#">{{ $slider->hit_count }}</a></li>
                                            <li class="loves">
                                                @if(Auth::check())
                                                    @php $status = $slider->favByUser($slider->favorites, auth()->user()->id); @endphp
                                                    <a href="javascript:void(null)">
                                                        <i class="fa fa-heart-o save-favorite @if($status == 1) fav-color @endif"
                                                           id="fav{{ $slider->id }}"
                                                           data-id="{{ $slider->id }}"> {{ $slider->favorites_count }}</i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('login') }}" class="save-favorite"
                                                       onclick="return confirm('To save as favorite, you will have to be logged in. Proceed?')">
                                                        <i class="fa fa-heart-o"></i> {{ $slider->favorites_count }}
                                                    </a>
                                                @endif
                                            </li>

                                        </ul>
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="{{ route('article.details', ['id'=>$slider->id,'slug'=>$slider->slug]) }}">{{ $slider->title }}</a>
                                    </h2>
                                </div>
                            </div><!--/post-->

                        @endforeach


                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="widget">
                        <ul class="post-list" style="background: transparent">
                            @foreach($tweets as $tweet)
                                <li style="max-height: 122px">
                                    <div class="post small-post">
                                        <div class="entry-header">
                                            <div class="entry-thumbnail">
                                                <img class="img-responsive"
                                                     src="{{ url($tweet->image) }}" alt=""/>
                                            </div>
                                        </div>
                                        <div class="post-content">
                                            <div class="video-catagory" style="padding-top: 5px"><a
                                                        href="#">{{ $tweet->created_at->format('d-M-Y') }}</a></div>
                                            <h2 class="entry-title">
                                                <a href="#"
                                                   style="font-size: 14px">{{ $tweet->title }}</a>
                                            </h2>
                                        </div>
                                    </div><!--/post-->
                                </li>
                            @endforeach

                        </ul>

                    </div>
                </div>
            </div>

            {{--OTHERS SPORTS--}}
            @include('frontend.home.other_sports')
        </div><!--/#content-->


    </div>
</div><!--/.section-->

<div class="section add inner-add">
    <a href="#"><img class="img-responsive" src="{{ asset('frontend') }}/images/post/add/add2.jpg" alt=""/></a>
</div><!--/.section-->