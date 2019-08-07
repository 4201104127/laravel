@if(isset($articlesHot))
    @foreach($articlesHot as $article)
        <div class="article-all">
            <a href="{{ route('get.detail.article',[$article->a_slug, $article->id]) }}"><img src="{{ pare_url_file($article->a_avatar) }}" class="post-article2"></a><br>
            <div class="article-title"><a href="{{ route('get.detail.article',[$article->a_slug, $article->id]) }}"><h5>{{ $article->a_name }}</h5></a></div>
            <div style="padding-top: 5px;"><i class="fa fa-clock-o fa-xs" style="color: #7f7f7f"><span> {{ time_elapsed_string($article->created_at) }}</span></i></div>
            <div style="padding-top: 5px; padding-bottom: 30px"><p>{{ $article->a_description }}</p></div>
        </div>
    @endforeach
    {!! $articlesHot->links() !!}
@endif