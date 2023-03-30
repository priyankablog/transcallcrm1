<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Transcall International</title>

        <!----- meta links ----->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!----- Font Family Link ----->
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        <!----- Latest compiled and minified CSS ----->
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css"
            />

        <!----- Font Awesome CSS ----->
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            />
        <!----- Custom style sheet links ----->
        <link rel="stylesheet" href="<?= base_url() ?>/assets/css/callpopup.css">

    </head>
    <body class="home_page">
        
        <!----- Header Details ----->
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="header_logo">
                        <img src="<?= base_url() ?>/assets/images/callpopups/logo.png" class="w-100" alt="">
                    </div>
                </div>
            </div>
        </header>
        <!----- Page Details ----->
        <section class="hotel_details_main">
            <div class="container">
                <div class="row">
                    <div class="notice_text">
                        <p><?= $message; ?></p>
                        <p>Client ID : <?= $customer_id; ?></p>
                    </div>
                </div>
            </div>
        </section>
    </body>

</html>