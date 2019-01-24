@extends('home.index')
@section('content')
    <!-- HOME -->
    <div style=" background-color: #F2F2F2;">
        <section id="hire" style=" padding: 30px 0 0px 0;">

            <div class="container">

                <div class="thumbnail"
                     style="box-shadow: 0 1px 6px rgba(57,73,76,0.35); padding: 20px 30px;">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="section-title">
                                <h2>@if(app('l') == 'ar'){{ $partner->title_ar}}@else{{ $partner->title_en }}@endif
                                    {{--<small></small>--}}
                                </h2>
                            </div>
                            {{--<div class="owl-carousel owl-theme owl-courses"></div>--}}

                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    @if(app('l') == 'ar'){!! $partner->desc_ar !!}@else{!! $partner->desc_en !!}@endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@stop
