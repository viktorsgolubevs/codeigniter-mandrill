<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<p>You are looking a Codeigniter email library for the MailChimp's Mandrill API service platform</p>

        <p>Examples:</p>
        
        <ul>
            <li><a href="<?=site_url('mandrill_test/simple_email');?>">Send email - simple</a></li>
            <li><a href="<?=site_url('mandrill_test/templated_email');?>">Send email - template</a></li>
            <li><a href="<?=site_url('mandrill_test/sender_list');?>">Sender list</a></li>
            <li><a href="<?=site_url('mandrill_test/get_urls');?>">Get urls</a></li>
        </ul>

        <p>Usage:</p>

		<p>Coppy following files:</p>
		<code>
            application/config/mandrill.php<br />
            application/controllers/Mandrill_test.php<br />
            application/libraries/Mandrill_send.php<br />
            application/libraries/mandrill_service/Mandrill.php<br />
            application/libraries/mandrill_service/Mandrill/<br />
            application/views/email_template.php<br />
            application/views/welcome_message.php.php
        </code>

		<p>Test code - simple email send:</p>
		<code>
            <pre>
            public function simple_email() {
                // Email settings data
                $message = array(
                    'subject' => 'This is my test subject',
                    'html' => '&#60;p&#62;This is my message&#60;/p&#62;',
                    'text' => 'This is my plaintext message',
                    'from_email' => 'sender email',
                    'from_name' => 'Name Surname', //optional
                    'to' => array(
                        // add more sub-arrays for additional recipients
                        array(
                            'email' => 'receiver email',
                            'name'  => 'receiver name surname', // optional
                            'type'  => 'to' //optional. Default is 'to'. Other options: cc & bcc
                        )
                    )
                    /* Other API parameters (e.g., 'preserve_recipients => FALSE', 'track_opens => TRUE','track_clicks' => TRUE) go here */
                );
        
                $mail = $this->mandrill_send->send_email($message);
        
                print_r($mail); // For debugging
            }
            </pre>
        </code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>