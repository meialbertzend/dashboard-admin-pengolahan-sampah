<?php
defined('BASEPATH') or exit('No direct script access allowed');

function IsLoggedIn()
{
    $ci = &get_instance();
    if (!$ci->session->userdata('id_admin')) {
        redirect('auth', 'refresh');
    }
}

function IsAdmin()
{
    $ci = &get_instance();
    if ($ci->session->userdata('level') != 'administrator') {
        redirect('auth', 'refresh');
    }
}

function IsRegularAdmin()
{
    $ci = &get_instance();
    if ($ci->session->userdata('level') != 'admin') {
        redirect('auth', 'refresh');
    }
}
