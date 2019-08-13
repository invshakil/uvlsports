<div class="col-md-9 col-sm-8">
    <div id="site-content">
        <div class="row">
            <div class="section lifestyle-section">
                <h1 class="section-title">ফুটবলের সর্বশেষ সংবাদ</h1>

                <div class="row">

                    @foreach($latest_articles as  $article)
                        <div class="col-md-4">
                            <div class="post medium-post" style="max-height: 300px; min-height: 300px;">
                                <div class="entry-header">
                                    <div class="entry-thumbnail">
                                        @if(file_exists('image_upload/post_image/resized/'.$article->image))
                                            <img class="img-responsive"
                                                 src="{{ asset('image_upload/post_image/resized/'.$article->image) }}"
                                                 alt=""/>
                                        @else
                                            <img class="img-responsive"
                                                 src="https://via.placeholder.com/272x160"
                                                 alt=""/>
                                        @endif
                                    </div>
                                </div>
                                <div class="post-content">
                                    <div class="entry-meta">
                                        <ul class="list-inline">
                                            <li class="publish-date"><a href="#"><i
                                                            class="fa fa-clock-o"></i> {{ $article->created_at->format('d-M-Y') }}
                                                </a></li>
                                            <li class="views"><a href="#"><i
                                                            class="fa fa-eye"></i>{{ $article->hit_count }}</a>
                                            </li>
                                            <li class="loves">
                                                @if(Auth::check())
                                                    @php
                                                        $status = $article->favByUser($article->favorites, auth()->user()->id);
                                                    @endphp
                                                    <a href="javascript:void(null)">
                                                        <i class="fa fa-heart-o save-favorite @if($status == 1) fav-color @endif"
                                                           id="fav{{ $article->id }}"
                                                           data-id="{{ $article->id }}"> {{ $article->favorites_count }}</i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('login') }}" class="save-favorite"
                                                       onclick="return confirm('To save as favorite, you will have to be logged in. Proceed?')">
                                                        <i class="fa fa-heart-o"></i> {{ $article->favorites_count }}
                                                    </a>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="{{ route('article.details', ['id'=>$article->id,'slug'=>$article->slug]) }}">{{ $article->title }}</a>
                                    </h2>
                                </div>
                            </div><!--/post-->

                        </div>
                    @endforeach

                    <div class="pagination-wrapper">
                        <ul class="pagination">
                            {{ $latest_articles->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/#site-content-->
</div>
