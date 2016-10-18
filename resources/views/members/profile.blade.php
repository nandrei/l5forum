@extends('default')

@section('content')

    <div class="border">
        <div class="blue_bg">

            <input type="hidden" name="updateprofile" id=""/>
            <h3 class="pagetitle">General Account Settings</h3>
            <div class="profile_settings">

                <fieldset>
                    <div>
                        <label for="photo">Photo</label>
                        <div style="margin: -24px 0 0 175px;">
                            <a data-clicklaunch="" href="" class="btn btn-default">Change my photo</a>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <div>
                        <ul>
                            <li class="custom">
                                <label for="gender">Gender</label>
                                <select style="margin-left: 105px" id="gender" class="input_select" name="gender">
                                    <option value="m" selected="selected">{{ $profile[0]->gender }}</option>
                                    <option value="f">Female</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </fieldset>

                <fieldset>
                    <div>
                        <ul>
                            <li class="custom">
                                <label for="country">Country</label>
                                <select style="margin-left: 105px" id="country" class="input_select" name="country">
                                    <option value="XX" selected="selected">{{ $profile[0]->country }}</option>
                                    <option value="US">United States</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AK">Aitutaki</option>
                                    <option value="AL">Albania</option>
                                    <option value="AY">Alderney</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctic Lands</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AC">Ascension Island</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="FQ">Baker Island</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BS">Bassas da India</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BX">Bophuthatswana</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="BU">British Antarctic Territory</option>
                                    <option value="IO">British Indian Ocean</option>
                                    <option value="VG">British Virgin Islands</option>
                                    <option value="BN">Brunei</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BM">Burma</option>
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
                                    <option value="CE">Ciskei</option>
                                    <option value="IP">Clipperton Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
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
                                    <option value="EU">Europa Island</option>
                                    <option value="FK">Falkland Islands</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Territories</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GZ">Gaza Strip</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GO">Glorioso Islands</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GX">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard and McDonald Islands</option>
                                    <option value="VA">Holy See (Vatican City)</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HQ">Howland Island</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="CI">Ivory Coast</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JN">Jan Mayen</option>
                                    <option value="JP">Japan</option>
                                    <option value="DQ">Jarvis Island</option>
                                    <option value="JY">Jersey</option>
                                    <option value="JE">Johnston Atoll</option>
                                    <option value="JO">Jordan</option>
                                    <option value="JU">Juan de Nova Island</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KQ">Kingman Reef</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KP">Korea, North</option>
                                    <option value="KR">Korea, South</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Laos</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macau</option>
                                    <option value="MK">Macedonia</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="IM">Man, Isle of</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="HM">McDonald Islands</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia</option>
                                    <option value="MQ">Midway Islands</option>
                                    <option value="MD">Moldova</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="BQ">Navassa Island</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="AN">Netherlands Antilles</option>
                                    <option value="NT">Neutral Zone</option>
                                    <option value="NV">Nevis</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand (Aotearoa)</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="MF">North Marfingset</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="LQ">Palmyra Atoll</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PF">Paracel Islands</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn Islands</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RE">Reunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russia</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="SH">Saint Helena</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="PM">Saint Pierre and Miquelon</option>
                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">Sao Tome and Principe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="CS">Serbia and Montenegro</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="GS">South Georgia</option>
                                    <option value="SW">South West Africa</option>
                                    <option value="SX">South Sandwich Islands</option>
                                    <option value="ES">Spain</option>
                                    <option value="PG">Spratly Islands</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard og Jan Mayen</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syria</option>
                                    <option value="TW">Taiwan</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TP">Timor</option>
                                    <option value="BS">The Bahamas</option>
                                    <option value="GM">The Gambia</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TE">Tromelin Island</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UU">U.N. (Geneva)</option>
                                    <option value="UN">U.N. (New York)</option>
                                    <option value="UV">U.N. (Vienna)</option>
                                    <option value="SU">U.S.S.R. (former)</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="UM">US Minor Outlying Islands</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="VI">Virgin Islands</option>
                                    <option value="WQ">Wake Island</option>
                                    <option value="WF">Wallis and Futuna Islands</option>
                                    <option value="WE">West Bank</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="WS">Western Samoa</option>
                                    <option value="YE">Yemen</option>
                                    <option value="YU">Yugoslavia</option>
                                    <option value="ZR">Zaire</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </fieldset>

                <fieldset>
                    <div>
                        <ul>
                            <li class="custom">
                                <label for="mess_filter">Accept Messages</label>
                                <select style="margin-left: 105px" id="mess_filter" class="input_select"
                                        name="mess_filter">
                                    <option value="All" selected="selected">{{ $profile[0]->mess_filter }}</option>
                                    <option value="Friends">Friends only</option>
                                    <option value="Staff">Staff only</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </fieldset>

                <h3>Email &amp; Password</h3>
                <fieldset>
                    <ul>
                        <li class="clearfix">
                            <div>
                                <span>Current email address:</span>
                                <strong style="line-height: 1.8">{{ $profile[0]->email }}</strong>
                            </div>
                        </li>
                        <br>
                        <li>
                            <label for="email_1" style="width: auto">New email address</label>
                            <p>
                                <input type="text" size="30" name="email_1" id="email_1" class="input_text" value=""/>
                            </p>
                        </li>
                        <li class="clearfix">
                            <label for="email_2" style="width: auto">Confirm email address</label>
                            <p>
                                <input type="text" size="30" name="email_2" id="email_2" class="input_text" value=""/>
                            </p>
                        </li>

                        <li class="clearfix">
                            <label for="password" style="width: auto">Current password</label>
                            <p>
                                <input type="password" size="30" id="password" class="input_text" name="password"
                                       value=""/>
                            </p>
                        </li>
                    </ul>
                </fieldset>

                <fieldset>
                    <ul>
                        <li>
                            <label for="current_pass" style="width: auto">Current password</label>
                            <p>
                                <input type="password" name="current_pass" value="" id="current_pass" class="input_text"
                                       size="30"/>
                            </p>
                        </li>

                        <li>
                            <label for="new_pass_1" style="width: auto">New password</label>
                            <p>
                                <input type="password" name="new_pass_1" value="" id="new_pass_1" class="input_text"
                                       size="30"/>
                            </p>
                        </li>
                        <li>
                            <label for="new_pass_2" style="width: auto">Confirm new password</label>
                            <p>
                                <input type="password" name="new_pass_2" value="" id="new_pass_2" class="input_text"
                                       size="30"/>
                            </p>
                        </li>
                    </ul>
                </fieldset>
            </div>

            <fieldset class="submit">
                <input type="submit" class="input_submit" name="submitForm" value="Save Changes"/> or <a href=""
                                                                                                         title="Cancel edit">Cancel</a>
            </fieldset>

        </div>
    </div>

@endsection