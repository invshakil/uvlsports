<div class="row">
    @foreach($others_sports as $others_sport)
        <div class="col-sm-4">
            <div class="post feature-post">
                <div class="entry-header">
                    <div class="entry-thumbnail">
                        @if(file_exists('image_upload/post_image/resized/'.$others_sport->image))
                            <img class="img-responsive"
                                 src="{{ asset('image_upload/post_image/resized/'.$others_sport->image) }}"
                                 alt=""/>
                        @else
                            <img class="img-responsive"
                                 src="https://via.placeholder.com/300x200"
                                 alt=""/>
                        @endif
                    </div>
                    @php $categories = explode(',',$others_sport->category_id); $category_id = $categories[0]; @endphp
                    <div class="catagory technology"><span><a href="#">{{ $others_sport->category($category_id) }}</a></span></div>
                </div>
                <div class="post-content">
                    <div class="entry-meta">
                        <ul class="list-inline">
                            <li class="publish-date"><i class="fa fa-clock-o"></i><a href="#"> {{ $others_sport->created_at->format('d-M-Y') }} </a></li>
                            <li class="views"><i class="fa fa-eye"></i><a href="#">{{ $others_sport->hit_count }}</a></li>
                            <li class="loves">
                                @if(Auth::check())
                                    @php $status = $others_sport->favByUser($others_sport->favorites, auth()->user()->id); @endphp
                                    <a href="javascript:void(null)">
                                        <i class="fa fa-heart-o save-favorite @if($status == 1) fav-color @endif"
                                           id="fav{{ $others_sport->id }}"
                                           data-id="{{ $others_sport->id }}"> {{ $others_sport->favorites_count }}</i>
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="save-favorite"
                                       onclick="return confirm('To save as favorite, you will have to be logged in. Proceed?')">
                                        <i class="fa fa-heart-o"></i> {{ $others_sport->favorites_count }}
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                    <h2 class="entry-title">
                        <a href="{{ route('article.details', ['id'=>$others_sport->id,'slug'=>$others_sport->slug]) }}">{{  $others_sport->title }}</a>
                    </h2>
                </div>
            </div><!--/post-->
        </div>
    @endforeach

</div>