<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{


    public function index(){
        echo time();
        
            $this->page1();



    }

    public function page1(){
            $this->load->view('header');
            $this->load->view('view_upload');
            $this->load->view('footer');          
	}
        
        public function page2(){
       $file = fopen($_FILES['file']['tmp_name'], 'r+');          
         $i=0;
         $j=0;
        $table['column_name'] = fgetcsv($file);       
       while(($user['data']=fgetcsv($file))!=FALSE){
       $details['details'][$i]=$user['data'];
       $this->session->set_userdata($details['details'][$i]);
  
		$this->load->library('m_pdf');

                   $array=$table+$user;
		$html=$this->load->view('print',$array, true); 
 	 
		
		$pdfFilePath =$user['data']['1'].".pdf";
             
		$pdf = $this->m_pdf->load();
		
		$pdf->WriteHTML($html,2);
		
		$pdf->Output("output/".$pdfFilePath, 'F');               
                
                ++$i;
                $this->session->set_userdata($i,0);   
       }
       $e=$i;
 fclose($file);
 $array=$table+$details;
 //$this->load->view('header');
 $this->load->view('home_view',$array);
 //$this->load->view('footer');

}
    public function setemail()
{
$i=$this->session->userdata('next');
echo $i;
$subject="SALARY SLIP";
$name=$this->session->userdata('name'.$i);
$email=$this->session->userdata($name);

$message="Salary slip of ".$name;
$this->sendEmail($email,$subject,$message,$name);


}
public function sendEmail($email,$subject,$message,$name)
    {

    $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'ihrdattingal@gmail.com', 
      'smtp_pass' => 'attingalihrd', 
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );


          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from('ihrdattingal@gmail.com');
          $this->email->to($email);
          $this->email->subject($subject);
          $this->email->message($message);
          $this->email->attach("output/".$name.".pdf");
          if($this->email->send())
         {
          //$this->session->set_userdata('status',$name);
        
          $next=$this->session->userdata('next');
          
          $this->session->set_userdata('next', ++$next);

          
        
         }
         else
        {
         
         
        }

    }

}