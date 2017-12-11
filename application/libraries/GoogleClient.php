<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
set_include_path(APPPATH . 'third_party/' . PATH_SEPARATOR . get_include_path());
require_once APPPATH . 'third_party/vendor/google/apiclient/src/Google/autoload.php';

$client = new Google_Client();

?>