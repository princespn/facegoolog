@extends('layouts.app')

@section('content')
<style>
scrollbar-width: thin;
</style>

   <main id="main">
        <span id="errorSpanC" style="text-align: center;">
            @if(\Session::get('fail'))
                <div class="alert alert-success">{{\Session::get('fail')}}</div>
            @endif
        </span>
        <!--Section-table-open-my-report-->
        <section class="my-report px-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-md-6">

                            <h2>My Reports</h2>

                    </div>
          <!--           <div class="col-lg-5 col-md-6">
                        <div class="my-report-search">
                            <div class="form-group has-search">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)" data-url="{{ url('/dashboard/permit/download/'.\Crypt::encrypt('report')) }}" class="submit-print" ><i class="fa fa-download" ></i><span style="margin-left:10px;">Download PDF</span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" data-url="{{ url('/dashboard/permit/print/'.\Crypt::encrypt('report')) }}" class="submit-print"><i class="fa fa-print"></i><span style="margin-left:10px;">Print</span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" id="sharePermitPop"><i class="fa fa-link"></i><span style="margin-left:10px;">Share</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-5 col-md-6">
                        <div class="my-report-search">
                            <div class="form-group has-search">

                                <input type="text" class="form-control" placeholder="Search for another address">
                                <button type="submit" class="btn-search">
                                    <span class="fa fa-search form-control-feedback"></span></button>
                            </div>
                        </div>
                    </div> -->
                </div>

            </div>
        </section>
        <!--Section-table-my-report-end-->

        <!--Section-table-open-address-->
        <section class="table address-collaps px-5 pt-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="table100-nextcols table-responsive">
                            <div class="col-sm-12">
                                <div class="row bg-light">
                                    <div class="col-lg-7 col-md-7">
                                        <div class="my-report-txt mt-2  mb-2">
                                            <!-- <h6 class="text-dark">PERMITS</h6> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5">
                                        <div class="my-report-search mt-2 mb-2">
                                                <ul>
                                                 <!--    <li class="col-auto float-right">
                                                        <a href="javascript:void(0);" id="sharePermitPop">
                                                            <i class="fa fa-link"> </i> Share </a>
                                                    </li>   -->
                                                     <li class="col-auto float-right">
                                                        <button id="sharePermitPop" class="enabled_btn  btn-link hide">
                                                            <i class="fa fa-print"></i> Share
                                                        </button>
                                                        <button  data-toggle="tooltip" data-placement="top" title="Please Select Permits to share" class="disabled_btn text-decoration-none btn-link text-dark show">
                                                            <i class="fa fa-print"></i> Share
                                                        </button>

                                                    </li>

                                                     <li class="col-auto float-right">
                                                        <button data-url="{{ url('/dashboard/permit/print/'.\Crypt::encrypt('report')) }}" class="enabled_btn submit-print btn-link hide">
                                                            <i class="fa fa-print"></i> Print
                                                        </button>
                                                        <button  data-toggle="tooltip" data-placement="top" title="Please Select Permits to Print" class="disabled_btn text-decoration-none btn-link text-dark show">
                                                            <i class="fa fa-print"></i> Print
                                                        </button>

                                                    </li>
                                                <li class="col-auto  float-right">
                                                    <button data-url="{{ url('/dashboard/permit/download/'.\Crypt::encrypt('report')) }}" class="enabled_btn submit-print  btn-link hide" >
                                                        <i class=" fa fa-download"></i> Download
                                                    </button>
                                                    <button data-toggle="tooltip" data-placement="top" title="Please Select Permits to Download" class="disabled_btn btn-link text-decoration-none text-dark show">
                                                        <i class=" fa fa-download"></i> Download
                                                    </button>
                                                </li>
                                                </ul>
                                        </div>
                                    </div>
                               </div>
                            </div>
                            <div id="successDiv" style="color:green;text-align: center;"></div>
                            <table class="table table-condensed" id="accordion">
                                <thead>
                                    <tr class="row100 head">
                                        <th class="cell100 column11">
                                            <div class="custom-checkbox-new ">
                                                <label class="label">
                                                    <input type="checkbox" class=" form-check-input ckbCheckAll label__checkbox checkBoxClass"  id="check2" name="print_all" value="all"/>
                                                    <span class="label__text">
                                                      <span class="label__check">
                                                        <i class="fa fa-check icon"></i>
                                                      </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <!-- All -->
                                        </th>
                                        <th class="cell100 column11">Address</th>
                                        <th class="cell100 column11"></th>
                                        <th class="cell100 column11"></th>
                                        <th class="cell100 column11">City</th>
                                        <th class="cell100 column11"></th>
                                        <th class="cell100 column11">State</th>
                                        <th class="cell100 column11"></th>
                                        <th class="cell100 column11">Zip code</th>
                                        <th class="cell100 column11">Text Updates</th>
                                        <th class="cell100 column11"></th>
                                        <th class="cell100 column11">Report Expires</th>
                                        <!-- <th class="cell100 column12">Last viewed <i class="fa fa-long-arrow-down"></i></th> -->

                                    </tr>
                                </thead>
                                <tbody class="selectedReports">
                                    @if(!empty($data))
                                        @for($s=0; $s < count($data);$s++)
                                            @foreach($data[$s] as $key => $value)
                                                <tr data-toggle="collapse" data-target="#demo{{$s}}" class="accordion-toggle accordion row100 body" aria-expanded="false">
                                                    <td class="cell100 column11">
                                                        <!-- <input type="checkbox" class="checkBoxClass form-check-input" onclick="event.stopPropagation();"  id="check_{{$key}}" name="print[]" value="{{$value['id']}}"> -->
                                                        <div class="custom-checkbox-new"  onclick="event.stopPropagation();">
                                                            <label class="label">
                                                                <input type="checkbox" class="checkBoxClass form-check-input label__checkbox"   id="check_{{$key}}" name="print[]" value="{{$value['id']}}" />
                                                                <span class="label__text">
                                                                  <span class="label__check">
                                                                    <i class="fa fa-check icon"></i>
                                                                  </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="cell100 column11">
                                                        <!-- {{$value['street']}} -->
                                                        @php
                                                            $addressArr = explode(', ',$value['street']);
                                                        @endphp
                                                            {{$addressArr[0]??'-'}}
                                                    </td>
                                                    <td class="cell100 column11">
                                                        <i class="fa fa-chevron-down rotate"></i>
                                                    </td>
                                                    <td class="cell100 column11"></td>
                                                    <td class="cell100 column11">{{$value['city']}}</td>
                                                     <td class="cell100 column11"></td>
                                                    <td class="cell100 column11">{{$value['state']}}</td>
                                                    <td class="cell100 column11"></td>
                                                    <td class="cell100 column11">{{$value['zipcode']}}</td>
                                                    <td class="cell100 column11">
                                                        <label class="switch">
                                                            <input type="checkbox" class="checkboxID" value="{{ Crypt::encrypt($value['alert']) }}" @if($value['alert'] == 1) checked="checked" @endif data-val="{{ Crypt::encrypt($value['street'])}}">
                                                            <div class="slider"></div>
                                                        </label>
                                                    </td>

                                                    <td class="cell100 column11"></td>
                                                    <td class="cell100 column11">{{$value['valid']}}</td>
                                                    <!-- <td class="cell100 column12">{{$value['lastseen']}}</td> -->

                                                </tr>
                                                <tr>
                                                    <td colspan="13" class="hiddenRow p-0">
                                                        <div id="demo{{$s}}" class="accordian-body collapse">
                                                             <div class="table100-nextcols table-responsive inner-table">
                                                                <table class="table">
                                                                    <thead>
                                                                @php $t = 0; @endphp
                                                                @foreach($value['result'] as $key1 => $value1)
                                                                      @if($key1 == 'issued')
                                                                            <tr class="bg-light text-white">
                                                                               <!--  <td class="cell100 column0"></td>
                                                                                <td class="cell100 column1"></td> -->
                                                                                <td colspan="10"> OPEN PERMITS ({{count($value1)}})</td>
                                                                            </tr>
                                                                        @else
                                                                            <tr  class="bg-light text-white">
                                                                               <!--  <td class="cell100 column0"></td>
                                                                                <td class="cell100 column1"></td> -->
                                                                                <td colspan="10">CLOSED PERMITS ({{count($value1)}})</td>
                                                                            </tr>
                                                                        @endif
                                                                         <tr class="row100 head">
                                                                           <!--  <th class="cell100 column0"></th>
                                                                             <th class="cell100 column1"></th> -->
                                                                            <!-- <th class="cell100 column2">Control #</th> -->
                                                                            <th class="cell100 column11">Permit Number</th>
                                                                            <th class="cell100 column11">Issue Date</th>
                                                                            <th class="cell100 column11">Work Type</th>
                                                                            <th class="cell100 column11">Description</th>
                                                                            <!-- <th class="cell100 column7">Subcodes</th> -->
                                                                            <th class="cell100 column11">Status</th>
                                                                            <!-- <th class="cell100 column9">Close Date</th> -->
                                                                            <th class="cell100 column11">Certificates</th>
                                                                            <th class="cell100 column11">Paid Permit Fee</th>
                                                                            <th class="cell100 column11">Job Value</th>
                                                                            <th class="cell100 column11">Applicant Name</th>
                                                                        </tr>
                                                                    @foreach($value1 as $key2 => $value2)

                                                                        <tr class="row100 body">
                                                                            <!-- <td class="cell100 column0">
                                                                            </td>
                                                                            <td class="cell100 column1">

                                                                            </td> -->
                                                                            <!-- <td class="cell100 column2">36940</td> -->
                                                                            <td class="cell100 column11">{{$value2->PermitNumber}}</td>
                                                                            <td class="cell100 column11">{{date('m/d/y',strtotime($value2->PermitEffectiveDate))}}</td>
                                                                            <td class="cell100 column11">{{$value2->PermitType}}</td>
                                                                            <td class="cell100 column11">{{$value2->PermitDescription}}</td>
                                                                            <!-- <td class="cell100 column7">N/A</td> -->
                                                                            <td class="cell100 column11">{{($value2->PermitStatus=='complete')?'closed':'open'}}</td>
                                                                            <!-- <td class="cell100 column9">{{ date('m/d/y',strtotime($value2->PermitStatusDate)) }}</td> -->
                                                                            <td class="cell100 column11">N/A</td>
                                                                            <td class="cell100 column11">{{$value2->PermitFee?'$'.$value2->PermitFee:'-'}}</td>
                                                                            <td class="cell100 column11">{{$value2->PermitJobValue?'$'.$value2->PermitJobValue:'-'}}</td>
                                                                            <td class="cell100 column11">{{$value2->ApplicantName?'$'.$value2->ApplicantName:'-'}}</td>

                                                                        </tr>
                                                                     @endforeach
                                                                @php $t++; @endphp
                                                                @endforeach
                                                                </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endfor
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
                              <!--
                             <div class="col-sm-12">
                                 <div class="row bg-light p-1 mt-2">
                                <div class="col-lg-7 col-md-7">

                                </div>
                                <div class="col-lg-5 col-md-5">
                                    <div class="my-report-search mt-2 mb-2">
                                            <ul>
                                              <li class="col-auto float-right">
                                                    <a href="javascript:void(0)"  data-url="{{ url('/dashboard/permit/print/'.\Crypt::encrypt('report')) }}" class="submit-print selected-print">
                                                        <i class="fa fa-print"></i>
                                                        <span class="ml-2 span-selected">Print selected</span></a>
                                                </li>
                                                <li class="col-auto  float-right">
                                                    <a href="javascript:void(0)" data-url="{{ url('/dashboard/permit/download/'.\Crypt::encrypt('report')) }}" class="submit-print selected-print" >
                                                        <i class="fa fa-download" ></i><span  class="ml-2">Download selected</span></a>
                                                </li>  -->
                                              <!--   <li class="col-auto float-right">
                                                    <a href="javascript:void(0);" id="sharePermitPop"><i class="fa fa-link"></i><span style="margin-left:10px;">Share</span></a>
                                                </li>
                                            </ul>
                                    </div>
                                </div>
                            </div>
                             </div>
                        </div>-->
                    </div>
                </div>
                </div>
            </div>
        </section>

        <!--Section-table-open-address-End-->
        <section class="popup-already-account permit-popup" id="poShFrnPop">
            <div class="popup-table">
                <div class="popup-view-report-txt">
                    <div class="permit-txt">
                        <a href="#" class="close-popup" id="popupClosee">&times;</a>
                    </div>
                    <div class="inputEmail">
                        <form>
                        @csrf
                            <label>Multiple Email Address</label>
                            <input type="text" name="email" id="shareEmail" class="form-control" placeholder="Enter Multiple Email Address By Comma Separated">
                            <span id="spanPh"></span>
                            <input id="formSharSub" class="btn btn-effect" type="submit"  value="submit" data-url="/share/report">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


