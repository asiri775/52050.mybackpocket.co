@extends('layouts.common_home')
@section('content')
    @if ($row->template_id)
        <div class="layout1 homePage">

            {!! $row->getProcessedContent() !!}


        </div>
    @else
        <div class="layout1 homePage">
            <div class=" container container-fixed-lg">
                <!-- Tab panes -->
                <div class="sub-page">
                    <div class="slide-left padding-20 sm-no-padding" id="tab5">
                        <div class="row row-same-height">
                            <div class="col-md-12">
                                <h1 class="inner pt-5 pl-5 main-title">{!! clean($translation->title) !!}</h1>
                                <div class="padding-30 sm-padding-5">
                                    <p>{!! $translation->content !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="brands">
            <img src="{{ asset('images/brands.png') }}" alt="brands" />
        </div>
    @endif
@endsection
