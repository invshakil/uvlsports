<ul class="post-list box-design">
    @foreach($popular_articles as $article)
        <li>
            <div class="post small-post">
                <div class="entry-header">
                    <div class="entry-thumbnail">
                        <img class="img-responsive"
                             src="{{ $article->thumb_image }}" alt=""/>
                    </div>
                </div>
                <div class="post-content">
                    @php $categories = explode(',',$article->category_id); $category_id = $categories[0]; @endphp
                    @php $category =  $article->category($category_id);@endphp
                    <div class="video-catagory"><a href="{{ route('article.by.category', ['slug'=>str_replace(' ','-',$category->bangla_name)]) }}">{{ $category->bangla_name }}</a></div>
                    <h2 class="entry-title">
                        <a href="{{ route('article.details', ['id'=>$article->id,'slug'=>$article->slug]) }}">{{ $article->sidebar_title }}</a>
                    </h2>
                </div>
            </div><!--/post-->
        </li>
    @endforeach
</ul>
