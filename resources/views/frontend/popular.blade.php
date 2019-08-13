<ul class="post-list">
    @foreach($popular_articles as $article)
        <li>
            <div class="post small-post">
                <div class="entry-header">
                    <div class="entry-thumbnail">
                        <img class="img-responsive"
                             src="{{ asset('image_upload/post_image/thumbs/'.$article->image) }}" alt=""/>
                    </div>
                </div>
                <div class="post-content">
                    @php $categories = explode(',',$article->category_id); $category_id = $categories[0]; @endphp
                    <div class="video-catagory"><a href="#">{{ $article->category($category_id) }}</a></div>
                    <h2 class="entry-title">
                        <a href="{{ route('article.details', ['id'=>$article->id,'slug'=>$article->slug]) }}">{{ $article->title }}</a>
                    </h2>
                </div>
            </div><!--/post-->
        </li>
    @endforeach
</ul>
