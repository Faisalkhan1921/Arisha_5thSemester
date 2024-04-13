@extends('providerpanel.index_master')

@section('user_content')
<div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    <!-- <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>add item</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                @php 
                                                $id = Auth::guard('admin')->user()->id;
                                                $data = App\Models\SeekerContact::where('provider_id',$id)->get();
                                                $totalseeker = count($data);
                                                @endphp 
                                                <h2>{{$totalseeker}}</h2>
                                                <span>Seeker Contacted</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                @php 
                                                $data = App\Models\category::all();
                                                $totalseeker = count($data);
                                                @endphp 
                                                <h2>{{$totalseeker}}</h2>
                                                <span>Total Categories</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                @php 
                                                $id = Auth::guard('admin')->user()->id;
                                                $data = App\Models\Services::where('user_id',$id)->get();
                                                $totalseeker = count($data);
                                                @endphp 
                                                <h2>{{$totalseeker}}</h2>
                                                <span>Total Services</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                @php 
                                                $id = Auth::guard('admin')->user()->id;
                                                $data = App\Models\Shops::where('user_id',$id)->get();
                                                $totalseeker = count($data);
                                                @endphp 
                                                <h2>{{$totalseeker}}</h2>
                                                <span>Total SHops</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                  

@endsection