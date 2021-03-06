<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar  navbar-default">
           <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
          <ul class="nav nav-sidebar">
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'rules/new_ads'?>"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;Accept Advertisements</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptExtend/view/all'?>"><span class="glyphicon glyphicon-repeat"></span>&nbsp;&nbsp;Extend Requests</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptFeatured/view/all'?>"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Featured Requests</a></li>
			<li class="dashLink "><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;User Management</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'report'?>"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Generate Reports</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'permissions'?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Manage Permissions</a></li>          
        	<li class="sub-link dashLink"><a href="<?php echo base_url().'rules/approvebyrating'?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Whitelist Blacklist Handling</a></li>          
          </ul>
</div>
<div class="container col-md-offset-2">

<div class="container">
	<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-default">
	<div class="panel-heading">
	    		<center><h3 class="panel-title"><strong>Advertisments</strong></h3></center>
	  </div>
	    
	    <div class="panel-body"> 
<?php
	
	foreach ($Ads as $info) 
	{
		echo '<div class="col-md-10 col-md-offset-1  img-thumbnail" style="margin-bottom: 12px;">
			<div class="col-sm-2 pull-left">';
				 
				    	if(isset($info['Image']) && $info['Image']!=NULL){
				    		echo '<img  height="150" src="'.base_url().$info['Image'].'" class="img-thumbnail pull-left profile-picture"/>';
							
						}else{
							echo '<img height="150" src="'.base_url().'images/Advertisement/imagenotfound.png" class="img-thumbnail pull-left profile-picture"/>';
						}
					
			echo '</div>
			<div class="col-sm-7">
				<div class="row">';
					
				   				 echo '<a href="'.base_url().'rules/viewAd/'.$info['id'].'" class="text-primary"><u><b>'.$info['title'].'</b></u></a>'; 

					
				echo '</div>';
				
				
			echo '</div>';
						
					
					echo '<a href="'.base_url().'rules/deny_ad/'.$info['id'].'" class="btn btn-danger"><b> Deny </b></a>';
			
			//echo '</br>';
					echo '<a href="'.base_url().'rules/accept_ad/'.$info['id'].'" class="btn btn-success"><b> Accept </b></a>';
			
		echo '</div>';
	}
?>
</div>
</div>
</div>
</div>
</div>