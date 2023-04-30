<link rel="stylesheet" href="../css/Users/component/orderpage.css"></link>
<?php require APPROOT.'/views/Users/component/Header.php'?>

<div class="nav">
            <nav>
                <span class="site_name" id="part_a">SOBA</span><span id="part_b">WITHA</span>
                <ul>
                    <li class="home_link"><a href="<?php echo URLROOT?>/Pages/home">Home</a></li>
                    <li><a href="<?php echo URLROOT?>/resources/resource_page">Resources</a></li> 
                    <li><a href="<?php echo URLROOT?>/forum/forum">Forum</a></li> 
                    <li><a href="">Sell</a></li>
                    <li><a href="<?php echo URLROOT?>/Login/login"><i class="fa-regular fa-user" id="user_home"></i> Join Us</a></li>    
                </ul>
            </nav>
            <hr class="home_hr">
</div>


<div class="container">
      
      
      <div class="layout-page">
      
       <form>
        <h1>Billing Details</h1>
        <label>  
          <span class="fname"> First Name <span class="required"> * </span></span>  
          <input type="text" name="fname">  
        </label>  
        <label>  
          <span class="lname"> Last Name <span class="required"> * </span> </span>  
          <input type="text" name="lname">  
        </label>  
        <label>  
          <span> Company Name </span>  
          <input type="text" name="cn">  
        </label>  
        <label>  
          <span>Country <span class="required">*</span></span>  
          <select name="selection">  
            <option value="select"> Select a country... </option>  
            <option value="AFG">Afghanistan</option>  
            <option value="ALA">?land Islands</option>  
            <option value="ALB">Albania</option>  
            <option value="DZA">Algeria</option>  
            <option value="ASM">American Samoa</option>  
            <option value="AND">Andorra</option>  
            <option value="BOL">Bolivia</option>  
            <option value="BES">Bonaire</option>  
            <option value="BIH">Bosnia</option>  
            <option value="BWA">Botswana</option>  
            <option value="BVT">Bouvet Island</option>  
            <option value="BRA">Brazil</option>  
            <option value="CUB">Cuba</option>  
            <option value="CUW">Cura?ao</option>  
            <option value="CYP">Cyprus</option>  
            <option value="CZE">Czech Republic</option>  
            <option value="EST">Estonia</option>  
            <option value="ETH">Ethiopia</option>  
            <option value="FLK">Falkland Islands (Malvinas)</option>  
            <option value="LTU">Lithuania</option>  
            <option value="LUX">Luxembourg</option>  
            <option value="MAC">Macao</option>  
            <option value="MKD">Macedonia, the former Yugoslav Republic of</option>  
            <option value="MDG">Madagascar</option>  
            <option value="MCO">Monaco</option>  
            <option value="MNG">Mongolia</option>  
            <option value="MNE">Montenegro</option>  
            <option value="MSR">Montserrat</option>  
            <option value="MAR">Morocco</option>  
            <option value="NPL">Nepal</option>  
            <option value="BLM">Saint Barth?lemy</option>  
            <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>  
            <option value="KNA">Saint Kitts and Nevis</option>  
            <option value="LCA">Saint Lucia</option>  
            <option value="MAF">Saint Martin (French part)</option>  
            <option value="SPM">Saint Pierre and Miquelon</option>  
            <option value="VCT">Saint Vincent and the Grenadines</option>  
            <option value="VNM">Viet Nam</option>  
            <option value="VGB">Virgin Islands, British</option>  
            <option value="VIR">Virgin Islands, U.S.</option>  
            <option value="WLF">Wallis and Futuna</option>  
            <option value="ESH">Western Sahara</option>  
            <option value="YEM">Yemen</option>  
            <option value="ZMB">Zambia</option>  
            <option value="ZWE">Zimbabwe</option>  
          </select>  
        </label>  
        <label>  
          <span> Address <span class="required"> * </span></span>  
          <input type="text" name="houseadd" placeholder="House number and street name" required>  
        </label>  
        <label>  
          <span> </span>  
          <input type="text" name="apartment" placeholder="Apartment, suite, unit etc. (optional)">  
        </label>  
        <label>  
          <span> Postcode / ZIP <span class="required">*</span></span>  
          <input type="text" name="city">   
        </label>  
        <label>  
          <span> Phone<span class="required">*</span></span>  
          <input type="tel" name="city">   
        </label>  
        <label>  
          <span> Email-Address<span class="required">*</span></span>  
          <input type="email" name="city">   
        </label>  
        <!-- <label>  
          <span> Phone Number <span class="required">*</span></span>  
          <input type="tel" name="city">   
        </label>  
        <label>  
          <span> Email Address <span class="required">*</span></span>  
          <input type="email" name="city">   
        </label>   -->

        <hr>
              


        <div class = "order-control"> 

        <input type="checkbox" class="order-control-input" id="same-address">
        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>

        </div>
       

        <hr>
      </form>  
       <div class="order-summary">
     
        <table>
          <tr>
            <th colspan="2">Your Order<span class = "number"> 3 </span></th>
          </tr>
          <tr>
            <td>Product Name </td>
            <span><td>$8.00</td></span>
            
          </tr>
          <tr>
            <td>Sub Total</td>
            <td>$10.00</td>
          </tr>
          <tr>
            <td>Delivery Fee</td>
            <td>23</td>
          </tr>
          <tr>
            <td>Total Fee</td>
            <td> $8.00 </td>  
          </tr>
        </table>
        <button type="button"> Place Order </button>  
       </div>
      </div>
    </div>
    



<?php require APPROOT.'/views/Users/component/footer.php'?>

