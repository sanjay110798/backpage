<link href="<?php echo base_url();?>fontassets/css/user-profile.css" rel="stylesheet">
<style type="text/css">
	input
	{
	 text-transform:none!important;
	}
</style>
<?php
if($this->session->userdata('login_id')=='')
{
  redirect('authentication?loginerr==0');
}
?>
 <section class="user-profile-banner ">
        <div class="container ">
            <div class="banner-content">
                <div class="row"></div>
            </div>
        </div>
    </section>


    <section class="user-content-sec">
        <div class="container">
            <div class="row">
                <div class="user-profile-content mt-4">
                    <h2 class="profile-title"><i class="fa fa-user"></i> Profile</h2>
                    <div class="user-profile-form">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile-img">
                                    <form action="<?php echo base_url();?>profile/updatepicture/<?=$this->session->userdata('login_id');?>" method="post" id="formprofilepicture" enctype="multipart/form-data"> 
                                        <input type="file" name="profilepicture" id="profilepicture" class="form-control-file">
                                        <i class="fa fa-user-plus"></i>
                                        <label>Upload Profile Photo</label>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="profile-info">
                                	<?php 
                                    $user=$this->db->get_where('user_master',array('id'=>$this->session->userdata('login_id')))->row();                                    
                                	?>
                                    <form action="<?php echo base_url();?>profile/update/<?=$this->session->userdata('login_id');?>" method="post">
                                        <div class="row">
                                            <div class="col">
                                                <label>Nick Name :</label>
                                                <input type="text" class="form-control" name="nickname" value="<?=$user->nickname;?>" placeholder="Enter Your Name">
                                            </div>
                                            <div class="col">
                                                <label class="chekbox-label">Form of Address :</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Mr" <?php if($user->gender=='Mr'){echo "checked";} ?>>
                                                    <label class="form-check-label" for="inlineRadio1"> Mr.</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Mrs" <?php if($user->gender=='Mrs'){echo "checked";} ?>>
                                                    <label class="form-check-label" for="inlineRadio2">Mrs</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="Ms" <?php if($user->gender=='Ms'){echo "checked";} ?>>
                                                    <label class="form-check-label" for="inlineRadio3"> Ms.</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label>Email :</label>
                                                <input type="text" class="form-control" placeholder="Enter Email Address" value="<?=$user->email;?>" readonly>
                                            </div>
                                            <div class="col">
                                                <label>Password :</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password" value="<?=$user->password;?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label>User name :</label>
                                                <input type="text" class="form-control" placeholder="Chosse a username" value="<?=$user->name;?>" readonly>
                                            </div>
                                            <div class="col">
                                                <label>Country Code:</label>
												<select class="form-control select-pincode mdb-select" name="phonecode" required>
												<option>Select</option>
												<?php 
												$code_id=$this->db->get('country')->result_array();
												foreach ($code_id as $code) {

												?>
												<option value="<?=$code['phonecode']?>"<?php if($code['phonecode']==$user->mobile_code){echo"selected";}?>><?=$user->country;?>(+<?=$code['phonecode']?>)</option>

												<?php } ?>
												</select>
                                            </div>
                                        </div>
                                        <div class="row">
                                        	<div class="col">
                                                <label>Phone Number:</label>
                                                <input type="text" class="form-control" name="mobile" placeholder="Your mobile number" value="<?=$user->mobile;?>" maxlength="15" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                            </div>
                                            <div class="col">
                                                <label>Birthday :</label>
                                                <input type="date" name="birthday" class="form-control" value="<?=$user->birthday?>">
                                            </div>
                                            
                                        </div>
                                        <div class="row profile-btns">
                                            <div class="col">
                                                <a href="<?php echo base_url();?>profile"><button type="button" class="btn view-profile-btn">View Profile</button></a>
                                                <button type="submit" class="btn update-prfile-btn">Update User Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="default-details mb-4">
                    <h2 class="default-details-title"><i class="fa fa-arrows"></i> Default Details for Ad</h2>
                    <div class="default-details-form">
                        <form action="<?php echo base_url();?>profile/updatedetails/<?=$this->session->userdata('login_id');?>" method="post">
                            <div class="row">
                                <div class="col">
                                    <label>Location :</label>
                                    <input type="text" class="form-control" name="street" placeholder="Enter Your Location" value="<?=$user->address;?>">
                                </div>
                                <div class="col">
                                    <label>Zip Code :</label>
                                    <input type="text" class="form-control" name="zipcode" placeholder="Enter your zip code" value="<?=$user->zipcode;?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Country :</label>
									
                                    <input type="text" name="country" class="form-control" list="country_idd" id="country" value="<?=$user->country?>" required>
                                    <datalist id="country_idd">
                                    <?php 
                                    $country_qry=$this->db->get('countries_new')->result_array();
                                    foreach ($country_qry as $country) {

                                    ?>
                                    <option value="<?=$country['country_name']?>"<?php if($country['country_name']==$user->country){echo"selected";}?>><?=$country['country_name'];?></option>

                                    <?php } ?>    
                                    </datalist>
                                </div>
                                <div class="col">
                                    <label>State :</label>
									
                                    <input type="text" name="state" class="form-control" list="state" value="<?=$user->state?>" required>
                                    <datalist id="state">
                                     <?php 
                                    $qry=$this->db->get_where('countries_new',array('country_name'=>$user->country))->row(); 
                                    $state_qry=$this->db->get_where('state_list_new',array('country_id'=>$qry->id));
                                    foreach ($state_qry->result_array() as $state) 
                                    {      
                                    ?>
                                    <option value="<?=$state['state_name']?>"<?php if($state['state_name']==$user->state){echo"selected";}?>><?=$state['state_name']?></option>
                                    <?php } ?>   
                                    </datalist>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>City :</label>
									
                                    <input type="text" name="city" class="form-control" list="city" value="<?=$user->city?>" required>
                                    <datalist id="city">
                                     <?php 
                                    $qry=$this->db->get_where('countries_new',array('country_name'=>$user->country))->row(); 
                                    $city_qry=$this->db->get_where('cities',array('country_id'=>$qry->id));
                                    foreach ($city_qry->result_array() as $city) 
                                    {      
                                    ?>
                                    <option value="<?=$city['city_name']?>"<?php if($city['city_name']==$user->city){echo"selected";}?>><?=$city['city_name']?></option>
                                    <?php } ?>   
                                    </datalist>
                                </div>
                                <div class="col">
                                    <label class="chekbox-label">I am :</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="user_type" id="inlineRadio1" value="personal" <?php if($user->usertype=='personal'){echo "checked";} ?>>
                                        <label class="form-check-label" for="inlineRadio1">A Private user</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="user_type" id="inlineRadio2" value="commercial" <?php if($user->usertype=='commercial'){echo "checked";} ?>>
                                        <label class="form-check-label" for="inlineRadio2"> A Commercial User</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row details-btns">
                                <div class="col">
                                  <button type="submit" class="btn update-prfile-btn">Update User Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style type="text/css">
        .select2-container--default .select2-selection--single {
    height: 50px!important;
}

    </style>