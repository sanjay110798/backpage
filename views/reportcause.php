<link href="<?php echo base_url();?>fontassets/css/report.css" rel="stylesheet">
<!-- \\\\////////// -->
   <section class="about-banner">
        <div class="container">
            <div class="banner-content">
                <div class="row">
                    <h2>Report Ad</h2>
                </div>
            </div>
        </div>
    </section>
   <?php
   $u_id=$this->session->userdata('login_id'); 
   $ad_id=$this->uri->segment(3);
   $this->db->select('id,ad_image');
   $ad_qry=$this->db->get_where('ad_master',array('id'=>$ad_id))->row();
   ?>
    <section class="about-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3"><h1 style="border-bottom: 2px solid #e1e1e1;font-weight: 600; color: #d93920;">WHY YOU WANT TO REPORT THIS AD !!!!</h1></div>
                <hr>
                <div class="col-md-6 my-auto">
                   <img src="<?=$ad_qry->ad_image?>" alt="Backpage Classifieds Image" class="d-block" width="372">  
                </div>
                <div class="col-md-6">
                    <form action="<?php echo base_url('report/reportad/'.$ad_id.'/'.$u_id);?>" method="post">
                    <div class="col-md-12 form-group">
                     <input type="checkbox" name="report_cause[]" value="Hateful or abusive content">  
                     <label><p>Hateful or abusive content</p></label>
                      
                    </div>
                    <div class="col-md-12 form-group">
                     <input type="checkbox" name="report_cause[]" value="Inaccurate information"> 
                     <label><p>Inaccurate information</p></label>
                      
                    </div>
                    <div class="col-md-12 form-group">
                     <input type="checkbox" name="report_cause[]" value="Problematic promotion of healthcare-related product">   
                     <label><p>Problematic promotion of healthcare-related product</p></label>
                     
                    </div>
                    <div class="col-md-12 form-group">
                     <input type="checkbox" name="report_cause[]" value="Sexual content">
                     <label><p>Sexual content.</p></label>
                    
                    </div>
                    <div class="col-md-12 form-group">
                     <input type="checkbox" name="report_cause[]" value="Legal issues">  
                     <label><p>Legal issues</p></label>
                     
                    </div>
                    <div class="col-md-12 form-group">
                     <input type="checkbox" name="report_cause[]" value="Promotes dangerous products or services">   
                     <label><p>Promotes dangerous products or services</p></label>
                     
                    </div>
                    <div class="col-md-12 form-group">
                     <input type="checkbox" name="report_cause[]" value="Misleading content or scam"> 
                     <label><p>Misleading content or scam</p></label>
                       
                    </div>
                    <div class="col-md-12 form-group">
                     <input type="checkbox" name="report_cause[]" value="Violation of counterfeit goods policy">  
                     <label><p>Violation of counterfeit goods policy</p></label>
                     
                    </div>
                    <div class="col-md-12 form-group">
                     <input type="checkbox" name="report_cause[]" value="Violation of trademark policy">
                     <label><p>Violation of trademark policy</p></label>
                        
                    </div>
                    <div class="col-md-12 form-group">
                    <button class="btn btn-success" type="submit" align="right" style="background: #d93920; border: none;">submit</button>
                    <button class="btn btn-success" type="button" onClick="history.go(-1);" align="right" style="background: black;border: none;">Back</button>
                    </div>
                    </form>   
                </div>
            </div>
        </div>
    </section>
<style type="text/css">
    .form-group {
        margin-bottom: 0!important;
    }
    label
    {
       margin-bottom: 0!important; 
    }
</style>