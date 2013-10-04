<?php
 
/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/
 
/**
* Description of General
*
* @author gieart
*/
class General {
 
//put your code here
private $CI;
 
function __construct() {
$this->CI =& get_instance();
}
 
function isLogin() {
if ($this->CI->session->userdata('is_login') == TRUE) {
return TRUE;
} else {
return FALSE;
}
}
 
function isAdmin() {
if ($this->CI->session->userdata('type') == 'Admin') {
return TRUE;
} else {
return FALSE;
}
}
 
function isPetugas() {
if ($this->CI->session->userdata('type') == 'petugas') {
return TRUE;
} else {
return FALSE;
}
}
 
function checkAdmin() {
if (($this->isLogin() && $this->isAdmin()) != TRUE) {
$this->CI->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses sebagai admin');
redirect('dashboard/akses');
}
}
 
function checkPetugas() {
if (($this->isLogin() && $this->isPetugas()) != TRUE) {
$this->CI->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses sebagai petugas');
redirect('dashboard/akses');
}
}
 
}
 
?>
