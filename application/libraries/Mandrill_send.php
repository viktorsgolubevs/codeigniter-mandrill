<?php

/*
.-------------------------------------------------------.
| Software: Mandrill - PHP email class
| Site: https://mandrillapp.com
| ----------------------------------------------------- |
| Copyright: Mandrill
| ----------------------------------------------------- |
| Authors: Viktors Golubevs  me@.viktorsgolubevs.lv
'-------------------------------------------------------'
 */

require_once 'mandrill_service/Mandrill.php';

class Mandrill_send {

    private $api_key = '';

    public function __construct() {
        $this->ci = &get_instance();
        $this->ci->config->load('mandrill');

        $this->set_api_key($this->ci->config->item('mandrill_api_key'));
    }

    public function set_api_key($key) {
        $this->api_key = $key;
    }

    public function get_api_key() {
        return $this->api_key;
    }

    public function send_email($message = array()) {

        if (empty($message)) {
            return false;
        }

        try {
            $mandrill = new Mandrill($this->get_api_key());
            $result = $mandrill->messages->send($message);
            return $result;

        } catch(Mandrill_Error $e) {

            echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();

            throw $e;
        }
    }

    /**
     * To obtain information about the API-connected user
     * @return struct
     * @throws Exception
     * @throws Mandrill_Error
     */
    public function user_info()
    {
        try {
            $mandrill = new Mandrill($this->get_api_key());
            $result = $mandrill->users->info();
            return $result;

        } catch (Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            throw $e;
        }
    }

    /**
     * To obtain information about senders that have tried to use this account, Both verified and unverified
     * @return array
     * @throws Exception
     * @throws Mandrill_Error
     */
    public function sender_list() {
        try {
            $mandrill = new Mandrill($this->get_api_key());
            $result = $mandrill->users->senders();

            return $result;

            /*
            Array
            (
                [0] => Array
                    (
                        [address] => sender.example@mandrillapp.com
                        [created_at] => 2013-01-01 15:30:27
                        [sent] => 42
                        [hard_bounces] => 42
                        [soft_bounces] => 42
                        [rejects] => 42
                        [complaints] => 42
                        [unsubs] => 42
                        [opens] => 42
                        [clicks] => 42
                        [unique_opens] => 42
                        [unique_clicks] => 42
                    )
            )
            */

        } catch (Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            throw $e;
        }
    }

    /**
     * Return detailed information about a single sender, including aggregates of recent stats
     * @param $address
     * @return struct
     * @throws Exception
     * @throws Mandrill_Error
     */
    public function single_sender($address) {
        try {
            $mandrill = new Mandrill($this->get_api_key());
            $result = $mandrill->senders->info($address);

            return $result;

            /*
                Array
                (
                    [address] => sender.example@mandrillapp.com
                    [created_at] => 2013-01-01 15:30:27
                    [sent] => 42
                    [hard_bounces] => 42
                    [soft_bounces] => 42
                    [rejects] => 42
                    [complaints] => 42
                    [unsubs] => 42
                    [opens] => 42
                    [clicks] => 42
                    [stats] => Array
                        (
                            [today] => Array
                                (
                                    [sent] => 42
                                    [hard_bounces] => 42
                                    [soft_bounces] => 42
                                    [rejects] => 42
                                    [complaints] => 42
                                    [unsubs] => 42
                                    [opens] => 42
                                    [unique_opens] => 42
                                    [clicks] => 42
                                    [unique_clicks] => 42
                                )

                            [last_7_days] => Array
                                (
                                    [sent] => 42
                                    [hard_bounces] => 42
                                    [soft_bounces] => 42
                                    [rejects] => 42
                                    [complaints] => 42
                                    [unsubs] => 42
                                    [opens] => 42
                                    [unique_opens] => 42
                                    [clicks] => 42
                                    [unique_clicks] => 42
                                )

                            [last_30_days] => Array
                                (
                                    [sent] => 42
                                    [hard_bounces] => 42
                                    [soft_bounces] => 42
                                    [rejects] => 42
                                    [complaints] => 42
                                    [unsubs] => 42
                                    [opens] => 42
                                    [unique_opens] => 42
                                    [clicks] => 42
                                    [unique_clicks] => 42
                                )

                            [last_60_days] => Array
                                (
                                    [sent] => 42
                                    [hard_bounces] => 42
                                    [soft_bounces] => 42
                                    [rejects] => 42
                                    [complaints] => 42
                                    [unsubs] => 42
                                    [opens] => 42
                                    [unique_opens] => 42
                                    [clicks] => 42
                                    [unique_clicks] => 42
                                )

                            [last_90_days] => Array
                                (
                                    [sent] => 42
                                    [hard_bounces] => 42
                                    [soft_bounces] => 42
                                    [rejects] => 42
                                    [complaints] => 42
                                    [unsubs] => 42
                                    [opens] => 42
                                    [unique_opens] => 42
                                    [clicks] => 42
                                    [unique_clicks] => 42
                                )
                        )
                )
                */

        } catch (Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            throw $e;
        }
    }

    /**
     * Get the 100 most clicked URLs
     * @return array
     * @throws Exception
     * @throws Mandrill_Error
     */
    public function get_urls() {
        try {
            $mandrill = new Mandrill($this->get_api_key());
            $result = $mandrill->urls->getList();

            return $result;

            /*
            Array
            (
                [0] => Array
                    (
                        [url] => http://test.lv/register
                        [sent] => 403
                        [clicks] => 235
                        [unique_clicks] => 192
                    )
            )
            */

        } catch (Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
            throw $e;
        }
    }
}