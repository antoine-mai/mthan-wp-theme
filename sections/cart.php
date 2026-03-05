<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the cart section instance.
 * @return array
 */
function mthan_section_cart_options()
{
    return array(
        array(
            'type'    => 'notice',
            'style'   => 'info',
            'content' => 'This section displays the cart content. Most logic is handled by WooCommerce.',
        ),
    );
}

/**
 * Render the cart section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_cart_html($section_data) { ?>
<section class="cart-section">
        <div class="auto-container">
            <div class="cart-outer">
                <div class="totle-table clearfix">
                    <div class="item pull-left"><p><span>Your Cart:</span> 2 Items</p></div>
                    <div class="total pull-right"><p><span>Total:</span> <i>159.95</i> </p></div>
                </div>
                <div class="table-outer">
                    <table class="cart-table">
                        <thead class="cart-header">
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th class="price">Price</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="prod-column">
                                    <div class="column-box">
                                        <figure class="prod-thumb"><a href="#"><img src="/wp-content/assets/images/resource/shop/prod-thumb-4.jpg" alt=""></a></figure>
                                        <h4>Hand Shovel</h4>
                                    </div>
                                </td>
                                <td class="qty"><input type="number" value="2" name="quantity"></td>
                                <td class="sub-total">$34.99</td>
                                <td class="total-price">$69.98</td>
                                <td><a href="#" class="remove-btn"><span class="fas fa-times"></span></a></td>
                            </tr>
                            <tr>
                                <td class="prod-column">
                                    <div class="column-box">
                                        <figure class="prod-thumb"><a href="#"><img src="/wp-content/assets/images/resource/shop/prod-thumb-5.jpg" alt=""></a></figure>
                                        <h4>Flower Pot</h4>
                                    </div>
                                </td>
                                <td class="qty"><input type="number" value="3" name="quantity"></td>
                                <td class="sub-total">$29.99</td>
                                <td class="total-price">$89.97</td>
                                <td><a href="#" class="remove-btn"><span class="fas fa-times"></span></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-7 col-md-12 col-sm-12 column">
                        <div class="apply-coupon clearfix">
                            <div class="form-group clearfix">
                                <input type="text" name="coupon-code" value="" placeholder="Enter Coupon Code...">
                            </div>
                            <div class="form-group clearfix">
                                <button type="button" class="theme-btn btn-style-three"><span class="btn-title">Apply Coupon <i class="arrow flaticon-play-button-1"></i></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 column clearfix">
                        <div class="btn-box pull-right clearfix">
                            <button type="button" class="theme-btn btn-style-four"><span class="btn-title">Update Cart <i class="arrow flaticon-play-button-1"></i></span></button>
                            <button type="button" class="theme-btn btn-style-three"><span class="btn-title">Add to Cart <i class="arrow flaticon-play-button-1"></i></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }
