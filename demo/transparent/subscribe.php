<?php

  require_once '../../library/recurly.php';
  
  // Replace with the PLAN_CODE for your subscription
  define('RECURLY_SUBSCRIPTION_PLAN_CODE', 'gold');
  
  // Replace with your Recurly API user credentials
  define('RECURLY_API_USERNAME', '');
  define('RECURLY_API_PASSWORD', '');
  define('RECURLY_SUBDOMAIN', '');
  define('RECURLY_PRIVATE_KEY', '');
  define('RECURLY_ENVIRONMENT', 'sandbox');

  RecurlyClient::SetAuth(RECURLY_API_USERNAME, RECURLY_API_PASSWORD, RECURLY_SUBDOMAIN, RECURLY_ENVIRONMENT, RECURLY_PRIVATE_KEY);
  
  // Setting timezone for time() function.
  date_default_timezone_set('America/Los_Angeles');
  
  // Replace with the user's unique ID in your system
  $account_id = 'demo-' . strval(time());
  
  $transparent = new RecurlyTransparent(array(
    'redirect_url' => 'http://localhost/subscribe.php',
    'account' => array(
      'account_code' => $account_id,
      'username' => 'username123'
    ),
    'subscription' => array(
      'plan_code' => 'gold'
    )
  ));
  
  $subscription = new RecurlySubscription();
  $subscription->account = new RecurlyAccount();
  $subscription->account->billing_info = new RecurlyBillingInfo();

  if (RecurlyTransparent::resultsAvailable()) {
    try {
      $subscription = RecurlyTransparent::getResults();
      $success_message = "Success!";

      print "<!-- Transparent Post Result:\n";
      print_r($subscription);
      print "\n-->\n";

    } catch (RecurlyValidationException $e) {
      $subscription = $e->model;
      $error_message = $e->getMessage(); //"An error occurred while processing your transaction.";

      print "<!-- Transparent Post Result:\n";
      print_r($e);
      print "\n-->\n";
    }
  }

?>
<!DOCTYPE html> 
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <title>Recurly - Transparent Post Subscribe Demo</title>
  <link type="text/css" rel="stylesheet" href="../style.css"/>
</head>
<body>
  <div class="container">

    <h1>Recurly Example</h1>

    <dl class="invoice">
      <dt class="planname">Subscribe Example</dt>
      <dd>$9.99 per month</dd>
    </dl>
    
<?php
  // Print success or error message
  if (isset($success_message))
    print "    <div class=\"success\">$success_message</div>\n";
  if (isset($error_message))
    print "    <div class=\"error\">$error_message</div>\n"; 
?>

    <form method="post" action="<?php echo RecurlyTransparent::subscribeUrl(); ?>">
      <?php echo $transparent->hidden_field(); ?>
      <table class="editor">
        <!-- Account Details -->
        <tr>
          <td class="field"><label for="account_first_name">First Name</label></td>
          <td><input class="text" id="account_first_name" maxlength="50" name="account[first_name]" size="50" type="text"
            value="<?php print htmlentities($subscription->account->first_name); ?>" /></td>
        </tr>
        <tr>
          <td class="field"><label for="account_last_name">Last Name</label></td>
          <td><input class="text" id="account_last_name" maxlength="50" name="account[last_name]" size="50" type="text"
            value="<?php print htmlentities($subscription->account->last_name); ?>" /></td>
        </tr>
        <tr>
          <td class="field"><label for="account_email">Email Address</label></td>
          <td><input class="text" id="account_email" maxlength="50" name="account[email]" size="50" type="text"
            value="<?php print htmlentities($subscription->account->email); ?>" /></td>
        </tr>
        <tr>
          <td class="field"><label for="account_username" class="optional">Username</label></td>
          <td><input class="text" id="account_username" maxlength="50" name="account[username]" size="50" type="text"
            value="<?php print htmlentities($subscription->account->username); ?>" /></td>
        </tr>
    
        <!-- Credit Card Details -->
        <tr><td class="section">&nbsp;</td></tr>
        <tr>
          <td class="field"></td>
          <td><img alt="Visa" height="32" src="../images/visa.png" width="32" />
            <img alt="MasterCard" height="32" src="../images/mastercard.png" width="32" />
            <img alt="AmEx" height="32" src="../images/amex.png" width="32" />
            <img alt="Discover" height="32" src="../images/discover.png" width="32" />
          </td>
        </tr>
        <tr>
          <td class="field"><label for="billing_info_credit_card_number">Credit Card Number</label></td>
          <td><input class="text" id="billing_info_credit_card_number" maxlength="20" name="billing_info[credit_card][number]" size="20" type="text" /></td>
        </tr>
        <tr>
          <td class="field"><label for="billing_info_credit_card_verification_value">Verification Code</label></td>
          <td><input class="text cvv" id="billing_info_credit_card_verification_value" maxlength="4" name="billing_info[credit_card][verification_value]" size="4" type="text" />
            <img alt="CVV" src="../images/cvv-glyph.png" />
          </td>
        </tr>
        <tr>
          <td class="field"><label for="billing_info_credit_card_month">Exp. Date</label></td>
          <td>
            <select id="billing_info_credit_card_month" name="billing_info[credit_card][month]">
<?php
  $months = array("January", "February", "March", "April", "May", "June", "July",
    "August", "September", "October", "November", "December");
    
  for ($month = 1; $month <= 12; $month++) {
    print "<option value=\"$month\"";
    if ($subscription->account->billing_info->credit_card->month == $month)
      print " selected=\"true\"";
    print ">" . $months[$month - 1] . "</option>\n";
  }
?>
            </select> 
            <select id="billing_info_credit_card_year" name="billing_info[credit_card][year]">
<?php 
  $date = getdate();
  $current_year = $date['year'];
  for ($year = $current_year; $year <= $current_year + 10; $year++) {
    print "<option value=\"$year\"";
    if ($subscription->account->billing_info->credit_card->year == $year)
      print " selected=\"true\"";
    print ">$year</option>\n";
  }
?>
            </select>
          </td>
        </tr>
        <tr><td class="section">&nbsp;</td></tr>
        
        <!-- Billing Info Details -->
        <tr>
          <td class="field"><label for="billing_info_address1">Address 1</label></td>
          <td><input class="text" id="billing_info_address1" maxlength="50" name="billing_info[address1]" size="50" type="text"
            value="<?php print htmlentities($subscription->account->billing_info->address1); ?>" /></td>
        </tr>
        <tr>
          <td class="field"><label for="billing_info_address2" class="optional">Address 2</label></td>
      	  <td><input class="text" id="billing_info_address2" maxlength="50" name="billing_info[address2]" size="50" type="text"
            value="<?php print htmlentities($subscription->account->billing_info->address2); ?>" /></td>
        </tr>
        <tr>
          <td class="field"><label for="billing_info_city">City</label></td>
          <td><input class="text" id="billing_info_city" maxlength="50" name="billing_info[city]" size="50" type="text"
            value="<?php print htmlentities($subscription->account->billing_info->city); ?>" /></td>
        </tr>
        <tr>
          <td class="field"><label for="billing_info_state">State/Province</label></td>
          <td><input class="text" id="billing_info_state" maxlength="50" name="billing_info[state]" size="50" type="text"
            value="<?php print htmlentities($subscription->account->billing_info->state); ?>" /></td>
        </tr>
        <tr>
          <td class="field"><label for="billing_info_zip">Zip/Postal Code</label></td>
          <td><input class="text" id="billing_info_zip" maxlength="20" name="billing_info[zip]" size="20" type="text"
            value="<?php print htmlentities($subscription->account->billing_info->zip); ?>" /></td>
        </tr>
        <tr>
          <td class="field"><label for="billing_info_country">Country</label></td>
          <td><select id="billing_info_country" name="billing_info[country]">
