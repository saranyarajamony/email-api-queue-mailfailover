<?php

namespace App\Library;

/**
 * Defining all possible attributes needed to send an email
 */
class EmailAttributes
{

    /**
     * Mail subject
     */
    public $subject = 'default';

    /**
     * Mail body
     */
    public $content = 'default';

    /**
     * Mail Opener eg: Hello Friend
     */
    public $name =  'Friend';

    /**
     * From address
     */
    public $from = '';

    /**
     * Array of to addresss
     */
    public $to = [];

    /**
     * Array of cc addresss
     */
    public $cc = [];

    /**
     * Array of bcc addresss
     */
    public $bcc = [];

    /**
     * Mail signature
     */

    public $signature = '';


    public function __construct()
    {
        //return "Email attributes object constructed.";
    }
}
