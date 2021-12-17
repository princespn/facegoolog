@php 
    if(isset($_GET['permit']) && $_GET['permit'] == 'cancel'){
        \Session::forget('PermitRequestData');
    }
@endphp
@include('includes.header')
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
    <main id="main">        
        <section class="hero" style="background-image: url(./images/hero-bg.jpg);">
            <div class="loaderST" style="display: none;">
                <div class="loaderr"></div>
            </div>
            <div class="container">
                <form action="javascript:void(0);" method="post">
                    @csrf
                    <div class="hero-txt" data-aos="zoom-in" data-aos-duration="3000">
                        <h1>Your permit search starts here!</h1>
                        <div class="form-group has-search">
                            <input type="text" class="form-control searchPR" placeholder="Enter address" autocomplete="off" name="searchNAME" id="searchPR">
                            <button type="submit" class="btn-search" id="searchBTN">
                                <span class="fa fa-search form-control-feedback"></span>
                                Search
                            </button>
                            <div class="droplistResult">
                                            
                            </div>
                        </div>
                    </div> 
                </form> 
            </div>
        </section>
              <!-- <form id="address-form" action="" method="get" autocomplete="off"> -->
  

        <section class="grey-box-text">
            <div class="container">
                <div class="heading-section">
                    <h2>Buy or Sell with Confidence!</h2>
                    <p>Don’t let open permits cause a deal to fall through.</p>
                </div>
            </div>
        </section>
        <section class="how-it-works">
            <div class="container">
                <div class="heading-section">
                    <h2>How it works</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="how-it-works-txt">
                            <figure><img src="images/how-work1.png" alt="img"> </figure>
                            <h3><a href="#"> Search address</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="how-it-works-txt">
                            <figure><img src="images/how-work-Fire-inspection.png" alt="img"> </figure>
                            <h3><a href="#">View permit history</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="how-it-works-txt">
                            <figure><img src="images/how-work-System-software-development.png" alt="img"> </figure>
                            <h3><a href="#"> Download report</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="how-it-works testimonials-section">
            <div class="container">
                <div class="heading-section">
                    <h2>“What Customers Are Saying About Permit Search”</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="how-it-works-txt">
                            <img src="images/testimonials-img.jpg" alt="img">
                            <div class="quote-img">
                                <img src="images/quote.svg" alt="img">
                            </div>
                            <p>I’m so glad I used permit search before buying my last house. We discovered open permits that could have derailed the process.</p>
                            <h3><a href="#"> Emil </a></h3>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="how-it-works-txt">
                            <img src="images/testimonials-img2.jpg" alt="img">
                            <div class="quote-img">
                                <img src="images/quote.svg" alt="img">
                            </div>
                            <p>Before selling my house I downloaded a report on Permit Search. We found 2 open permits that had to be closed before we could sell.</p>
                            <h3><a href="#"> Dan </a></h3>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="how-it-works-txt">
                            <img src="images/testimonials-img3.jpg" alt="img">
                            <div class="quote-img">
                                <img src="images/quote.svg" alt="img">
                            </div>
                            <p>I run a permit search on every house. All of my clients can buy and sell with confidence knowing there are no open permits.</p>
                            <h3><a href="#"> Stephanie </a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-content faq" >
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    <h1 class=" mb-4 text-center">Frequently Asked Questions</h1>
                    </div>
                    
                    <div class="col-12">
                        <div class="accordion" id="accordionExample">            
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                    <button class="btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">What is an open or expired permit?</button>
                                    </h5>             
                                </div>
                                <div id="collapse1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                    <div class="card-body pl-0">
                                    <p>An open or expired permit is a permit which has been issued by a County or Municipal building department but has not been formally finalized in accordance with established guidelines, typically by means of a final inspection, within the time provided.  Once the time has lapsed for the permit to be closed by the issuing department it is referred to as open or expired.</p>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                    <button class="btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">What if permit data isn’t available for a specific address?</button>
                                    </h5>             
                                </div>
                                <div id="collapse2" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                    <div class="card-body pl-0">
                                    <p>A number of cities across the United States are fully digitized and make permit information available through services like PermitSearch.com. Others are digitized, but do not license the data. And finally, some cities have yet to digitize their permit data. When this occurs, individuals must request the data directly from the building and zoning or city construction office. They will provide a copy of data records when requested either directly or through an OPRA request.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                    <button class="btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">How often is permit data updated?</button>
                                    </h5>             
                                </div>
                                <div id="collapse3" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                    <div class="card-body pl-0">
                                    <p>Each city handles permit data in a different way. Some cities fully digitize their permit data and make it available to services on a regular basis. Most permit data is updated monthly but some cities provide data more or less frequently.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                    <button class="btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">Who is responsible for open permits?</button>
                                    </h5>             
                                </div>
                                <div id="collapse4" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                    <div class="card-body pl-0">
                                    <p>ANY open permits and or code violations need to be fully addressed and resolved by the potential home buyer, prior to closing.  Failing to do so can be very costly for a homeowner. Open permits remain with the property, despite any change in ownership.  Failure to uncover any open permits prior to closing means that these permits become the responsibility of the new owner.  Requirements to remedy an open permit can include fines, fees, and completion of pending work and removal of work that does not meet building requirements.  Open permits can be quite costly and time consuming.</p>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div> 
                </div>
            </div>
        </section> 
        
    <section class="{{(isset($_GET['getcredits']) && $_GET['getcredits']==='yes')?'show':'hide'}}">
        @include('includes.popup-sections');    
    </section>    
    </main>
