@extends('admin.index')
@section('content')
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-green-sharp">
                    <span data-counter="counterup" data-value="7800">{{$ordersum}}</span>
                    <small class="font-green-sharp">$</small>
                    </h3>
                    <small>@awt('Total sales','en') </small>
                </div>

                <div class="icon">
                    <i class="fa fa-pie-chart"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="progress">
                    <?php
                    if($ordersum and $product){
                        $sum = $ordersum / $product  * 100 ;

                    }
                    ?>

                    <span @if($ordersum and $product) style="width:  {{$sum}}%;" @else style="width:  0%;" @endif  class="progress-bar progress-bar-success green-sharp">
                        <span class="sr-only">@if($ordersum and $product) {{$sum}} @else 0 @endif  @awt('PROGRESS','ar')</span>
                    </span>
                </div>
                <div class="status">
                    <div class="status-title"> @awt('PROGRESS','ar')</div>
                    <div class="status-number"> @if($ordersum and $product) {{$sum}} @else 0 @endif </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-green-sharp">
                    <span data-counter="counterup" data-value="7800">{{Visitor::count()}}</span>
                    <small class="font-green-sharp"></small>
                    </h3>
                    <small>@awt('Number of Visitors','en') </small>
                </div>

                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="progress">
                    <?php
                    if($user ){
                        $sumVisitor = $user / Visitor::count()  * 100 ;

                    }
                    ?>

                    <span @if($user) style="width:  {{$sumVisitor}}%;" @else style="width:  0%;" @endif  class="progress-bar progress-bar-success green-sharp">
                        <span class="sr-only">@if($user) {{$sumVisitor}} @else 0 @endif  @awt('PROGRESS','ar')</span>
                    </span>
                </div>
                <div class="status">
                    <div class="status-title"> @awt('PROGRESS','ar') </div>
                    <div class="status-number"> @if($user) {{$sumVisitor}} @else 0 @endif </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze">
                    <span data-counter="counterup" data-value="1349">{{$comment}}</span>
                    </h3>
                    <small>@awt('Number of comments','ar')</small>
                </div>
                <div class="icon">
                    <i class="fa fa-comments"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="progress">
                    <?php
                    $sumcomment = $comment / $user * 100;

                    ?>
                    <span style="width: {{$sumcomment}}%;" class="progress-bar progress-bar-success red-haze">
                        <span class="sr-only">{{$sumcomment}}% @awt('change','en')</span>
                    </span>
                </div>
                <div class="status">
                    <div class="status-title"> @awt('change','en') </div>
                    <div class="status-number"> {{$sumcomment}}% </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red-haze">
                        <span data-counter="counterup" data-value="1349">@if($product){{$product}}@endif</span>
                        </h3>
                        <small>@awt('Number of products','en')</small>
                    </div>
                    <div class="icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <?php
                        if( $order and $product){
                            $sumproduct = $order / $product  * 100 ;
                        }


                        ?>
                        <span   @if( $order and $product) style="width: {{$sumproduct}}%;" @else style="width: 0%;" @endif  class="progress-bar progress-bar-success red-haze">
                            <span class="sr-only"> @if( $order and $product){{$sumproduct}} @else 0 @endif% @awt('change','en')</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> @awt('change','en') </div>
                        <div class="status-number"> @if( $order and $product){{$sumproduct}} @else 0 @endif% </div>
                    </div>
                </div>
            </div>
        </div>

</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">{{trans('admin.dashboard')}}</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div id="dashboard_amchart_1" class="CSSAnimationChart">
                  <div class="portlet-body">
                  								<div class="table-scrollable">
                  									<table class="table table-striped table-bordered table-advance table-hover">
                  									<thead>
                  									<tr>
                  										<th>
                  											<i class="fa  fa-male"></i> @awt('ip','en')
                  										</th>
                  										<th class="hidden-xs">
                  											<i class="fa  fa-globe"></i> @awt('country','en')
                  										</th>
                  										<th>
                  											<i class="fa fa-circle-o-notch"></i> @awt('Number of visits','en')
                  										</th>
                                      <th>
                                        <i class="fa  fa-calendar"></i> @awt('first visit','en')
                                      </th>
                                      <th>
                                        <i class="fa  fa-calendar"></i> @awt('Last visit','en')
                                      </th>

                  									</tr>
                  									</thead>
                  									<tbody>
                                      @foreach($Visitor as $Visitor_get)

                  									<tr>
                  										<td class="highlight">
                  											<div class="success">
                  											</div>
                  											<a href="javascript:;">
                                          {{$Visitor_get->ip}}
 </a>
                  										</td>
                  										<td class="hidden-xs">
                                        {{$Visitor_get->country}}
                  										</td>
                  										<td>
                                        {{$Visitor_get->clicks}}
                  										</td>
                                      <td>
                                        {{$Visitor_get->created_at->toDayDateTimeString()}}
                                      </td>
                                      <td>
                                        {{$Visitor_get->updated_at->toDayDateTimeString()}}
                                      </td>

                  									</tr>
                @endforeach
                  									</tbody>
                  									</table>

                  								</div>
                                  <div class="page center">
                                    {!!$Visitor->links()!!}
                                  </div>
                  							</div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE BASE CONTENT -->
@endsection
