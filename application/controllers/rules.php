<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rules extends CI_Controller {
	
	public function index()
	{
		$this->header('Accept Advertisements');
		$this->load->view("v_administration_rules_main");
		$this->footer();
		
	}
	
	public function new_ads()
	{
	/*	if( $this->input->post('continue')){
			$title = $this->input->post('title');
            $body = $this->input->post('body');
            $add  = $this->input->post('address');
            $tel  = $this->input->post ('tel');
			
		
		$this->load->model('m_rules');
        $this->m_rules->addCheck($title, $body, $add, $tel, $img);
		}*/
		$this->load->model('m_rules');
		$data['Ads']=$this->m_rules->getAdlist();
		$this->header('Advertisement List');
		$this->load->view('v_check_fields',$data);
		$this->footer();
	}
	
	
	public function testing(){
		$this->load->model('m_rules');
		$test1 = 'good';
		$result1 = $this->m_rules->algorithm($test1);
		$test2 = 'good very ';
		$result2 = $this->m_rules->algorithm($test2);

		if($result1 || $result2){
						// send reject email
						echo("reject");
		}
		else {
			//$this->accept_ad($ad_id);
			//$this->testmail();
			echo("accepted");
			//send approve notification
		}
	}

	public function testing1(){
		$this->load->model('m_rules');
		$this->m_rules->find_urls('hello this link www.google.lk');
	}
	
	public function back1(){
		$this->load->model('m_rules');
		$data['Ads']=$this->m_rules->getAdlist();
		$this->header('View Fields');
		$this->load->view('v_check_fields',$data);
		$this->footer();
	}
	
	public function editAd($adid)
	{
		
		$this->load->model('m_rules');
		$answer1=$this->m_rules	->getAdvertisement($adid);
		
		$this->load->model('m_rules');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('title','Title','required|trim|xss_clean');//setting rules for title
		$this->form_validation->set_rules('body','Body','required|trim|xss_clean');//setting rules for body
		$this->form_validation->set_rules('address','Address','required|trim|xss_clean');//setting rules for address
		$this->form_validation->set_rules('price','Price','required|trim|xss_clean|numeric');//setting rules for price
		$this->form_validation->set_rules('telephone','Telephone','required|trim|xss_clean|numeric|min_length[7]|max_length[14]');//setting rules for price
		
	
		$data['title']='Edit Advertisement';
		$data['success']=false;
		$data['ad_id']=$adid;
		$data['title1']=$answer1['title'];
		$data['body']=$answer1['body'];
		$data['address']=$answer1['address'];
		$data['telephone']=$answer1['telephone'];
		$data['price']=$answer1['price'];
		if($this->input->post('category')){
		
			$data['cat']=$this->input->post('category');
		}
		else
		{
			$data['cat']=$answer1['categoryid'];
		}
		if($this->input->post('subcategory')){
		
			$data['subcat']=$this->input->post('subcategory');
		}
		else
		{
			$data['subcat']=$answer1['subcategoryid'];
		}
		if($this->input->post('country')){
		
			$data['cou']=$this->input->post('country');
		}
		else
		{
			$data['cou']=$answer1['countryid'];
		}
		if($this->input->post('province')){
		
			$data['pro']=$this->input->post('province');
		}
		else
		{
			$data['pro']=$answer1['provinceid'];
		}
		if($this->input->post('district')){
		
			$data['dis']=$this->input->post('district');
		}
		else
		{
			$data['dis']=$answer1['districtid'];
		}
		/*if($this->input->post('duration')){
		
			$data['dur']=$this->input->post('duration');
		}
		else
		{
			$data['dur']=14;
		}*/

		
		
			
			if($this->input->post('back'))
			{
				redirect('/rules/back1');
				//$data['state']='data';
	
			}
			
			
			if($this->input->post('advertisment_accept'))
			{
				redirect('/rules/accept_ad/'.$adid);
				//$data['state']='data';
	
			}
			
			if($this->input->post('advertisment_deny'))
			{
				redirect('/rules/deny_ad/'.$adid);
				//$data['state']='data';
	
			}
				
				
			
				$imagedata=$this->m_rules->get_edit_images($adid);
				$images=array();
				foreach ($imagedata as $img) 
				{
					
					if($this->input->post($img['id']))
					{
						
						$data['state']='upload';
						$this->advertisements->remove_image($img['id'],$img['Image']);
						continue;
					}
					
					$images[]=array('url'=>$img['Image'],'name'=>$img['id']);
				}
				$imagedata=$this->m_rules->get_images($adid);
				foreach ($imagedata as $img) 
				{
					
					if($this->input->post($img['id']))
					{
						
						$data['state']='upload';
						$this->advertisements->remove_image($img['id'],$img['Image']);
						continue;
					}
					
					$images[]=array('url'=>$img['Image'],'name'=>$img['id']);
				}
				
				$data['images']=$images;
		
		//$data['titles']='Create Advertisement';
		$answer=$this->m_rules->getCategory();
		$send['0']='--Select--';
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		
		$data['category']=$send;//loading categories in the dropdown list
		$send=null;
		
		
		$send['0']='--Select--';
		if($data['cat']>0){
		$answer=$this->m_rules->getSubCategories($data['cat']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		}
		$data['subcategory']=$send;//loading subcategories in the dropdown list
		$send=null;
				
		$answer=$this->m_rules->getCountry();
		$send['0']='--Select--';
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;
			
		}
		$data['country']=$send;
		$send=null;
		
		$send['0']='--Select--';
		if($data['cou']>0){
			$answer=$this->m_rules->getProvinces($data['cou']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;

		}
		}
		$data['province']=$send;//loading the province in the dropdown list
		$send=null;	
		
		$send['0']='--Select--';
		if($data['cou']>0||$data['pro']>0){
			$answer=$this->m_rules->getDistricts($data['cou'],$data['pro']);
		foreach ($answer as $key ) {
			$send[$key->id]=$key->name;
		
		}
		}
		$data['district']=$send;//loading the district in the dropdown list
		$send=null;	
		$data['title']='Accept Ad';
		$this->header('Accept Ad');
		$this->load->view('v_view_fields',$data);
		$this->footer();		
	}
	
	private function send_subscription_mail($a){
		$this->load->model('m_rules');
		$result = $this->m_rules->get_cid_sid_subscription($a);
		foreach($result as $record){
			$cid=$record->categoryid;
			$sid=$record->subcategoryid;
			$un=$record->username;
		}
		
		$result = $this->m_rules->get_email_subscription($cid,$sid,$un);
		$config = Array(
				'protocol' => 'smtp',
			  	'smtp_host' => 'ssl://smtp.googlemail.com',
			  	'smtp_port' => 465,
			  	'smtp_user' => 'jojocitytwo@gmail.com',
			  	'smtp_pass' => 'jojocity',
			  	'mailtype' => 'html',
			  	'charset' => 'iso-8859-1',
			  	'wordwrap' => TRUE
			);
			
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('jojocitytwo@gmail.com'); 
			$this->email->subject('E - Marketing portal');
			$message="<b>E - Marketing Protal</b><br />";
			$message.="A new Advertisement has been posted for your subscription.<br /><br />";
			$message.="<a href='".base_url()."advertisement/viewAd/$a'>click here</a> to view the ad.";
			$this->email->message($message);
		
		foreach($result as $record){
			$this->email->to($record->email);
			$this->email->send();
		}
	}
	
	
	public function accept_ad($a){
		$this->load->model('m_rules');
		if($this->m_rules->check_if_new($a)){
			$table = "new_advertisements";
			//accept from new table
		}
		else{
			$table = "edit_advertisements";
			//accept from edit table
		}
		$this->send_subscription_mail($a);
        $this->m_rules->accept_ad($a,$table);
		//$status_accept  = TRUE;
		$this->new_ads();
	}
	
	public function deny_ad($a){
		
		$this->load->model('m_rules');
		if($this->m_rules->check_if_new($a)){
			$table = "new_advertisements";
					//reject from new table
		}
		else{
			$table = "edit_advertisements";
			//reject from edit table
		}
		$this->m_rules->deny_ad($a,$table);
		
		$this->new_ads();
/*		
		$this->header('Send Denial Email');
		$this->load->view('v_ad_deny',$a);
		$this->footer();
		
		if($this->input->post('back'))
			{
				redirect('/rules/back1');
				//$data['state']='data';
	
			}
 * 
 */
	}
	
	//new
	public function algorithm($inputstring){
		
		//first check for links and emails
		//if positive don't continue, reject the ad
		
		//then divide it into words
		$exploded = $this->multiexplode(array(",",".","|",":","?","!","-","_"),$inputstring);
		
		//ignore the case
		
		//check the words with the Bad Word List
		
		
	}
	
	//new
	public function multiexplode($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
	}
	
	public function send_denial_email(){
		$config = Array(
				'protocol' => 'smtp',
			  	'smtp_host' => 'ssl://smtp.googlemail.com',
			  	'smtp_port' => 465,
			  	'smtp_user' => 'it12030736@my.sliit.lk',
			  	'smtp_pass' => 'It12030736@#1',
			  	'mailtype' => 'html',
			  	'charset' => 'iso-8859-1',
			  	'wordwrap' => TRUE
			);
			
			$message = 'Your Advertisement has been denied ';
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('it12030736@my.sliit.lk'); 
			$this->email->to('gcrescape@gmail.com');
			$this->email->subject('Advertisement Denied(Eportal)');
			$this->email->message($message);
			if($this->email->send())
			{
				//echo("success");
			}
			else
			{
				echo("fail");
			}
	}
	
	function header($tile){
		$data['title']=$tile;
		if($this->session->userdata('username')){
			if($this->session->userdata('usertype')=='a'){
				$this->load->view('header_admin',$data);
			}else{
				$this->load->view('header_loggedin',$data);
			}
		}
		else{
			$this->load->view('header_not_loggedin',$data);
		}
	}
	
	public function approvebyrating(){
		if($this->session->userdata('is_logged_in')){
		$this->load->model("m_rules");
		$result['value']=$this->m_rules->get_boundary();
		$this->header('Automatic Approval');
		$this->load->view('v_administration_autoapp',$result);
		$this->footer();
		}
		else {
			$this->restricted();
		}
	}
	
	public function whitelist(){
		if($this->session->userdata('is_logged_in')){
			$this->load->model('m_rules');
			$data['users']=$this->m_rules->get_whitelist_users();
			$this->header('White List');
			$this->load->view("v_administration_auto_whitelist",$data);
			$this->footer();
		}
		else {
			$this->restricted();
		}
	}
	
	public function blacklist(){
		if($this->session->userdata('is_logged_in')){
			$this->load->model('m_rules');
			$data['users']=$this->m_rules->get_blacklist_users();
			$this->header('Black List');
			$this->load->view("v_administration_auto_blacklist",$data);
			$this->footer();
		}
		else {
			$this->restricted();
		}
	}

	public function restricted() {
		$this->header('Please Signin');
		$this->load->view("v_restricted");
		$this->footer();
	}

	function footer(){
		$this->load->view('footer');
	}
}