@include('includes.footer')

@if(\Session::get('usePermit') == 0 && (\Session::get('viewReportPopUp') != 'yes' || \Session::get('PermitRequestData') != null))
    <section class="popup-already-account view-report-popup top-popup-background display-no-credits-popup {{(isset(Auth::guard('web')->user()->id) && \Session::get('PermitRequestData')!= null && \Session::get('usePermit')==0)?'show':'hide'}}">
        <div class="popup-table">
            <div class="popup-view-report-txt">
                <div class="view-report-txt">
                    <h2 style="text-align: center;">Alert!</h2>
                </div>
                <p>You do not have enough credits to view this report. Please <a href="{{ url('/pricing') }}"><b>click here</b></a> to purchase additional credits.</p>
            </div>
        </div>
    </section>
@else

    @if( \Session::get('PermitRequestData') != null && \Session::get('usePermit')==0)
        <section class="popup-already-account popup-account view-report-popup top-popup-background display-no-credits-popup {{(\Session::get('PermitRequestData')!= null && \Session::get('usePermit')==0)?'show':'hide'}}">
            <div class="popup-table">
                <div class="popup-view-report-txt">
                    <div class="view-report-txt">
                        <h2 style="text-align: center;">Alert!</h2>
                    </div>
                    <p>You do not have enough credits to view this report. Please <a href="{{ url('/pricing') }}"><b>click here</b></a> to purchase additional credits.</p>
                </div>
            </div>
        </section>
    @elseif( \Session::get('PermitRequestData') != null && \Session::get('usePermit')>0)
        <section class="popup-already-account popup-account top-popup-background view-report-popup display-yes-credits-popup {{(\Session::get('PermitRequestData')!= null)?'show':'hide'}}" id="">
            <div class="popup-table" id>
                <div class="popup-view-report-txt">
                    <div class="view-report-txt text-center">
                        <strong>Permit Request Payment</strong>
                    </div>
                    <p>For Permit Request, this will remove 1 credit from your account. You currently have <b>{{ \Session::get('usePermit') }}</b> @if( \Session::get('usePermit') > 1) credits @else credit @endif remaining. On successful payment we will start Permit search process.
                    </p>
                </div>
                <div class="blue-bg-btn bg-white">
                    <a class="btn btn-effect" href="{{url('/?permit=cancel')}}">Cancel</a> 
                    <a class="btn btn-effect" id="conTVieTabPermitRequest" href="#">
                    Continue </a> 
                    <small class="conTVieTab_clicked hide"><i class="fa fa-spinner fa-small fa-spin" aria-hidden="true"></i>  We are processing.. </small>
            </div>

            </div>
        </section>
    @endif
@endif 
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
    <script type="text/javascript">
        $(function() {           
            var $form = $(".require-validation");           
            $('form.require-validation').bind('submit', function(e) {
                e.preventDefault();           
                if (!$form.data('cc-on-file')) {
                  e.preventDefault();
                  Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                  Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                  }, stripeResponseHandler);
                }          
            });
          
          function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('#stPEss').text(response.error.message).show().delay(4000).fadeOut("slow");
                    return false;
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                       
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }           
        });
    </script>
