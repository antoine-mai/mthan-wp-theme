<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Returns the CSF field definitions for the myaccount section instance.
 * @return array
 */
function mthan_section_myaccount_options()
{
    return array(
        array(
            'id'    => 'login_title',
            'type'  => 'text',
            'title' => 'Login Form Title',
            'default' => 'Login',
        ),
        array(
            'id'    => 'login_btn_text',
            'type'  => 'text',
            'title' => 'Login Button Text',
            'default' => 'Login Now',
        ),
        array(
            'id'    => 'register_title',
            'type'  => 'text',
            'title' => 'Register Form Title',
            'default' => 'Register',
        ),
        array(
            'id'    => 'register_btn_text',
            'type'  => 'text',
            'title' => 'Register Button Text',
            'default' => 'Register Here',
        ),
        array(
            'id'    => 'register_footer_text',
            'type'  => 'text',
            'title' => 'Register Footer Text',
            'default' => '* You must be a free registered user.',
        ),
    );
}

/**
 * Render the myaccount section.
 */
function mthan_section_myaccount_html($section_data) {
    $l_title = !empty($section_data['login_title']) ? $section_data['login_title'] : 'Login';
    $l_btn   = !empty($section_data['login_btn_text']) ? $section_data['login_btn_text'] : 'Login Now';
    $r_title = !empty($section_data['register_title']) ? $section_data['register_title'] : 'Register';
    $r_btn   = !empty($section_data['register_btn_text']) ? $section_data['register_btn_text'] : 'Register Here';
    $r_foot  = !empty($section_data['register_footer_text']) ? $section_data['register_footer_text'] : '* You must be a free registered user.';
?>
<section class="myaccount-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="column col-lg-6 col-md-12 col-sm-12 column">
                    <div class="login-inner default-form">
                        <h3><?php echo esc_html($l_title); ?></h3>
                        <form action="#" method="post" class="login-form">
                            <div class="form-group">
                                <span class="icon fas fa-user"></span>
                                <input type="text" name="name" placeholder="Your Name*" required="">
                            </div>
                            <div class="form-group">
                                <span class="icon far fa-envelope"></span>
                                <input type="email" name="email" placeholder="Emai Address*" required="">
                            </div>
                            <div class="form-group">
                                <span class="icon fas fa-lock-open"></span>
                                <input type="password" name="password" placeholder="Enter Password" required="">
                            </div>
                            <div class="form-group btn-box">
                                <button type="submit" class="theme-btn btn-style-four alternate"><span class="btn-title"><?php echo esc_html($l_btn); ?> <i class="arrow flaticon-play-button-1"></i></span></button>
                                <div class="other-option">
                                    <ul class="clearfix">
                                        <li><p>Or login with</p></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="remember-me">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        <span class="description">Remember Me</span>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="column col-lg-6 col-md-12 col-sm-12 column">
                    <div class="register-inner default-form">
                        <h3><?php echo esc_html($r_title); ?></h3>
                        <form action="#" method="post" class="register-form">
                            <div class="form-group">
                                <span class="icon fas fa-user"></span>
                                <input type="text" name="name" placeholder="Your Name*" required="">
                            </div>
                            <div class="form-group">
                                <span class="icon far fa-envelope"></span>
                                <input type="email" name="email" placeholder="Emai Address*" required="">
                            </div>
                            <div class="form-group">
                                <span class="icon fas fa-lock-open"></span>
                                <input type="password" name="password" placeholder="Enter Password" required="">
                            </div>
                            <div class="form-group btn-box">
                                <button type="submit" class="theme-btn btn-style-four alternate"><span class="btn-title"><?php echo esc_html($r_btn); ?> <i class="arrow flaticon-play-button-1"></i></span></button>
                                <div class="text"><p><span>*</span> <?php echo esc_html($r_foot); ?></p></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }
