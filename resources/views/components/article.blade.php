@if(isset($articles))
    @foreach($articles as $article)
        <div class="col-md-4" style="padding: 0px;">
            <a href="{{ route('get.detail.article',[$article->a_slug, $article->id]) }}"><img src="{{ pare_url_file($article->a_avatar) }}" class="post-article2"></a>
        </div>
        <div class="col-md-8 article-all">
            <div class="article-title"><a href="{{ route('get.detail.article',[$article->a_slug, $article->id]) }}"><h5>{{ $article->a_name }}</h5></a></div>
            <div style="padding-top: 5px;"><i class="fa fa-clock-o fa-xs" style="color: #7f7f7f"><span> {{ time_elapsed_string($article->created_at) }}</span></i></div>
            <div style="padding-top: 5px; padding-bottom: 30px"><p>{{ $article->a_description }}</p></div>
        </div>
        <div class="clearfix"></div>
    @endforeach
    {!! $articles->links() !!}
@endif