<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style type="text/css">
    p {
        color: #fff
    }

    .transcol-box {
        /*max-width: 500px;*/
        width: 100%;
        background-color: #1da1f3;
        padding: 20px;
        border-radius: 10px;
        margin: 0 auto;
    }

    .account-information-txt p {
        color: #fff;
        text-transform: uppercase;
        margin-bottom: 0;
    }

    .account-information-txt {
        background: linear-gradient(90deg, rgba(37, 86, 153, 1) 25%, rgba(42, 42, 114, 1) 100%, rgba(0, 212, 255, 1) 100%);
        padding: 5px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .client-detail {
        max-width: 220px;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
    }

    .form-select {
        background: #fff;
        padding: 5px;
        outline: none;
    }

    .account-detail {
        margin-bottom: 40px;
    }

    .form-select-box {
        max-width: 80px;
        width: 100%;
    }
    .wrap-code .client-detail p {
        margin-bottom: 0;
        text-transform: uppercase;
    }

    .call-detail p {
        margin-bottom: 0
    }

    .transcol-logo {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .transcol-logo span i {
        cursor: pointer;
        margin-left: 40px;
    }

    .transcol-header p {
        font-size: 12px;
        text-align: center;
        margin-bottom: 25px;
    }

    .name-filed {
        max-width: 120px;
        width: 100%;
        outline: none;
    }

    .user-name-detail .client-detail {
        max-width: 260px;
        width: 100%;
        margin-bottom: 10px;
    }

    .user-name-detail .client-detail p {
        margin-bottom: 0;
    }

    .user-call-detail {
        max-width: 260px;
        width: 100%;
        margin-bottom: 10px;
    }

    .user-call-detail p {
        margin-bottom: 0;
    }

    .transcol-logo span {
        color: #fff;
    }

    .popup_btn {
        background: linear-gradient(90deg, rgba(37, 86, 153, 1) 25%, rgba(42, 42, 114, 1) 100%, rgba(0, 212, 255, 1) 100%);
        width: 100px;
    }

    @media (max-width: 320px) {
        .call-detail {
            max-width: 210px;
        }
    }
</style>




<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="transcol-box language-box">
                    <div class="transcol-logo">
                        <p>Transcall</p>
                        <span>00:12 <i class="fa-solid fa-xmark"></i></span>
                        </span>


                    </div>
                    <div class="transcol-header">
                        <p>Thank you for calling TransCall interpreting Services.This is (____________),What Language
                            Please?
                        </p>
                    </div>
                    <div class="account-information-box">
                        <div class="account-information-txt">
                            <p>Account Information</p>
                        </div>
                        <div class="account-detail">
                            <div class="client-detail">
                                <p>CLIENT NAME</p>
                                <p>Client Name</p>
                            </div>
                            <div class="client-detail">
                                <p>ACCOUNT NAME</p>
                                <p>Client Name</p>
                            </div>
                            <div class="client-detail">
                                <p>ACCOUNT NUMBER</p>
                                <p>123456789</p>
                            </div>
                        </div>
                    </div>

                    <div class="account-information-box ">
                        <div class="account-information-txt">
                            <p>CALL INFORMATION</p>
                        </div>
                        <div class="account-detail">
                            <div class="client-detail">
                                <p>PHONE NUMBER</p>
                                <p>123456789</p>
                            </div>
                            <div class="client-detail call-detail">
                                <p>LANGUAGE</p>
                                <div class="form-select-box">
                                    <select class="form-select">
                                        <option>Select Language</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="account-information-box wrap-code">
                        <div class="account-information-txt">
                            <p>wrap code</p>
                        </div>
                        <div class="account-detail">
                            <div class="client-detail">
                                <p>wrap code</p>
                                <div class="form-select-box">
                                    <select class="form-select">
                                        <option>Select Option</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary popup_btn">Submit</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>
</body>
</html>