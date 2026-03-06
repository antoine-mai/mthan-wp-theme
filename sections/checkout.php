<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the checkout section instance.
 * @return array
 */
function mthan_section_checkout_options()
{
    return array(
            array(
            'type' => 'notice',
            'style' => 'info',
            'content' => 'This section displays the checkout form. Most logic is handled by WooCommerce.',
        ),
    );
}

/**
 * Render the checkout section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_checkout_html($section_data)
{ ?>
<section class="checkout-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 column">
                <div class="contact-information">
                    <h3>Contact Information</h3>
                    <div class="contact-inner default-form">
                        <div class="form-group">
                            <input type="text" name="phone" placeholder="Phone Number" required="">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email Address" required="">
                        </div>
                        <div class="form-group">
                            <div class="check-me">
                                <input type="checkbox" id="future-updates">
                                <label for="future-updates">
                                    <span>Get Product Updates & Offers</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shipping-address">
                    <h3>Shipping Address</h3>
                    <div class="shipping-inner default-form">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="fname" placeholder="First Name" required="">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="lname" placeholder="Last Name" required="">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <input type="text" name="address" placeholder="Address" required="">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <input type="text" name="city" placeholder="City" required="">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <div class="select-box">
                                    <select class="custom-select-box">
                                        <option data-display="Select">Select</option>
                                        <option value="1">U.S.A</option>
                                        <option value="2">U.K</option>
                                        <option value="3">Canada</option>
                                        <option value="4">Spain</option>
                                        <option value="5">Maxico</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="password" name="pincode" placeholder="Pincode" required="">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <div class="check-me">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        <span>Save for future shopping</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 column">
                <div class="product-information">
                    <div class="single-item clearfix">
                        <figure class="product-image"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/resource/shop/prod-thumb-4.jpg"
                                alt="Hand Shovel" title="Hand Shovel"></figure>
                        <h5>Hand Shovel</h5>
                        <span class="dtl">$69.98</span>
                    </div>
                    <div class="sub-total clearfix">
                        <h5>Sub&nbsp;total</h5>
                        <i class="line"></i>
                        <span class="dtl">$159.95</span>
                    </div>
                    <div class="shipping clearfix">
                        <h5>Shipping</h5>
                        <i class="line"></i>
                        <span class="dtl">$8</span>
                    </div>
                    <div class="total">
                        <h5>Total</h5>
                        <span class="dtl">$259.95</span>
                    </div>
                    <div class="btn-box">
                        <button type="button" class="theme-btn btn-style-four"><span class="btn-title">Continue <i
                                    class="arrow flaticon-play-button-1"></i></span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="payment-option">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 column">
                    <div class="payment-method">
                        <h3>Choose a Payment Method</h3>
                        <ul class="clearfix">
                            <li>
                                <div class="form-group">
                                    <div class="check-me">
                                        <input type="radio" id="direct-bank" name="payment-method">
                                        <label for="direct-bank">
                                            <span>Direct Bank Trasfer</span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <div class="check-me">
                                        <input type="radio" id="card" name="payment-method">
                                        <label for="card">
                                            <span>Credit Card / Debit Card</span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <p>It is a long established fact that a reader will distracted of a page when looking at
                                    its layout. </p>
                            </li>
                            <li>
                                <div class="form-group">
                                    <div class="check-me">
                                        <input type="radio" id="cheque" name="payment-method">
                                        <label for="cheque">
                                            <span>Cheque Payment</span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <div class="check-me">
                                        <input type="radio" id="paypal" name="payment-method">
                                        <label for="paypal">
                                            <span>Paypal</span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 column">
                    <div class="card-details">
                        <h3>Card Details</h3>
                        <div class="details-inner default-form">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="card_name" placeholder="Name on the Card" required="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="card_no" placeholder="Card Number" required="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="date" id="datepicker" placeholder="Expiry Date"
                                        required="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="password" name="code" placeholder="Security Code" required="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <button type="submit" class="theme-btn btn-style-four"><span class="btn-title">Make
                                            Payment <i class="arrow flaticon-play-button-1"></i></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}