<?php defined('ABSPATH') or die('Cheatin\' uh?');


/**
 * Render the product-details section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_product_details_html($section_data) { 
    $image      = !empty($section_data['product_image']['url']) ? $section_data['product_image']['url'] : get_template_directory_uri() . '/assets/images/resource/shop/10.jpg';
    $title      = !empty($section_data['product_title']) ? $section_data['product_title'] : 'Rubber Glove';
    $rating     = !empty($section_data['product_rating']) ? (int)$section_data['product_rating'] : 5;
    $price      = !empty($section_data['product_price']) ? $section_data['product_price'] : '$19.00';
    $short_desc = !empty($section_data['product_short_desc']) ? $section_data['product_short_desc'] : '';
    $highlights = !empty($section_data['highlights']) ? $section_data['highlights'] : array();
    $tags       = !empty($section_data['tags']) ? $section_data['tags'] : array();
    $full_desc  = !empty($section_data['description_tab']) ? $section_data['description_tab'] : '';
    $reviews    = !empty($section_data['reviews_repeater']) ? $section_data['reviews_repeater'] : array();
    $related    = !empty($section_data['related_repeater']) ? $section_data['related_repeater'] : array();
?>
<section class="product-details">
    <div class="auto-container">
        <div class="basic-details">
            <div class="row clearfix">
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <figure class="image">
                        <a href="<?php echo esc_url($image); ?>" class="lightbox-image" data-fancybox="gallery">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>">
                        </a>
                    </figure>
                </div>
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="product-details-content">
                        <h3><?php echo esc_html($title); ?></h3>
                        <ul class="rating-box clearfix">
                            <?php for($i=0; $i<5; $i++): ?>
                                <li><i class="<?php echo ($i < $rating) ? 'fas fa-star' : 'far fa-star'; ?>"></i></li>
                            <?php endfor; ?>
                        </ul>
                        <div class="reviews"><a href="#">[<?php echo count($reviews); ?> Customer Reviews]</a></div>
                        <div class="item-price"><span><?php echo esc_html($price); ?></span></div>
                        <div class="share"><a href="#"><i class="flaticon-share-1"></i></a></div>
                        <div class="text">
                            <p><?php echo esc_html($short_desc); ?></p>
                        </div>
                        <?php if(!empty($highlights)): ?>
                        <div class="product-highlights">
                            <h5>Highlights</h5>
                            <ul class="list-item clearfix">
                                <?php foreach($highlights as $h): ?>
                                    <li><?php echo esc_html($h['text']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <div class="other-options clearfix">
                            <div class="quentity-box">
                                <div class="item-quantity">
                                    <input class="quantity-spinner" type="text" value="1" name="quantity">
                                </div>
                            </div>
                            <div class="link-box">
                                <button type="button" class="theme-btn btn-style-four"><span class="btn-title">Add to Cart <i class="arrow flaticon-play-button-1"></i></span></button>
                            </div>
                        </div>
                        <?php if(!empty($tags)): ?>
                        <div class="product-category">
                            <ul class="list clearfix">
                                <li>Tags:</li>
                                <?php foreach($tags as $index => $tag): ?>
                                    <li><a href="<?php echo esc_url($tag['link']); ?>"><?php echo esc_html($tag['label']); ?></a><?php echo ($index < count($tags)-1) ? ',' : ''; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-description">
            <div class="tabs-box">
                <div class="tab-btn-box centred">
                    <ul class="tab-btns tab-buttons clearfix">
                        <li class="tab-btn active-btn" data-tab="#tab-1">Description</li>
                        <li class="tab-btn" data-tab="#tab-2">Reviews - <?php echo count($reviews); ?></li>
                    </ul>
                </div>
                <div class="tabs-content">
                    <div class="tab active-tab" id="tab-1">
                        <div class="text">
                            <h4>Product Description</h4>
                            <?php echo wp_kses_post($full_desc); ?>
                        </div>
                    </div>
                    <div class="tab" id="tab-2">
                        <?php if(!empty($reviews)): ?>
                        <div class="customer-comment">
                            <div class="row clearfix">
                                <?php foreach($reviews as $rev): 
                                    $rev_img = !empty($rev['author_image']['url']) ? $rev['author_image']['url'] : get_template_directory_uri() . '/assets/images/resource/author-thumb-8.jpg';
                                    $rev_rating = !empty($rev['rating']) ? (int)$rev['rating'] : 5;
                                    $rev_alt = !empty($rev['author_name']) ? $rev['author_name'] : 'Customer Avatar';
                                ?>
                                <div class="comment-col col-lg-6 col-ms-12 col-sm-12">
                                    <div class="comment">
                                        <figure class="customer-thumb"><img src="<?php echo esc_url($rev_img); ?>" alt="<?php echo esc_attr($rev_alt); ?>" title="<?php echo esc_attr($rev_alt); ?>"></figure>
                                        <div class="info clearfix">
                                            <h4><?php echo esc_html($rev['author_name']); ?></h4>
                                            <span><?php echo esc_html($rev['date']); ?></span>
                                        </div>
                                        <ul class="rating clearfix"> 
                                            <?php for($i=0; $i<5; $i++): ?>
                                                <li><i class="<?php echo ($i < $rev_rating) ? 'fas fa-star' : 'far fa-star'; ?>"></i></li>
                                            <?php endfor; ?>
                                        </ul>
                                        <p><?php echo esc_html($rev['comment']); ?></p>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="reply-box">
                            <div class="reply-inner">
                                <h3>Add Your Comments, <span>Your email address will not be published. Required fields are marked *</span></h3>
                                <div class="default-form review-form">
                                    <form action="#" method="post" class="replay-form">
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <div class="field-label">Comments</div>
                                                <textarea name="message"></textarea>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <div class="field-label">Name*</div>
                                                <input type="text" name="name" required="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <div class="field-label">Email*</div>
                                                <input type="email" name="email" required="">
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                                <div class="review-box clearfix">
                                                    <p>Your Review</p>
                                                    <ul class="rating clearfix">
                                                        <li><i class="far fa-star"></i></li>
                                                        <li><i class="far fa-star"></i></li>
                                                        <li><i class="far fa-star"></i></li>
                                                        <li><i class="far fa-star"></i></li>
                                                        <li><i class="far fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                                <div class="btn-box clearfix">
                                                    <button type="submit" class="theme-btn btn-style-four"><span class="btn-title">Submit <i class="arrow flaticon-play-button-1"></i></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!empty($related)): ?>
        <div class="related-product">
            <h3>Related Products</h3>
            <div class="row clearfix">
                <?php foreach($related as $rel): 
                    $rel_img = !empty($rel['image']['url']) ? $rel['image']['url'] : get_template_directory_uri() . '/assets/images/resource/shop/1.jpg';
                    $rel_alt = !empty($rel['title']) ? $rel['title'] : 'Related Product';
                ?>
                <div class="shop-item col-xl-3 col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <div class="image">
                            <a href="<?php echo esc_url($rel['link']); ?>"><img src="<?php echo esc_url($rel_img); ?>" alt="<?php echo esc_attr($rel_alt); ?>" title="<?php echo esc_attr($rel_alt); ?>"></a>
                        </div>
                        <div class="options">
                            <ul class="option-box clearfix">
                                <li class="add-fav"><a href="#"><span class="flaticon-heart-1"></span><span class="t-tip">Whishlist</span></a></li>
                                <li><a href="#"><span class="flaticon-shopping-bag-2"></span> Add to Cart</a></li>
                                <li class="zoom-btn"><a href="<?php echo esc_url($rel_img); ?>" class="lightbox-image" data-fancybox="products"><span class="flaticon-expand"></span><span class="t-tip">Preview</span></a></li>
                            </ul>
                        </div>
                        <div class="lower-content">
                            <div class="rating"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="far fa-star"></span></div>
                            <h5><a href="<?php echo esc_url($rel['link']); ?>"><?php echo esc_html($rel['title']); ?></a></h5>
                            <div class="price">
                                <?php if(!empty($rel['old_price'])): ?>
                                    <span class="strike-through"><?php echo esc_html($rel['old_price']); ?></span> 
                                <?php endif; ?>
                                <span><?php echo esc_html($rel['price']); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php }
