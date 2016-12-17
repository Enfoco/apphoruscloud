<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller
{
   


  public function loadTheme( $view, $data = array() )
    {
        $this->load->view("header", $data);
        $this->load->view("menu");
        $this->load->view( $view, $data );
        $this->load->view("footer");
    }

 public function loadErrors( $view, $data = array() )
    {
        $this->load->view("header", $data);
        $this->load->view( $view, $data );
        $this->load->view("footer");
    }

  public function loadAdmin( $view, $data = array() )
    {
        $this->load->view("headerAdmin", $data);
        $this->load->view( $view);
        $this->load->view("footerAdmin");
    }

     public function loadCalendar( $view, $data = array() )
    {
        $this->load->view("headerCalendar", $data);
        $this->load->view( $view);
        $this->load->view("footerAdmin");
    }


  public function loadCoti( $view, $data = array() )
    {
        $this->load->view("headerCoti", $data);
        $this->load->view( $view);
        $this->load->view("footerCoti");
    }

  public function loadAsesor( $view, $data = array() )
    {
        $this->load->view("headerAsesor", $data);
        $this->load->view( $view);
        $this->load->view("footerAsesor");
    }

   public function removeCache()
    {
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }

  


}
