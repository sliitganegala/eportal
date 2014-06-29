<link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
<div class="col-sm-3 col-md-2 sidebar navbar-default">
           <div class="h5 text-center dashboard"><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-link"></span>&nbsp;Dashboard</a></div>
          <ul class="nav nav-sidebar">
            <li class="sub-link dashLink"><a href="<?php echo base_url().'administration/configDetails'?>">Configure Details</a></li>
            <li class="sub-link dashLink"><a href="<?php echo base_url().'rules/new_ads'?>">Accept Advertisements</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptExtend/view/all'?>">Extend Requests</a></li>
			<li class="sub-link dashLink"><a href="<?php echo base_url().'administration/acceptFeatured/view/all'?>">Featured Requests</a></li>
			<li class="dashLink active"><a href="<?php echo base_url().'administration/user_management'?>"><span class="glyphicon glyphicon-user"></span>&nbsp;User Management</a></li>
			<li class="dashLink"><a href="<?php echo base_url().'report'?>">Generate Reports</a></li>
		
          </ul>

          <ul class="nav nav-sidebar ">
          </ul>
</div>
<div class="col-md-10 col-md-offset-2 ">
<div class="">
	<table class="table table-striped ">
 		<table class="table table-hover">
      <thead>
        <tr>
          <th>Username</th>
          <th>Name</th>
          <th>User Type</th>
          <th>Description</th>
          <th>Registered On</th>
          <th>Provice</th>
          <th>District</th>
          
        </tr>
      </thead>
      
      <tbody>
      	<?php foreach($ads as $details){?>
        <tr>
        <td style="max-width: 210px;"><?php echo $details->username;?></td>
        
        <td style="max-width: 210px;">
          	<?php 
          		if($details->usertype==a ){
          				$this->db->where('username',$details->username);
						$result=$this->db->get('admin_users')->result();
						foreach($result as $key)
						{
						//	echo $key->name + ;
						}	
					}else if($details->usertype==n){
						$this->db->where('id',$details->districtid);
						$result=$this->db->get('district')->result();
						foreach($result as $key)
						{
							echo $key->name;
						}	
					}          	
          	?>
          </td>
        
        <td style="max-width: 210px;">
        	<?php 
          		if($details->usertype==a){
          				echo("Administrator");
					}else if($details->usertype==n){
						echo("Normal");
					}  
					else if($details->usertype==b){
						echo("Business");
					}         
					else 	
						echo("No Type");
          	?>
        </td>
          <td style="max-width: 210px;">
          	<?php 
          		if($details->districtid==0){
          				echo("No District");
					}else{
						$this->db->where('id',$details->districtid);
						$result=$this->db->get('district')->result();
						foreach($result as $key)
						{
							echo $key->name;
						}	
					}          	
          	?>
          </td>
          <td style="max-width: 210px;">
          	<?php 
          		if($details->provinceid==0){
          				echo("No Province");
					}else{
						$this->db->where('id',$details->provinceid);
						$result=$this->db->get('province')->result();
						foreach($result as $key)
						{
							echo $key->name;
						}	
					}          	
          	?>
          </td>
          <td style="max-width: 210px;">
          	<?php 
          		if($details->featured==1){
          				echo("Yes");
					}else{
						echo("No");
					}          	
          	?>
          </td>
          <td style="max-width: 210px;"><?php echo $details->createdate;?></td>
          <td style="max-width: 210px;"><?php echo $details->duration;?></td>
          <td style="max-width: 210px;"><?php echo $details->username;?></td>
          <td style="max-width: 240px;"><?php echo $details->price;?></td>
          
        </tr>
        <?php } ?>
      </tbody>
    </table>
	</table>
</div>
</div>