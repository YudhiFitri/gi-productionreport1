<?php defined('BASEPATH') or exit('direct access script not allowed');

require_once dirname(__FILE__) . '/tcpdf/config/tcpdf_config.php';
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF{
	function __construct()
	{
		parent::__construct();
	}
}
