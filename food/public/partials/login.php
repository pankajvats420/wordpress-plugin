<?php 
include_once PLUGIN_PATH.'public/partials/header.php' ;



 ?>
     

<div class="login-register-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                        <a data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
            <div class="tab-content">
                <div id="lg1" class="tab-pane active">
                    <div class="login-form-container">
                        <div class="login-register-form">
                          <form action="javascript:void(0)" id="frm-login">
                                <input type="text" name="email_login" placeholder="Email" id="email_login">
                                <span class="error" id="email_login_error"></span>
                                <input type="password" name="Password_login" placeholder="Password" id="Password_login">
                                <span class="error" id="password_login_error"></span>
                                <div class="button-box">
                                    <button type="submit"><span>Login</span></button>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
                <div id="lg2" class="tab-pane">
                    <div class="login-form-container">
                        <div class="login-register-form">
                            <form action="javascript:void(0)" id="frm-register">
                                <input type="text" name="name" placeholder="Name" id="name">
                                <span class="error" id="name_error"></span>
                                <input type="email" name="email" placeholder="Email" id="email">
                                <span class="error" id="email_error"></span>
                                <input type="password" name="password" placeholder="Password" id="password">
                                <span class="error" id="password_error"></span>
                                <input type="text" name="mobile" placeholder="Mobile" id="mobile">
                                <input type="hidden" name="type" id="type" value="register">
                                <div class="button-box">
                                    <button type="submit"><span>Register</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <?php 
include_once PLUGIN_PATH.'public/partials/footer.php' ;
 ?>
     