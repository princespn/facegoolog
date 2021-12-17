@extends('layouts.app')

@section('content')
	

   <main id="main">
        <!--Section-table-open-my-report-->
        <section class="my-report px-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="my-report-txt">
                            <h2>Billing History</h2>
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
                            <table class="table table-condensed text-left" id="accordion">
                                <thead class="bg-light pl-2">
                                    <tr class="row100 head">
                                        <th class="cell100 column1 pl-2">No.</th>
                                        <th class="cell100 column1 pl-2">Plan Name</th>
                                        <th class="cell100 column1 pl-2">Price</th>
                                        <th class="cell100 column1 pl-2">Valid</th>
                                        <!-- <th class="cell100 column4">Stripe Number</th> -->
                                        <th class="cell100 column1 pl-2">Transaction date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        //echo "<pre>";print_r($data);die;
                                    ?>
                                    @if(!empty($data))
                                        @foreach($data as $key => $value)
                                            <tr>
                                                <td class="cell100 column1">{{$key+1}}</td>
                                                <td class="cell100 column1">{{$value->title}}</td>
                                                <td class="cell100 column1">${{$value->price}}</td>
                                                <td class="cell100 column1">{{$value->plan_period}}</td>
                                                <!-- <td class="cell100 column5">{{ $value->stripe_customer}}</td> -->
                                                <td class="cell100 column1">{{ date('Y-m-d', strtotime($value->payment_date)) }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="cell100 column1">No Data Found!</td>
                                            <td class="cell100 column2"></td>
                                            <td class="cell100 column3"></td>
                                            <td class="cell100 column4"></td>
                                            <td class="cell100 column5"></td>
                                            <td class="cell100 column6"></td>
                                            <td class="cell100 column7"></td>
                                            <td class="cell100 column8"></td>
                                            <td class="cell100 column9"></td>
                                            <td class="cell100 column10"></td>
                                            <td class="cell100 column11"></td>
                                            <td class="cell100 column12"></td>
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