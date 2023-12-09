<div class="container howworks">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            @if($title)
                <h2>{{$title}}</h2>
            @endif
                <div class="row">
                    @foreach($rows as $row)
                            @include('News::frontend.blocks.list-news.loop')
                    @endforeach
                </div>

        </div>
    </div>
</div>
