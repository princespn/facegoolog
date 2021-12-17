@extends('layouts.app')

@section('content')
	

   <main id="main">
        <!--Section-table-open-my-report-->
        <section class="my-report px-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="my-report-txt">
                            <h2>My Subscription</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

         <!--Section-table-open-address-->
        <section class="table address-collaps px-5">
            <div class="container-fluid">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="table100-nextcols table-responsive">
                            <!-- <p>PERMITS</p> -->
                            <table class="table table-condensed" id="accordion">
                                <thead class="bg-light">
                                    <tr class="row100 head">
                                        <th class="cell100 ">No</th>
                                        <th class="cell100 ">Plan Name</th>
                                        <th class="cell100 ">Price</th>
                                        <th class="cell100 ">Report</th>
                                        <th class="cell100 ">Start Date</th>
                                        <th class="cell100 ">End Date</th>
                                        <th class="cell100 ">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-left">
                                    @if(!$data->isEmpty())
                                        @foreach($data as $key => $value)
                                            <tr>
                                                <td class="cell100 ">{{$key+1}}</td>
                                                <td class="cell100 ">{{$value->title}}</td>
                                                <td class="cell100 ">${{$value->price}}</td>
                                                <td class="cell100 ">{{$value->report}}</td>
                                                <td class="cell100 ">{{ date('m/d/y',strtotime($value->plan_start)) }}</td>
                                                <td class="cell100 ">{{ date('m/d/y',strtotime($value->plan_end)) }}</td>
                                                <td class="cell100 ">{{$value->status}}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center" colspan="7">You do not have any active subscriptions at this time.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection