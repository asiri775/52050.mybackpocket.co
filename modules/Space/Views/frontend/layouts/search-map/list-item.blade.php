<div class="bravo-list-item @if(!$rows->count()) not-found @endif">
    @if($rows->count())
        <div class="topbar-search mt-5 mb-5">
            <span
                class="count-string">{{ __("Showing :from - :to of :total Spaces",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
            <div class="control">
                @include('Space::frontend.layouts.search.orderby')
            </div>
        </div>
        <div class="list-item">
            <div class="row">

                @foreach($rows as $row)
                    <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6">
                        @include('Space::frontend.layouts.search.loop-gird')
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bravo-pagination" style="padding-bottom: 36px">
            <div class="search-list">{{ $rows->total() }} Listings | Page {{ $rows->currentPage() }}
                of {{ $rows->lastPage() }}</div>
            {{ $rows->appends(array_merge(request()->query(),['_ajax'=>1]))->links() }}
        </div>
    @else
        <div class="not-found-box">
            <h3 class="n-title">{{__("We couldn't find any spaces.")}}</h3>
            <p class="p-desc">{{__("Try changing your filter criteria")}}</p>
            {{--<a href="#" onclick="return false;" click="" class="btn btn-danger">{{__("Clear Filters")}}</a>--}}
        </div>
    @endif
</div>
