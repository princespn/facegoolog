    <section class="popup-sec">
        <!--<a href="#" class="btnn">button for animated popup window</a> -->
        <div class="popup popup-loginn <?php if(\Session::has('loginPOPUP')): ?> is-active <?php endif; ?>">
            <div class="popup__close">
                <figure><img src="<?php echo e(asset('images/x.png')); ?>" alt="close" /></figure>
            </div>
            <div class="popup-i">
                <h2>Login</h2>
                <?php if(\Session::has('loginPOPUP')): ?>
                <p style="color:red;">Please Login/Signup to continue.</p>
                <?php endif; ?>
                <div class="login">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="email"><?php echo e(__('E-Mail Address')); ?></label>
                                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php if($message != "We can't find a user with that email address."): ?> is-invalid <?php endif; ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <?php if($message != "We can't find a user with that email address."): ?> value="<?php echo e(old('email')); ?>" <?php endif; ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>  autocomplete="email" autofocus>

                                    <span id="LoginErrEm"></span>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                    <?php if($message != "We can't find a user with that email address."): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <!--  <input type="password" class="form-control" placeholder="Password">  -->

                                    <div class="input-group" id="show_hide_password">
                                        <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" autocomplete="current-password">
                                        <div class="input-group-addon">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>

                                        <span id="LoginErrPa"></span>
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <cite><div class="btn-forgot"> <a href="<?php echo e(route('password.request')); ?>" ><?php echo e(__('Forgot Your Password?')); ?></a></div></cite>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" id="loginFormVal" class="btn btn-effect">Login</button>
                            </div>
                        </div>
                        <div class="or">or</div>
                        <div class="signin-social-media"><a class="btn" href="<?php echo e(url('auth/facebook')); ?>"><i class="fa fa-facebook"></i> Sign in with Facebook</a>
                            <a class="btn" href="<?php echo e(url('auth/google')); ?>"><i class="fa fa-google"></i> Sign in with Google</a>
                        </div>
                        <p>New here? <a class="open-signup" href="javascript:void(0)">Sign up</a></p>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--Section-popup-recover-->
    <section class="popup-sec popup-recover <?php if(\Session::get('forgetPass')=='yes'): ?> is-active <?php endif; ?>">

        <!--<a href="#" class="btnn">button for animated popup window</a> -->
        <div class="popup-recover <?php if(\Session::get('forgetPass')=='yes'): ?> is-active <?php endif; ?>">
            <div class="popup__close">
                <figure>&times;</figure>
            </div>
            <div class="popup-i">
                <h2>Can't log in?</h2>
                <div class="login">
                    <form method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="email"><?php echo e(__("We'll send a recovery link to")); ?></label>
                                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <?php if($message != 'These credentials do not match our records.'): ?> is-invalid <?php endif; ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <?php if($message != 'These credentials do not match our records.'): ?> value="<?php echo e(old('email')); ?>" <?php endif; ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> required autocomplete="email" autofocus>

                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <?php if($message != 'These credentials do not match our records.'): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-effect"><?php echo e(__('Send Password Reset Link')); ?></button>
                            </div>
                        </div>
                        <p><a class="back-login" href="#">Return to Log in</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--Section-popup-signup-->
    <section class="popup-sec popup-signup">

        <!--<a href="#" class="btnn">button for animated popup window</a> -->
        <div class="popup-sign-up">
            <div class="popup__close">
                <figure><img src="<?php echo e(asset('images/x.png')); ?>" alt="close" /></figure>
            </div>
            <div class="popup-i">
                <h2>Sign Up</h2>
                <div class="login">
                    <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><?php echo e(__('First Name')); ?></label>
                                    <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><?php echo e(__('Last Name')); ?></label>
                                    <input id="name" type="text" class="form-control <?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="lname" value="<?php echo e(old('lname')); ?>" required autocomplete="lname" autofocus>

                                    <?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><?php echo e(__('E-Mail Address')); ?></label>
                                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <?php if($message != 'These credentials do not match our records.'): ?> is-invalid <?php endif; ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <?php if($message != 'These credentials do not match our records.'): ?> value="<?php echo e(old('email')); ?>" <?php endif; ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> required autocomplete="email">

                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <?php if($message == 'These credentials do not match our records.'): ?>
                                    <?php else: ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><?php echo e(__('Password')); ?></label>
                                    <!--  <input type="password" class="form-control" placeholder="Password">  -->

                                    <div class="input-group" id="show_hide_password">
                                        <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">                               
                                        <div class="input-group-addon">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>

                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><?php echo e(__('Confirm Password')); ?></label>
                                    <!--  <input type="password" class="form-control" placeholder="Password">  -->

                                    <div class="input-group" id="show_hide_password">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        <div class="input-group-addon">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>

                                    </div>

                                    <div class="form-check accept">
                                        <label class="form-check-label" for="check2">
                                            <input type="checkbox" class="form-check-input" id="check2"
                                            name="option2" value="something" required>By signing up, I accept the <a href="<?php echo e(url('/terms-and-conditions')); ?>">Terms &
                                            Privacy policies</a>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-effect"><?php echo e(__('Sign Up')); ?></button>
                            </div>
                        </div>

                        <p>Already registered? <a class="back-login" href="javascript:void(0)">Log in</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section-popup-End-->

    <!-- Old Footer start -->
    <!-- <footer id="footer">

        <div class="container">
            <div class="copy-right">
                Copyright 2021
            </div>
            <div class="bottom-menu">
                <ul>
                    <li><a href="<?php echo e(url('/tems-and-conditions')); ?>">Terms & Conditions</a> </li>
                    <li><a href="<?php echo e(url('/privacy-policy')); ?>">Privacy Policy</a> </li>
                    <li><a href="<?php echo e(url('/contact-us')); ?>">Contact Us</a> </li>
                </ul>
            </div>
        </div>
        <div class="disclaimer-text">
            Disclaimer: We can not guarantee that all permits are shown for every property.
        </div>

    </footer>
