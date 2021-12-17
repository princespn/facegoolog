@include('includes.header')
	
	 <main id="main">


        <!--Section-Faq-Grid-->

        <section class="faq">
            <div class="container">
                {{ Breadcrumbs::render('faq') }}
                <div class="row">
                    <div class="col-lg-9">
                        <div class="heading-section">
                            <h2>faq</h2>
                        </div>
                    </div>
                </div>
                <div class="row faq-grid">
                    <div class="col-lg-9">
                        <div class="faq-txt">
                            <!--Accordion wrapper-->
                            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                                <!-- Accordion card -->
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingOne1">
                                        <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                            <h5 class="mb-0">
                                                <div class="faq-heading">
                                                    <figure>
                                                        <img src="images/icn-accordian.png" alt="icn">
                                                    </figure>
                                                    How often is permit data updated?
                                                </div> <i class="fa fa-angle-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>

                                    <!-- Card body -->
                                    <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                                        <div class="card-body">
                                            <p> Each city handles permit data in a different way. Some cities fully digitize their permit data and make it available to services on a regular basis. Most permit data is updated monthly but some cities provide
                                                data more or less frequently. </p>
                                        </div>
                                    </div>

                                </div>
                                <!-- Accordion card -->

                                <!-- Accordion card -->
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingTwo2">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                            <h5 class="mb-0">
                                                <div class="faq-heading">
                                                    <figure>
                                                        <img src="images/icn-accordian.png" alt="icn">
                                                    </figure>
                                                    What if permit information isn’t available for a specific address?
                                                </div> <i class="fa fa-angle-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>

                                    <!-- Card body -->
                                    <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordionEx">
                                        <div class="card-body">
                                            <p>A number of cities across the United States are fully digitized and make permit information available through services like PermitSearch.com. Others are digitized, but do not license the data. And finally, some
                                                cities have yet to digitize their permit data. When this occurs, individuals must request the data directly from the building and zoning or city construction office. They will provide a copy of data records
                                                when requested either directly or through an OPRA request.</p>
                                        </div>
                                    </div>

                                </div>
                                <!-- Accordion card -->

                                <!-- Accordion card -->
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingThree3">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                                            <h5 class="mb-0">
                                                <div class="faq-heading">
                                                    <figure>
                                                        <img src="images/icn-accordian.png" alt="icn">
                                                    </figure>
                                                    What is an OPRA request?
                                                </div> <i class="fa fa-angle-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>

                                    <!-- Card body -->
                                    <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3" data-parent="#accordionEx">
                                        <div class="card-body">
                                            <p>(P.L. 2001, c. 404), commonly abbreviated OPRA, is a statute that provides a right to the public to access certain public records in specific states, as well as the process by which that right may be exercised.
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <!-- Accordion card -->

                                <!-- Accordion card -->
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingfour4">
                                        <a data-toggle="collapse" data-parent="#accordionEx" href="#collapsefour4" aria-expanded="true" aria-controls="collapsefour4">
                                            <h5 class="mb-0">
                                                <div class="faq-heading">
                                                    <figure>
                                                        <img src="images/icn-accordian.png" alt="icn">
                                                    </figure>
                                                    Who is responsible for open permits?
                                                </div> <i class="fa fa-angle-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>

                                    <!-- Card body -->
                                    <div id="collapsefour4" class="collapse" role="tabpanel" aria-labelledby="headingfour4" data-parent="#accordionEx">
                                        <div class="card-body">
                                            <p>ANY open permits and or code violations need to be fully addressed and resolved by the potential home buyer, prior to closing.  Failing to do so can be very costly for a homeowner. Open permits remain with the
                                                property, despite any change in ownership.  Failure to uncover any open permits prior to closing means that these permits become the responsibility of the new owner.  Requirements to remedy an open permit
                                                can include fines, fees, and completion of pending work and removal of work that does not meet building requirements.  Open permits can be quite costly and time consuming.</p>
                                        </div>
                                    </div>

                                </div>
                                <!-- Accordion card -->

                                <!-- Accordion card -->
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingfive5">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapsefive5" aria-expanded="false" aria-controls="collapsefive5">
                                            <h5 class="mb-0">
                                                <div class="faq-heading">
                                                    <figure>
                                                        <img src="images/icn-accordian.png" alt="icn">
                                                    </figure>
                                                    What is an open or expired permit?
                                                </div> <i class="fa fa-angle-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>

                                    <!-- Card body -->
                                    <div id="collapsefive5" class="collapse" role="tabpanel" aria-labelledby="headingfive5" data-parent="#accordionEx">
                                        <div class="card-body">
                                            <p>An open or expired permit is a permit which has been issued by a County or Municipal building department but has not been formally finalized in accordance with established guidelines, typically by means of a
                                                final inspection, within the time provided.  Once the time has lapsed for the permit to be closed by the issuing department it is referred to as open or expired.</p>

                                        </div>
                                    </div>

                                </div>
                                <!-- Accordion card -->

                                <!-- Accordion card -->
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingsix6">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapsesix6" aria-expanded="false" aria-controls="collapsesix6">
                                            <h5 class="mb-0">
                                                <div class="faq-heading">
                                                    <figure>
                                                        <img src="images/icn-accordian.png" alt="icn">
                                                    </figure>
                                                    Why do I need an open permit search?
                                                </div> <i class="fa fa-angle-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>

                                    <!-- Card body -->
                                    <div id="collapsesix6" class="collapse" role="tabpanel" aria-labelledby="headingsix6" data-parent="#accordionEx">
                                        <div class="card-body">
                                            <p>One of the biggest obstacles for home sellers these days is the issue of open permits.  Since many Counties have declared war on open permits, homeowners are finding themselves at the mercy of county inspectors
                                                when the time comes to close on the sale of their home.  Attorneys and title companies may recommend that buyers not close if a permit search reveals open permits.</p>
                                        </div>
                                    </div>

                                </div>
                                <!-- Accordion card -->


                                <!-- Accordion card -->
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingeight8">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseeight8" aria-expanded="false" aria-controls="collapseeight8">
                                            <h5 class="mb-0">
                                                <div class="faq-heading">
                                                    <figure>
                                                        <img src="images/icn-accordian.png" alt="icn">
                                                    </figure>
                                                    Will title insurance cover open or expired permits?
                                                </div> <i class="fa fa-angle-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>

                                    <!-- Card body -->
                                    <div id="collapseeight8" class="collapse" role="tabpanel" aria-labelledby="headingeight8" data-parent="#accordionEx">
                                        <div class="card-body">
                                            <p>A good title company or real estate closing attorney will take care of this for you but you have to ask for it because it normally is not done.  Title companies can close the sale on a property with an open
                                                permit on it, and most will never even conduct an open permit search; it’s not the same as a lien search.  You should order an Open Permit Search at the same time you schedule your inspection.
                                            </p>

                                            <p>This is a service that I provide for my Buyers. I usually go to the Building Code department of the town or municipality where the home is located and pull the record on all permitted activity on the home.  If
                                                there is work that has been done that has not been permitted that is an issue that should be addressed by the home inspector.</p>
                                        </div>
                                    </div>

                                </div>
                                <!-- Accordion card -->

                                <!-- Accordion card -->
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingten10">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseten10" aria-expanded="false" aria-controls="collapseten10">
                                            <h5 class="mb-0">
                                                <div class="faq-heading">
                                                    <figure>
                                                        <img src="images/icn-accordian.png" alt="icn">
                                                    </figure>
                                                    Will my closing agent check for open or expired permits?
                                                </div> <i class="fa fa-angle-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>

                                    <!-- Card body -->
                                    <div id="collapseten10" class="collapse" role="tabpanel" aria-labelledby="headingten10" data-parent="#accordionEx">
                                        <div class="card-body">
                                            <p>Oftentimes the person selling the home or their listing agent has no idea about his or her own permit situation. They may have had some work done and their contractor told them everything was good to go and
                                                somewhere down the road they will find out that the permit is still open and if you are the new owner this is now your problem to deal with.  Sometimes work was done before the current owner bought the home
                                                and they have no idea anything could still be open.</p>
                                            <p>The best way to protect yourself is to do an open permit search.  If you are selling your home it is a good idea to make sure your home has all of its permit issues in order because nothing can kill a deal faster
                                                than when a buyer finds out there are open permits  If you are the buyer, take care of it before you face a potential issue in the future.
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <!-- Accordion card -->

                                <!-- Accordion card -->
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingeleven11">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseeleven11" aria-expanded="false" aria-controls="collapseeleven11">
                                            <h5 class="mb-0">
                                                <div class="faq-heading">
                                                    <figure>
                                                        <img src="images/icn-accordian.png" alt="icn">
                                                    </figure>
                                                    Who is responsible to close an open permit?
                                                </div> <i class="fa fa-angle-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>

                                    <!-- Card body -->
                                    <div id="collapseeleven11" class="collapse" role="tabpanel" aria-labelledby="headingeleven11" data-parent="#accordionEx">
                                        <div class="card-body">
                                            <p>Open permits can be grounds for the title company to balk or the lender to renege on financing.  Uncovering open permits and closing them typically falls on the shoulders of the seller but may not be written
                                                in a standard contract. Every State or County’s standard contracts vary.  Make sure you understand the terms and conditions involving permits in whatever contract you are using. It often can be grounds for
                                                terminating a contract.</p>
                                        </div>
                                    </div>

                                </div>
                                <!-- Accordion card -->


                                <!-- Accordion card -->
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingtwelve12">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapsetwelve12" aria-expanded="false" aria-controls="collapsetwelve12">
                                            <h5 class="mb-0">
                                                <div class="faq-heading">
                                                    <figure>
                                                        <img src="images/icn-accordian.png" alt="icn">
                                                    </figure>
                                                    Is it really that important? What is the worst that can happen?
                                                </div> <i class="fa fa-angle-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>

                                    <!-- Card body -->
                                    <div id="collapsetwelve12" class="collapse" role="tabpanel" aria-labelledby="headingtwelve12" data-parent="#accordionEx">
                                        <div class="card-body">
                                            <p>If open or expired permits exist and are not closed prior to closing, these permits become the responsibility of the new homeowner. The new owner will be responsible for paying all fees and/or fines and will
                                                be forced to complete the pending work.  If the permit is not properly closed, the building department may be able to order the removal of the work on the property.</p>
                                        </div>
                                    </div>

                                </div>
                                <!-- Accordion card -->



                                <!-- Accordion card -->
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingtfourteen14">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapsefourteen14" aria-expanded="false" aria-controls="collapsefourteen14">
                                            <h5 class="mb-0">
                                                <div class="faq-heading">
                                                    <figure>
                                                        <img src="images/icn-accordian.png" alt="icn">
                                                    </figure>
                                                    What if the contractor is no longer in business?
                                                </div> <i class="fa fa-angle-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>

                                    <!-- Card body -->
                                    <div id="collapsefourteen14" class="collapse" role="tabpanel" aria-labelledby="headingfourteen14" data-parent="#accordionEx">
                                        <div class="card-body">
                                            <p>If your contractor is no longer in business, you have a couple of options:
                                            </p>

                                            <p>You can close the permits yourself. This involves contacting the Building and Zoning Department; arranging for any missing inspections; following up with inspectors and the department to make sure that the permit
                                                is closed on the computer.  Or, you can contact a local permit expeditor to close the open permits for you.</p>
                                        </div>
                                    </div>

                                </div>
                                <!-- Accordion card -->



                                <!-- Accordion card -->
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingthirteen13">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapsethirteen13" aria-expanded="false" aria-controls="collapsethirteen13">
                                            <h5 class="mb-0">
                                                <div class="faq-heading">
                                                    <figure>
                                                        <img src="images/icn-accordian.png" alt="icn">
                                                    </figure>
                                                    Found an open permit.  Now what?
                                                </div> <i class="fa fa-angle-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>

                                    <!-- Card body -->
                                    <div id="collapsethirteen13" class="collapse" role="tabpanel" aria-labelledby="headingthirteen13" data-parent="#accordionEx">
                                        <div class="card-body">
                                            <p>If there are any open permits on your home, permit search or the building and zoning department in your city can provide you with the name and contact information for whomever pulled the permits.  You can then
                                                contact the contractor to get the permit closed.</p>
                                        </div>
                                    </div>

                                </div>
                                <!-- Accordion card -->






                            </div>
                            <!-- Accordion wrapper -->
                        </div>

                        <div class="load-more-btn">
                            {{-- <a class="btn btn-effect" href="#">Load more</a> --}}
                        </div>

                    </div>

                    <div class="col-lg-3">

                        <div class="faq-topic">
                            <h3>Search Topics</h3>
                            <div class="faq-topic-search">
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control" name="keyword" placeholder="Search for help">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </section>

        <!--Section-Faq-Grid-End-->


    </main>

@include('includes.footer')