<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Seo extends CI_Controller {

  public function __construct()
    {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->database();
    }
  public function sitemap()
    {
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap");
    }
    public function html()
    {
        $this->load->view("htmlsitemap");
    }
} 