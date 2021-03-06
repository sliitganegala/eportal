<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<link href="<?php echo base_url().'css/bootstrap.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/bootstrap-theme.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'css/cat_menu.css'?>" rel="stylesheet">
	
<!-------------------------------Start site icon----------------------------->
	<link rel="shortcut icon" href="<?php echo base_url().'images/site/icon.ico'?>">
<!--------------------------------End site icon------------------------------>
		
<!-------------------------------Theme stylesheet----------------------------->
	<link href="<?php echo base_url().'css/site-color-theme.css'?>" rel="stylesheet">
<!--------------------------------End Theme stylesheet------------------------>

	<title><?php if(isset($title)) echo $title;?></title>
</head>
<body style="background-color: #f1f1f1">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="<?php echo base_url().'js/jquery-1.11.0.min.js'?>" ></script>
	<script src="<?php echo base_url().'js/jquery-1.11.0.js'?>"></script>
	<script src="<?php echo base_url().'js/bootstrap.js'?>"></script>
	<script src="<?php echo base_url().'js/bootstrap.min.js'?>"></script>
	<script src="<?php echo base_url().'js/tooltip.js'?>"></script>
	<script src="<?php echo base_url().'js/jquery.js'?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'js/jquery.MetaData.js'?>" type="text/javascript" language="javascript"></script>
 	<script src="<?php echo base_url().'js/jquery.rating.js'?>" type="text/javascript" language="javascript"></script>
 	<link href="<?php echo base_url().'js/jquery.rating.css'?>" type="text/css" rel="stylesheet"/>
	<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/1.7.3/less.min.js"></script>
	<script type="text/javascript">
	    $(function () {
	        $('[data-toggle="tooltip"]').tooltip({'placement': 'right'});
	        $('.dropdown-toggle').dropdown();
	    });
	    
</script>
<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.1.1/bootstrap.min.js"></script>
	<script type='text/javascript' src='<?php echo base_url().'menu_jquery.js';?>'></script>


	<div class="navbar navbar-main-theme navbar-fixed-top" style="max-height: 25px; min-height: 25px;" >	
		<div class="container">
			<ul class="nav navbar-nav navbar-right">	
					<li><a href="<?php echo base_url().'administration/user_management'?>" value="adminPanel" > Administrative Panel </a></li>
					
					<li><a href="<?php if($this->session->userdata('username')){echo base_url().'profile/'.$this->session->userdata('username');}?>">
							<?php if($this->session->userdata('name')){echo $this->session->userdata('name');}?>
						</a>
					</li>
					<li>
						<div>
						 	<a class="dropdown-toggle" data-toggle="dropdown">
						   		<span class="glyphicon glyphicon-cog"></span>
						   		<span class="caret"></span>
						  	</a>
							<ul class="dropdown-menu" role="menu" style="margin-top:3px;">
							   	<li><a href="<?php echo base_url()."advertisement/adList"; ?>">My advertisements</a></li>
							   	<li><a href="#">Notifications</a></li>
							   	<li><a href="<?php echo base_url().'report'; ?>">Generate Reports</a></li>
							   	<li class="divider"></li>
							   	<li><a href="<?php echo base_url().'profile/update'; ?>">Profile settings</a></li>
							   	<li><a href="<?php echo base_url().'advertisement/createAd'; ?>">Post Advertisement</a></li>
							   	<li class="divider"></li>
							   	<li><a href="<?php echo base_url().'signin/signout'; ?>">Sign out</a></li>
							</ul>
						</div>
					</li>
				</ul>
		</div>
		<div class="logo-background">
			<div class="container">
				<div class=" col-md-2 pull-left">
					<a href="<?php echo base_url();?>home">
						<div class="pull-left">
							<img class="site-logo" src="<?php echo base_url()?>images/site/logo.png" />
						</div>
					</a>
				</div>
				<div class=" col-md-10">
					<div class="col-md-12">
						<br />
						
						<?php 
							$formattributes = array('class' => 'form-inline', 'role' => 'search');
								echo form_open('site/search01',$formattributes);
									// Open the form and redirects to the "login_validation" function in the main controller
									echo '<div class="btn-group pull-right">';	
									$inputkeyword = array('class'=>'form-group form-control','name'=>'title','placeholder'=>'Search here...','style'=>'width:480px;height:34px;padding-right:7px;margin-right:-2px');
									echo form_input($inputkeyword);
									
									$registerbtnattributes = array('class' => 'form-group btn btn-primary pull-right','name'=>'search_submit','value'=>'Search');
									echo form_submit($registerbtnattributes);
									echo '</div>';
								echo form_close();
						?>
					</div>
				</div>
			</div>
		</div>
		
		<div class="navbar-background">
			<div class="container">
				<div id='cssmenu'>
					<ul>
					   <li><a href='<?php echo base_url();?>site/search02/category/2'><span>Electronic</span></a>
					   	<ul><?php $this->db->where('categoryid',2);
							$result=$this->db->get('subcategory')->result();
							foreach($result as $key){?>
					         <li class=''><a href='<?php echo base_url();?>site/search02/sub_category/<?php echo $key->id;?>'><span><?php echo $key->name;?></span></a></li>
					         <?php }?>
					      </ul>
					   </li>
					   <li><a href='<?php echo base_url();?>site/search02/category/5'><span>Clocks</span></a>
					      <ul>
					        <?php $this->db->where('categoryid',5);
							$result=$this->db->get('subcategory')->result();
							foreach($result as $key){?>
					         <li class=''><a href='<?php echo base_url();?>site/search02/sub_category/<?php echo $key->id;?>'><span><?php echo $key->name;?></span></a></li>
					         <?php }?>
					      </ul>
					   </li>
					   <li><a href='<?php echo base_url();?>site/search02/category/1'><span>Vehicles</span></a>
					   	<ul>
					         <?php $this->db->where('categoryid',1);
							$result=$this->db->get('subcategory')->result();
							foreach($result as $key){?>
					         <li class=''><a href='<?php echo base_url();?>site/search02/sub_category/<?php echo $key->id;?>'><span><?php echo $key->name;?></span></a></li>
					         <?php }?>
					      </ul>
					   </li>
					   <li class=''><a href='<?php echo base_url();?>site/search02/category/3'><span>Properties</span></a>
					   	<ul>
					         <?php $this->db->where('categoryid',3);
							$result=$this->db->get('subcategory')->result();
							foreach($result as $key){?>
					         <li class=''><a href='<?php echo base_url();?>site/search02/sub_category/<?php echo $key->id;?>'><span><?php echo $key->name;?></span></a></li>
					         <?php }?>
					      </ul>
					   </li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<div class="navbar navbar-default navbar-static-top" style="margin-bottom:180px"></div>












