<?php echo '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.google.com/schemas/sitemap/0.84" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">
<!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->


<url>
  <loc>https://www.backpageclassifieds.com/</loc>
  <lastmod>2021-01-26T06:19:45+00:00</lastmod>
  <priority>1.00</priority>
</url>
<url>
  <loc>https://backpageclassifieds.com/home</loc>
  <lastmod>2021-01-26T06:19:45+00:00</lastmod>
  <priority>1.00</priority>
</url>
<url>
  <loc>https://backpageclassifieds.com/authentication</loc>
  <lastmod>2021-01-26T06:19:45+00:00</lastmod>
  <priority>1.00</priority>
</url>
<url>
  <loc>https://backpageclassifieds.com/register</loc>
  <lastmod>2021-01-26T06:19:45+00:00</lastmod>
  <priority>1.00</priority>
</url>

<?php
$this->db->select('category_name,id');
$category_qry=$this->db->get('category_master')->result_array();
foreach ($category_qry as $cat)
{
echo"
<url>
  <loc>https://backpageclassifieds.com/ad/category/".strtolower(str_replace(' ','_',$cat['category_name']))."</loc>
  <lastmod>2021-01-26T06:19:45+00:00</lastmod>
  <priority>1.00</priority>
</url>";
 }
 $this->db->select('id');
 $sub_qry=$this->db->get('subcategory_master')->result_array();
 foreach ($sub_qry as $sub) 
{
echo"
<url>
  <loc>https://backpageclassifieds.com/ad/subcategory/".$sub['id']."</loc>
  <lastmod>2021-01-26T06:19:45+00:00</lastmod>
  <priority>1.00</priority>
</url>";
 }  
$this->db->select('country_name');
$country_qry=$this->db->get('countries_new')->result_array();
foreach ($country_qry as $country) {
echo"
<url>
  <loc>https://backpageclassifieds.com/ad/country/".str_replace(' ','
  _',$country['country_name'])."</loc>
  <lastmod>2021-01-26T06:19:45+00:00</lastmod>
  <priority>1.00</priority>
</url>";
 } 

$this->db->select('state_name');
$state_qry=$this->db->get('state_list_new')->result_array();
foreach ($state_qry as $state) {
echo"
<url>
  <loc>https://backpageclassifieds.com/ad/country/".str_replace(' ','_',$state['state_name'])."</loc>
  <lastmod>2021-01-26T06:19:45+00:00</lastmod>
  <priority>1.00</priority>
</url>";  
}



?>

</urlset>