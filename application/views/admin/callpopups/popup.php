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
                        <p>Thank you for calling TransCall Interpreting Services. This is <?= $calldata->agentgivenname ?>, ID No : <?= $calldata->agentid ?> , I will be your SPANISH Interpreter today. How may I help you today?</p>
                    </div>
                    <div class="account_information">
                        <h3>Account Information</h3>
                  		<form action="/admin/callpopups/popup_submit" method="post">
                        <div class="account_dtails">
                            <ul>
                                <li>
                                    <span class="info_heading">Client Name:</span>
                                    <span class="info_details"><?= $clientdata->company; ?></span>
                                </li>
                                <li>
                                    <span class="info_heading">Account Name:</span>
                                    <span class="info_details"><?= $clientdata->company; ?></span>
                                </li>
                                <li>
                                    <span class="info_heading">Account Number:</span>
                                    <span class="info_details"><?= $clientdata->unique_id; ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="call_information">
                        <h3>Call Information</h3>
                        <div class="account_dtails">
                            <ul>
                                <li>
                                	<input type="hidden" name="<?= get_instance()->security->get_csrf_token_name(); ?>" value="<?= get_instance()->security->get_csrf_hash(); ?>">
                        			<input type="hidden" name="providercontactid" value="<?= $providercontactid; ?>" >
                                    <span class="info_heading">Phone Number:</span>
                                    <span class="info_details"><?= ($clientdata->phonenumber == "")?'N/A':$clientdata->phonenumber; ?></span>
                                </li>
                                <li>
                                    <span class="info_heading">Language:</span>
                                    <span class="info_details">
                                        <div class="dropdown">
					                           <select required="" name="language" class="form-select">
					                              <option value="">Select Language</option>
					                              <?php
					                                foreach ($langs as $key) { ?>
					                                  <option value="<?= $key['description']; ?>" <?= (isset($calldata) && $calldata->skillsetname == "SPA_Skillset_215" && $key['id'] == "1")?"selected":"" ?> ><?= $key['description']; ?></option>
					                                 <?php } 

					                              ?>
					                           </select>
                                            <!-- <button class="btn btn-secondary
                                                dropdown-toggle" type="button"
                                                id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Spanish
                                            </button>
                                            <ul class="dropdown-menu"
                                                aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item"
                                                        href="#">Action</a></li>
                                                <li><a class="dropdown-item"
                                                        href="#">Another action</a></li>
                                                <li><a class="dropdown-item"
                                                        href="#">Something else
                                                        here</a></li>
                                            </ul> -->
                                        </div>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="data_collection">
                        <h3>Data Collection</h3>
                        <div class="account_dtails">
                            <ul>
                                <li>
                                    <span class="info_heading">Full Name:</span>
                                    <span class="info_details"><input
                                            type="text" placeholder="May I have
                                            your first & last name?"></span>
                                </li>
                                <li>
                                    <span class="info_heading">Agent ID:</span>
                                    <span class="info_details"><input
                                            type="text" placeholder="May I have
                                            your agent ID?"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="wrap_code">
                        <h3>Wrap Code</h3>
                        <div class="account_dtails">
                            <ul>
                                <li>
                                    <span class="info_heading">Wrap Code:</span>
                                    <div class="dropdown">
                                    	<select required="" name="wrap_code" class="form-select">
                                    		<option value="">Select Wrap Code</option>
				                              <?php
				                                foreach ($wrap_codes as $key) { ?>
				                                  <option value='<?= $key['name']; ?>' ><?= $key['name']; ?></option>
				                                 <?php } 
				                              ?>
				                        </select>
                                        <!-- <button class="btn btn-secondary
                                            dropdown-toggle" type="button"
                                            id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Select Wrap Code
                                        </button>
                                        <ul class="dropdown-menu"
                                            aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item"
                                                    href="#">Action</a></li>
                                            <li><a class="dropdown-item"
                                                    href="#">Another action</a></li>
                                            <li><a class="dropdown-item"
                                                    href="#">Something else
                                                    here</a></li>
                                        </ul> -->
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="submit_now">
                        <button type="submit">Submit Now</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- jQuery library -->
        <script
            src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
        </script>
        <!-- Popper JS -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js">
        </script>
        <!-- Latest compiled JavaScript -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js">
        </script>
    </body>

</html>