<option value="AF">Afghanistan</option>
<option value="AL">Albania</option>
<option value="DZ">Algeria</option>
<option value="AS">American Samoa</option>
<option value="AD">Andorra</option>
<option value="AO">Angola</option>
<option value="AI">Anguilla</option>
<option value="AG">Antigua and Barbuda</option>
<option value="AR">Argentina</option>
<option value="AM">Armenia</option>
<option value="AW">Aruba</option>
<option value="AU">Australia</option>
<option value="AT">Austria</option>
<option value="AX">Åland Islands</option>
<option value="AZ">Azerbaijan</option>
<option value="BS">Bahamas</option>
<option value="BH">Bahrain</option>
<option value="BD">Bangladesh</option>
<option value="BB">Barbados</option>
<option value="BY">Belarus</option>
<option value="BE">Belgium</option>
<option value="BZ">Belize</option>
<option value="BJ">Benin</option>
<option value="BM">Bermuda</option>
<option value="BT">Bhutan</option>
<option value="BO">Bolivia</option>
<option value="BA">Bosnia and Herzegovina</option>
<option value="BW">Botswana</option>
<option value="BV">Bouvet Island</option>
<option value="BR">Brazil</option>
<option value="BN">Brunei Darussalam</option>
<option value="IO">British Indian Ocean Territory</option>
<option value="BG">Bulgaria</option>
<option value="BF">Burkina Faso</option>
<option value="BI">Burundi</option>
<option value="KH">Cambodia</option>
<option value="CM">Cameroon</option>
<option value="CA">Canada</option>
<option value="CV">Cape Verde</option>
<option value="KY">Cayman Islands</option>
<option value="CF">Central African Republic</option>
<option value="TD">Chad</option>
<option value="CL">Chile</option>
<option value="CN">China</option>
<option value="CX">Christmas Island</option>
<option value="CC">Cocos (Keeling) Islands</option>
<option value="CO">Colombia</option>
<option value="KM">Comoros</option>
<option value="CG">Congo</option>
<option value="CD">Congo, the Democratic Republic of the</option>
<option value="CK">Cook Islands</option>
<option value="CR">Costa Rica</option>
<option value="CI">Cote D'Ivoire</option>
<option value="HR">Croatia</option>
<option value="CU">Cuba</option>
<option value="CY">Cyprus</option>
<option value="CZ">Czech Republic</option>
<option value="DK">Denmark</option>
<option value="DJ">Djibouti</option>
<option value="DM">Dominica</option>
<option value="DO">Dominican Republic</option>
<option value="EC">Ecuador</option>
<option value="EG">Egypt</option>
<option value="SV">El Salvador</option>
<option value="GQ">Equatorial Guinea</option>
<option value="ER">Eritrea</option>
<option value="EE">Estonia</option>
<option value="ET">Ethiopia</option>
<option value="FK">Falkland Islands (Malvinas)</option>
<option value="FO">Faroe Islands</option>
<option value="FJ">Fiji</option>
<option value="FI">Finland</option>
<option value="FR">France</option>
<option value="GF">French Guiana</option>
<option value="PF">French Polynesia</option>
<option value="TF">French Southern Territories</option>
<option value="GA">Gabon</option>
<option value="GM">Gambia</option>
<option value="GE">Georgia</option>
<option value="DE">Germany</option>
<option value="GH">Ghana</option>
<option value="GI">Gibraltar</option>
<option value="GR">Greece</option>
<option value="GL">Greenland</option>
<option value="GD">Grenada</option>
<option value="GP">Guadeloupe</option>
<option value="GU">Guam</option>
<option value="GT">Guatemala</option>
<option value="GN">Guinea</option>
<option value="GW">Guinea-Bissau</option>
<option value="GY">Guyana</option>
<option value="GG">Guernsey</option>
<option value="HT">Haiti</option>
<option value="VA">Holy See (Vatican City State)</option>
<option value="HN">Honduras</option>
<option value="HK">Hong Kong</option>
<option value="HM">Heard Island And Mcdonald Islands</option>
<option value="HU">Hungary</option>
<option value="IS">Iceland</option>
<option value="IN">India</option>
<option value="ID">Indonesia</option>
<option value="IR">Iran, Islamic Republic of</option>
<option value="IQ">Iraq</option>
<option value="IE">Ireland</option>
<option value="IM">Isle Of Man</option>
<option value="IL">Israel</option>
<option value="IT">Italy</option>
<option value="JM">Jamaica</option>
<option value="JP">Japan</option>
<option value="JE">Jersey</option>
<option value="JO">Jordan</option>
<option value="KZ">Kazakhstan</option>
<option value="KE">Kenya</option>
<option value="KI">Kiribati</option>
<option value="KP">Korea, Democratic People's Republic of</option>
<option value="KR">Korea, Republic of</option>
<option value="KW">Kuwait</option>
<option value="KG">Kyrgyzstan</option>
<option value="LA">Lao People's Democratic Republic</option>
<option value="LV">Latvia</option>
<option value="LB">Lebanon</option>
<option value="LS">Lesotho</option>
<option value="LR">Liberia</option>
<option value="LY">Libyan Arab Jamahiriya</option>
<option value="LI">Liechtenstein</option>
<option value="LT">Lithuania</option>
<option value="LU">Luxembourg</option>
<option value="MO">Macao</option>
<option value="MK">Macedonia, the Former Yugoslav Republic of</option>
<option value="MG">Madagascar</option>
<option value="MW">Malawi</option>
<option value="MY">Malaysia</option>
<option value="MV">Maldives</option>
<option value="ML">Mali</option>
<option value="MT">Malta</option>
<option value="MH">Marshall Islands</option>
<option value="MQ">Martinique</option>
<option value="MR">Mauritania</option>
<option value="MU">Mauritius</option>
<option value="YT">Mayotte</option>
<option value="MX">Mexico</option>
<option value="FM">Micronesia, Federated States of</option>
<option value="MD">Moldova, Republic of</option>
<option value="MC">Monaco</option>
<option value="MN">Mongolia</option>
<option value="ME">Montenegro</option>
<option value="MS">Montserrat</option>
<option value="MA">Morocco</option>
<option value="MZ">Mozambique</option>
<option value="MM">Myanmar</option>
<option value="NA">Namibia</option>
<option value="NR">Nauru</option>
<option value="NP">Nepal</option>
<option value="NL">Netherlands</option>
<option value="AN">Netherlands Antilles</option>
<option value="NC">New Caledonia</option>
<option value="NZ">New Zealand</option>
<option value="NI">Nicaragua</option>
<option value="NE">Niger</option>
<option value="NG">Nigeria</option>
<option value="NU">Niue</option>
<option value="NF">Norfolk Island</option>
<option value="MP">Northern Mariana Islands</option>
<option value="NO">Norway</option>
<option value="OM">Oman</option>
<option value="PK">Pakistan</option>
<option value="PW">Palau</option>
<option value="PS">Palestinian Territory, Occupied</option>
<option value="PA">Panama</option>
<option value="PG">Papua New Guinea</option>
<option value="PY">Paraguay</option>
<option value="PE">Peru</option>
<option value="PH">Philippines</option>
<option value="PN">Pitcairn</option>
<option value="PL">Poland</option>
<option value="PT">Portugal</option>
<option value="PR">Puerto Rico</option>
<option value="QA">Qatar</option>
<option value="RE">Reunion</option>
<option value="RO">Romania</option>
<option value="RU">Russian Federation</option>
<option value="RW">Rwanda</option>
<option value="BL">Saint Barthélemy</option>
<option value="SH">Saint Helena</option>
<option value="KN">Saint Kitts and Nevis</option>
<option value="LC">Saint Lucia</option>
<option value="MF">Saint Martin (French part)</option>
<option value="PM">Saint Pierre and Miquelon</option>
<option value="VC">Saint Vincent and the Grenadines</option>
<option value="WS">Samoa</option>
<option value="SM">San Marino</option>
<option value="ST">Sao Tome and Principe</option>
<option value="SA">Saudi Arabia</option>
<option value="SN">Senegal</option>
<option value="RS">Serbia</option>
<option value="SC">Seychelles</option>
<option value="SL">Sierra Leone</option>
<option value="SG">Singapore</option>
<option value="SK">Slovakia</option>
<option value="SI">Slovenia</option>
<option value="SB">Solomon Islands</option>
<option value="SO">Somalia</option>
<option value="ZA">South Africa</option>
<option value="GS">South Georgia and the South Sandwich Islands</option>
<option value="ES">Spain</option>
<option value="LK">Sri Lanka</option>
<option value="SD">Sudan</option>
<option value="SR">Suriname</option>
<option value="SJ">Svalbard and Jan Mayen</option>
<option value="SZ">Swaziland</option>
<option value="SE">Sweden</option>
<option value="CH">Switzerland</option>
<option value="SY">Syrian Arab Republic</option>
<option value="TW">Taiwan, Province of China</option>
<option value="TJ">Tajikistan</option>
<option value="TZ">Tanzania, United Republic of</option>
<option value="TH">Thailand</option>
<option value="TL">Timor Leste</option>
<option value="TG">Togo</option>
<option value="TK">Tokelau</option>
<option value="TO">Tonga</option>
<option value="TT">Trinidad and Tobago</option>
<option value="TN">Tunisia</option>
<option value="TR">Turkey</option>
<option value="TM">Turkmenistan</option>
<option value="TC">Turks and Caicos Islands</option>
<option value="TV">Tuvalu</option>
<option value="UG">Uganda</option>
<option value="UA">Ukraine</option>
<option value="AE">United Arab Emirates</option>
<option value="GB">United Kingdom</option>
<option value="US" selected="selected">United States</option>
<option value="UM">United States Minor Outlying Islands</option>
<option value="UY">Uruguay</option>
<option value="UZ">Uzbekistan</option>
<option value="VU">Vanuatu</option>
<option value="VE">Venezuela</option>
<option value="VN">Viet Nam</option>
<option value="VG">Virgin Islands, British</option>
<option value="VI">Virgin Islands, U.S.</option>
<option value="WF">Wallis and Futuna</option>
<option value="EH">Western Sahara</option>
<option value="YE">Yemen</option>
<option value="ZM">Zambia</option>
<option value="ZW">Zimbabwe</option></select></td>
        </tr>
        <tr><td class="section">&nbsp;</td></tr>
        <tr>
          <td></td>
          <td>
            <input class="button" id="subscribe" name="commit" type="submit" value="Subscribe" />
          </td>
        </tr>
      </table>
    </form>
  </div>
</body>
</html>