-->

<!-- Old Footer ends -->

<footer class="new-footer">
   <div class="container">
       <div class="row">
           <div class="col-lg-7">
            <div class="disclaimer-text">
                Disclaimer: We can not guarantee that all permits are shown for every property.
            </div>
        </div>
        <div class="col-lg-5">
            <div class="bottom-menu">
                <ul>
                    <li><a href="<?php echo e(url('/terms-and-conditions')); ?>">Terms</a> </li>
                    <li><a href="<?php echo e(url('/privacy-policy')); ?>">Privacy Policy</a> </li>
                    <li><a href="<?php echo e(url('/contact-us')); ?>">Contact</a> </li>
                </ul>
            </div>
        </div>

    </div>
</div>
</footer>
<!--Section-table-popup-->

<!-- RESULT NOT FOUND POPUP -->
<section class="popup-already-account permit-popup errorPOP" style="display: none;">
    <div class="popup-table">
        <div class="popup-permit-txt">
            <div class="permit-txt">
                <a href="#" class="close-popup-no-address-popup" id="popupCloseNoAddress">&times;</a>
            </div>
            <h5>Permit Information for <b><span id="searchRes"> </span></b></h5>
            <p>The address you searched for is not in our database, this is due to one of the following:</p>
            <ul>
                <li>The data is not available in digital format.</li>
                <li>The city has not released permit data for this address.</li>
                <li>The city does not license permit data.</li>
            </ul>
            <br>
            <h5>We can still obtain permit history</h5>
            <p>Permit history can still be obtained through an <a href="#">OPRA</a> request which is a manual process that uses the freedom of information act. Permitsearch.com can complete this process for you. Would you like to continue?</p>
            <!-- <div style="width: 0px;" class="blue-bg-btn" id="contAddress"><a class="btn btnn-effect" href="#">CANCEL</a></div> -->
            <div class="blue-bg-btn" style="width: 0px;" id="cnctUpPop"><a class="btn btnn-effect" href="#">Continue</a></div>
        </div>
    </div>
