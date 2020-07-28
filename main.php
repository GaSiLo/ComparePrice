<html>
<head>
<title>
Compare Price
</title>
<link rel="stylesheet" href="style3.css">
</head>
<body>
<div class="navbar">
<div class="container">
<div class="logo_div">
<img src="logo.png" alt="" class="logo">
</div>
<div class="navbar_links">
<ul class="menu">
<li><a href="new.php">Home </a></li>
<li><a href="about.html">About Us</a></li>
<li><a href="Serv.html">Services</a></li>
<li><a href="contact.html">Contact Us</a></li>
</ul>
</div>
</div>
</div>
<br><br>


<div class="sb">
<form  action="main.php" method="get">
<input class="st" type="text" placeholder="Search..." name="searchdata" required>
<a class="sbu">
<i class="fas fa-search"></i>
</a>
</form>
</div><br><br><br>
<div class="w3-row-padding w3-margin-top">





<?php
//get webpage data by using url ie. web page link
error_reporting(E_ALL & ~E_NOTICE);
if(isset($_GET['searchdata']))
{
  //user enter search data then show this
  //pass searchdata to below link in search
  $search=$_GET['searchdata'];
  $search=mb_strtolower($search);
  //space to plus replace
  $search=str_replace(" ","+",$search);
  $web_page_data=file_get_contents("http://www.pricetree.com/search.aspx?q=".$search);
  //echo"helllo"."</br>";
  //echo"---------------"."</br>";

  //particular data///////////////////////
  $item_list=explode('<div class="items-wrap">',$web_page_data);
  //print_r($item_list);
  $i=1;
if(sizeof($item_list)<2){
  echo'<p>No Results,enter correct product name ex:moto g</p>
  ';
  $i=5;
}
///variable to check no data
$count=4;
  ///
  for($i;$i<5;$i++){
    //echo $item_list[$i];

    $url_link1=explode('href="',$item_list[$i]);
    $url_link2=explode('"',$url_link1[1]);
    //echo $url_link2[0]."</br>";

    $image_link1=explode('data-original="',$item_list[$i]);
    $image_link2=explode('"',$image_link1[1]);
    //echo $image_link2[0]."</br>";

  ///title
    $title1=explode('title="',$item_list[$i]);
    $title2=explode('"',$title1[1]);


    $avail1=explode('avail-stores">',$item_list[$i]);
    $avail=explode('</div>',$avail1[1]);
    if(strcmp($avail[0],"Not available")==0){
//means not available
$count=$count-1;
      continue;
    }



    $item_title=$title2[0];
    if(strlen($item_title)<2){
      //if no title means  no product

      continue;

    }
    $item_link=$url_link2[0];
    $item_image_link=$image_link2[0];
    $item_id1=explode("-",$item_link);
    $item_id=end($item_id1);

  ////image
    echo'
    <br>
    <div class="w3-row">
    <div class="w3-col l2 w3-row-padding">
    <div class="w3-card-2" style="background-color:teal;color:white;">
    <img src="'.$item_image_link.'" style="width:100%">
    <div class="w3-container">
    <h5>'.$item_title.'</h5>
    </div>
    </div>
    </div>


  ';






    //echo $item_title."</br>";
    //echo $item_link."</br>";
    //echo $item_image_link."</br>";
    //echo $item_id."</br>";

  //price tree accces
  //  $request="http://www.pricetree.com/dev/ap1.ashx?pricetreeId=".$item_id."&apikey=7770AD31-382F-4D32-8C36-3743C0271699";
  //  $response=file_get_contents($request);
  //  $results=json_decode($response,TRUE);
    $request = "http://www.pricetree.com/dev/api.ashx?pricetreeId=".$item_id."&apikey=7770AD31-382F-4D32-8C36-3743C0271699";
    $response = file_get_contents($request);
    $results = json_decode($response, TRUE);
    //print_r($results);  echo"-------------";
    //echo $results['count'];
    // code...3parts
    echo'
    <div class="w3-col l8">
    <div class="w3-card-2">
      <table class="w3-table w3-striped w3-bordered w3-card-4">
        <thead>
          <tr class="w3-blue">
            <th>Seller_Name</th>
            <th>Price</th>
            <th>In Stock</th>
            <th>Buy Here</th>
          </tr>
        </thead>
      ';


    foreach ($results['data'] as $itemdata) {
      // code...
      $seller=$itemdata['Seller_Name'];
      $price=$itemdata['Best_Price'];
      $stock=$itemdata['In_Stock'];
      //$pname=$itemdata['Product_Name'];
      //$color=$itemdata['Product_Color'];
      $product_link=$itemdata['Uri'];
      //echo $seller.",".$price.",".$stock.",".$color.",".$product_link."</br>";
  echo'

      <tr>
      <td>'.$seller.'</td>
      <td>&#8377;'.$price.'</td>
      <td>'.$stock.'</td>
      <td><a href="'.$product_link.'"</a>Buy</td>
      </tr>
      ';
   }

  echo'
    </table>
    </div>
    </div>
    </div>
    ';
  }

  if($count==0){
  echo '<p><b>no products available,enter proper product</b></p>';
  }
}
else{
  echo'<p>use this to get best price.
  <b>search product</b>
  </p>

  ';
}
?>
</div>

<button id="myBtn"><a href="" style="color: white">Top</a></button>

</body>
</html>