</section>

<section class="popup-already-account permit-popup " id="contAddressPOP">
    <div class="popup-table active-popup">
        <div class="popup-permit-txt address-req-form">                    
            <div class="permit-txt ">
                <a href="#" class="close-popup" id="popupClosew">&times;</a>
            </div>
            <h4 class="col-lg-12 text-center">Permit Request Form</h4>                
            <form method="POST" action="#" id="addressRequestForm">
                <div class="row">
                        <small class="col-lg-4">
                            Step 1: Complete Form 
                        </small>
                        <small class="col-lg-4"> 
                            Step 2: Pay for Service 
                        </small>
                        <small class="col-lg-4">
                            Step 3: Receive Permit Data
                        </small>
                     <div class="col-lg-12 text-center border-top mt-2">
                        <h7><b>Basic Details </b></h7>
                    </div>                        
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>First Name :<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" autocomplete="off" placeholder=" " name="first_name" id="first_name" required>
                            <span id="span_first_name" class="errSpanClass text-left"></span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Last Name :<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" autocomplete="off" placeholder=" " name="last_name" id="last_name" required>
                            <span id="span_last_name" class="errSpanClass text-left"></span>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Email Address :<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" autocomplete="off" placeholder=" " name="email_address" id="email_address" required>
                            <span id="span_email_address" class="errSpanClass text-left"></span>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Phone Number :</label>
                            <input type="number" class="form-control nuFldEnaClas" autocomplete="off" placeholder=" " name="contact_no">
                            <span id="span_contact_no" class="errSpanClass text-left"></span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Street Address :<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" autocomplete="off" placeholder="123 Main Street" name="property_street_name" id="property_street_name" required> 
                            <!-- <small class="float-left"> Note : Only House no & Main street</small><br/> -->
                            <span id="span_property_street_name" class="errSpanClass text-left"></span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>City :<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" autocomplete="off" placeholder=" " name="property_city" id="property_city" required>
                            <span id="span_property_city" class="errSpanClass text-left"></span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>State <span class="text-danger">*</span></label>
                            <?php if(isset($states)): ?>
                                <select class="form-control form-select arro" id="property_state" name="property_state" id="property_state" required>
                                    <option value=""> Select State</option> 
                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($state->code??'-'); ?>"><?php echo e($state->name??'-'); ?></option> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php endif; ?>
                            <span id="span_property_state" class="errSpanClass text-left"></span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Zip Code :<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" autocomplete="off" placeholder=" " name="zip_code" id="zip_code" required>
                            <span id="span_property_zip_code" class="errSpanClass text-left"></span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Planning to purchase in :<span class="text-danger">*</span></label>
                            <select class="form-control form-select arro" id="purchase_with_in" name="purchase_with_in" required>
                                <option value=""> Select </option> 
                                <option value="0 - 3 months">0 - 3 months</option>
                                <option value="4 - 6 months">4 - 6 months</option>
                                <option value="6+ months">6+ months</option>
                            </select>
                            <span id="span_purchase_with_in" class="errSpanClass text-left"></span>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Additional Comment's :</label>
                            <textarea class="form-control" rows="2"  name="description" id="description" placeholder=""></textarea>
                            <span  class="errSpanClass text-left"></span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label> &nbsp;</label>
                        <button type="button" class="btn btn-effect" id="submitAddressRequest">Submit</button>
                    </div>
                </div>
            </form> 
            <span id="spann" class="errClass"></span>
        </div>
    </div>
</section>
        <?php if(\Session::get('usePermit') == 0 && \Session::get('viewReportPopUp') != 'yes'): ?>
            <section class="popup-already-account view-report-popup top-popup-background display-no-credits-popup hide">
                <div class="popup-table">
                    <div class="popup-view-report-txt">
                        <div class="view-report-txt">
                            <h2 style="text-align: center;">Alert!</h2>
                        </div>
                        <p>You do not have enough credits to view this report. Please <a href="<?php echo e(url('/pricing')); ?>"><b>click here</b></a> to purchase additional credits.</p>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <?php if(\Session::get('viewReportPopUp') == 'yes'): ?>
            <?php else: ?>
                <section class="popup-already-account view-report-popup top-popup-background display-yes-credits-popup display-yes-credits-popup <?php echo e((\Session::get('PermitRequestData')!= null)?'show':'hide'); ?>">
                    <div class="popup-table">
                        <div class="popup-view-report-txt">
                            <div class="view-report-txt text-center">
                                <strong>Permit Search</strong>
                            </div>
                            <p>Viewing this report will remove 1 credit from your account. You currently have <b><?php echo e(\Session::get('usePermit')); ?></b> <?php if( \Session::get('usePermit') > 1): ?> credits <?php else: ?> credit <?php endif; ?> remaining.
                            After unlocking the report, you can download, print, and email for up to 12 months.</p>
                        </div>
                        <div class="blue-bg-btn bg-white">
                            <a class="btn btn-effect" href="<?php echo e(url('/')); ?>">Cancel</a>
                            <a class="btn btn-effect" id="conTVieTabPermitRequest" href="#">Continue</a> </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php endif; ?>

        <!--Section-table-popup-End-->

        <script src="<?php echo e(asset('/js/bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('/js/permitsearch.js')); ?>"></script>
        <script src="<?php echo e(asset('/js/customDev.js')); ?>"></script>
        <script src="<?php echo e(asset('/js/jquery.mark.min.js')); ?>"></script>
        <script src="<?php echo e(asset('/js/customMark.js')); ?>"></script>
        <script src="<?php echo e(asset('/js/jquery.validate.js')); ?>"></script>

        <script>
            var pricing_page_flag = <?php if(Request::segment(1) == 'pricing'): ?> true <?php else: ?> false <?php endif; ?>;
            var is_search_result_page  = <?php if(Request::segment(1) == 'search-result'): ?> true <?php else: ?> false <?php endif; ?>;
            $(function() {
                /** coupon code popup **/
                $('body').on('click','.apply-code-btn', function(){
                    var coupon_code = $('#coupon_code').val();
                    var SBID = $('.price-value').val();
                    if(coupon_code) {
                        $.ajax({
                            type : "POST",
                            url  : "<?php echo e(url('validate-coupon')); ?>",
                            data : {coupon : coupon_code, 'SBID' : SBID, "_token": "<?php echo e(csrf_token()); ?>"},
                            success: function(resp) {
                                if(resp.status && resp.status == 'false') {
                                    $('#coupon-code-error').css('display','block').find('.alert').text(resp.message);
                                    $('#coupon-code-error').show().delay(4000).fadeOut('slow');
                                    return false;
                                }
                                else {
                                    $('#coupon-code-error').css('display','block').find('.alert').removeClass('alert-danger').addClass('alert-success').text(coupon_code+' : Coupon code applied successfully!');
                                    //$('#coupon-code-error').css('display','none');
                                    $('.coupon-code-question').css('color','green').text(coupon_code+' : Coupon code applied successfully!');
                                    $('.coupon').val(coupon_code);
                                    $('.apply-couponcode-popup').css('display','none');
                                    $('.show-price').html('<s>$'+resp.original_price+'</s>  <b>$'+resp.updated_price+ '</b>');
                            }
                        }
                    });
                    } else {                   
                        $('#coupon-code-error').css('display','block').find('.alert').text('Please enter Coupon Code!');
                        $('#coupon-code-error').show().delay(4000).fadeOut('slow');
                    }
                });
            });
        </script>
        <!-- jQuery first, then Bootstrap JS. -->

    </body>
    </html><?php /**PATH C:\xampp\htdocs\permitsearch\resources\views/includes/footer.blade.php ENDPATH**/ ?>