@extends('default')

@section('content')

    <div class="border">
        <div class="blue_bg">
            <form name="UpdateProfileForm" enctype="multipart/form-data" method="post"
                  action={{ url('updateprofile') }}>
            <h3 class="pagetitle">General Account Settings</h3>
            <div class="profile_settings">

                <fieldset>
                    <div>
                        <label for="photo">Photo</label>
                        <div style="margin: -24px 0 0 175px;">
                            <input type="file" name="photo">
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <div>
                        <ul>
                            <li class="custom">
                                <label for="gender">Gender</label>
                                <select style="margin-left: 105px" id="gender" class="input_select" name="gender">
                                    <option value="Male" @if ($profile[0]->gender == 'Male') selected="selected" @endif>
                                        Male
                                    </option>
                                    <option value="Female"
                                            @if ($profile[0]->gender == 'Female') selected="selected" @endif>Female
                                    </option>
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
                                    <option value="" @if ($profile[0]->country == '') selected="selected" @endif>None
                                    </option>
                                    <option value="United States"
                                            @if ($profile[0]->country == 'United States') selected="selected" @endif>
                                        United States
                                    </option>
                                    <option value="Afghanistan"
                                            @if ($profile[0]->country == 'Afghanistan') selected="selected" @endif>
                                        Afghanistan
                                    </option>
                                    <option value="Aitutaki"
                                            @if ($profile[0]->country == 'Aitutaki') selected="selected" @endif>Aitutaki
                                    </option>
                                    <option value="Albania"
                                            @if ($profile[0]->country == 'Albania') selected="selected" @endif>Albania
                                    </option>
                                    <option value="Alderney<"
                                            @if ($profile[0]->country == 'Alderney<') selected="selected" @endif>
                                        Alderney
                                    </option>
                                    <option value="Algeria"
                                            @if ($profile[0]->country == 'Algeria') selected="selected" @endif>Algeria
                                    </option>
                                    <option value="American Samoa"
                                            @if ($profile[0]->country == 'American Samoa') selected="selected" @endif>
                                        American Samoa
                                    </option>
                                    <option value="Andorra"
                                            @if ($profile[0]->country == 'Andorra') selected="selected" @endif>Andorra
                                    </option>
                                    <option value="Angola"
                                            @if ($profile[0]->country == 'Angola') selected="selected" @endif>Angola
                                    </option>
                                    <option value="Anguilla"
                                            @if ($profile[0]->country == 'Anguilla') selected="selected" @endif>Anguilla
                                    </option>
                                    <option value="Antarctic Lands"
                                            @if ($profile[0]->country == 'Antarctic Lands') selected="selected" @endif>
                                        Antarctic Lands
                                    </option>
                                    <option value="Antarctica"
                                            @if ($profile[0]->country == 'Antarctica') selected="selected" @endif>
                                        Antarctica
                                    </option>
                                    <option value="Antigua and Barbuda"
                                            @if ($profile[0]->country == 'Antigua and Barbuda') selected="selected" @endif>
                                        Antigua and Barbuda
                                    </option>
                                    <option value="Argentina"
                                            @if ($profile[0]->country == 'Argentina') selected="selected" @endif>
                                        Argentina
                                    </option>
                                    <option value="Armenia"
                                            @if ($profile[0]->country == 'Armenia') selected="selected" @endif>Armenia
                                    </option>
                                    <option value="Aruba"
                                            @if ($profile[0]->country == 'Aruba') selected="selected" @endif>Aruba
                                    </option>
                                    <option value="Ascension Island"
                                            @if ($profile[0]->country == 'Ascension Island') selected="selected" @endif>
                                        Ascension Island
                                    </option>
                                    <option value="Australia"
                                            @if ($profile[0]->country == 'Australia') selected="selected" @endif>
                                        Australia
                                    </option>
                                    <option value="Austria"
                                            @if ($profile[0]->country == 'Austria') selected="selected" @endif>Austria
                                    </option>
                                    <option value="Azerbaijan"
                                            @if ($profile[0]->country == 'Azerbaijan') selected="selected" @endif>
                                        Azerbaijan
                                    </option>
                                    <option value="Bahrain"
                                            @if ($profile[0]->country == 'Bahrain') selected="selected" @endif>Bahrain
                                    </option>
                                    <option value="Baker Island"
                                            @if ($profile[0]->country == 'Baker Island') selected="selected" @endif>
                                        Baker Island
                                    </option>
                                    <option value="Bangladesh"
                                            @if ($profile[0]->country == 'Bangladesh') selected="selected" @endif>
                                        Bangladesh
                                    </option>
                                    <option value="Barbados"
                                            @if ($profile[0]->country == 'Barbados') selected="selected" @endif>Barbados
                                    </option>
                                    <option value="Bassas da India"
                                            @if ($profile[0]->country == 'Bassas da India') selected="selected" @endif>
                                        Bassas da India
                                    </option>
                                    <option value="Belarus"
                                            @if ($profile[0]->country == 'Belarus') selected="selected" @endif>Belarus
                                    </option>
                                    <option value="Belgium"
                                            @if ($profile[0]->country == 'Belgium') selected="selected" @endif>Belgium
                                    </option>
                                    <option value="Belize"
                                            @if ($profile[0]->country == 'Belize') selected="selected" @endif>Belize
                                    </option>
                                    <option value="Benin"
                                            @if ($profile[0]->country == 'Benin') selected="selected" @endif>Benin
                                    </option>
                                    <option value="Bermuda"
                                            @if ($profile[0]->country == 'Bermuda') selected="selected" @endif>Bermuda
                                    </option>
                                    <option value="Bhutan"
                                            @if ($profile[0]->country == 'Bhutan') selected="selected" @endif>Bhutan
                                    </option>
                                    <option value="Bolivia"
                                            @if ($profile[0]->country == 'Bolivia') selected="selected" @endif>Bolivia
                                    </option>
                                    <option value="Bophuthatswana"
                                            @if ($profile[0]->country == 'Bophuthatswana') selected="selected" @endif>
                                        Bophuthatswana
                                    </option>
                                    <option value="Bosnia and Herzegovina"
                                            @if ($profile[0]->country == 'Bosnia and Herzegovina') selected="selected" @endif></option>
                                    <option value="Botswana"
                                            @if ($profile[0]->country == 'Botswana') selected="selected" @endif>Botswana
                                    </option>
                                    <option value="Bouvet Island"
                                            @if ($profile[0]->country == 'Bouvet Island') selected="selected" @endif>
                                        Bouvet Island
                                    </option>
                                    <option value="Brazil"
                                            @if ($profile[0]->country == 'Brazil') selected="selected" @endif>Brazil
                                    </option>
                                    <option value="British Antarctic Territory"
                                            @if ($profile[0]->country == 'British Antarctic Territory') selected="selected" @endif>
                                        British Antarctic Territory
                                    </option>
                                    <option value="British Indian Ocean"
                                            @if ($profile[0]->country == 'British Indian Ocean') selected="selected" @endif>
                                        British Indian Ocean
                                    </option>
                                    <option value="British Virgin Islands"
                                            @if ($profile[0]->country == 'British Virgin Islands') selected="selected" @endif>
                                        British Virgin Islands
                                    </option>
                                    <option value="Brunei"
                                            @if ($profile[0]->country == 'Brunei') selected="selected" @endif>Brunei
                                    </option>
                                    <option value="Bulgaria"
                                            @if ($profile[0]->country == 'Bulgaria') selected="selected" @endif>Bulgaria
                                    </option>
                                    <option value="Burkina Faso"
                                            @if ($profile[0]->country == 'Burkina Faso') selected="selected" @endif>
                                        Burkina Faso
                                    </option>
                                    <option value="Burma"
                                            @if ($profile[0]->country == 'Burma') selected="selected" @endif>Burma
                                    </option>
                                    <option value="Burundi"
                                            @if ($profile[0]->country == 'Burundi') selected="selected" @endif>Burundi
                                    </option>
                                    <option value="Cambodia"
                                            @if ($profile[0]->country == 'Cambodia') selected="selected" @endif>Cambodia
                                    </option>
                                    <option value="Cameroon"
                                            @if ($profile[0]->country == 'Cameroon') selected="selected" @endif>Cameroon
                                    </option>
                                    <option value="Canada"
                                            @if ($profile[0]->country == 'Canada') selected="selected" @endif>Canada
                                    </option>
                                    <option value="Cape Verde"
                                            @if ($profile[0]->country == 'Cape Verde') selected="selected" @endif>Cape
                                        Verde
                                    </option>
                                    <option value="Cayman Islands"
                                            @if ($profile[0]->country == 'Cayman Islands') selected="selected" @endif>
                                        Cayman Islands
                                    </option>
                                    <option value="Central African Republic"
                                            @if ($profile[0]->country == 'Central African Republic') selected="selected" @endif>
                                        Central African Republic
                                    </option>
                                    <option value="Chad"
                                            @if ($profile[0]->country == 'Chad') selected="selected" @endif>Chad
                                    </option>
                                    <option value="Chile"
                                            @if ($profile[0]->country == 'Chile') selected="selected" @endif>Chile
                                    </option>
                                    <option value="China"
                                            @if ($profile[0]->country == 'China') selected="selected" @endif>China
                                    </option>
                                    <option value="Christmas Island"
                                            @if ($profile[0]->country == 'Christmas Island') selected="selected" @endif>
                                        Christmas Island
                                    </option>
                                    <option value="Ciskei"
                                            @if ($profile[0]->country == 'Ciskei') selected="selected" @endif>Ciskei
                                    </option>
                                    <option value="Clipperton Island"
                                            @if ($profile[0]->country == 'Clipperton Island') selected="selected" @endif>
                                        Clipperton Island
                                    </option>
                                    <option value="Cocos (Keeling) Islands"
                                            @if ($profile[0]->country == 'Cocos (Keeling) Islands') selected="selected" @endif>
                                        Cocos (Keeling) Islands
                                    </option>
                                    <option value="Colombia"
                                            @if ($profile[0]->country == 'Colombia') selected="selected" @endif>Colombia
                                    </option>
                                    <option value="Comoros"
                                            @if ($profile[0]->country == 'Comoros') selected="selected" @endif>Comoros
                                    </option>
                                    <option value="Congo"
                                            @if ($profile[0]->country == 'Congo') selected="selected" @endif>Congo
                                    </option>
                                    <option value="Cook Islands"
                                            @if ($profile[0]->country == 'Cook Islands') selected="selected" @endif>Cook
                                        Islands
                                    </option>
                                    <option value="Costa Rica"
                                            @if ($profile[0]->country == 'Costa Rica') selected="selected" @endif>Costa
                                        Rica
                                    </option>
                                    <option value="Croatia"
                                            @if ($profile[0]->country == 'Croatia') selected="selected" @endif>Croatia
                                    </option>
                                    <option value="Cuba"
                                            @if ($profile[0]->country == 'Cuba') selected="selected" @endif>Cuba
                                    </option>
                                    <option value="Cyprus"
                                            @if ($profile[0]->country == 'Cyprus') selected="selected" @endif>Cyprus
                                    </option>
                                    <option value="Czech Republic"
                                            @if ($profile[0]->country == 'Czech Republic') selected="selected" @endif>
                                        Czech Republic
                                    </option>
                                    <option value="Denmark"
                                            @if ($profile[0]->country == 'Denmark') selected="selected" @endif>Denmark
                                    </option>
                                    <option value="Djibouti"
                                            @if ($profile[0]->country == 'Djibouti') selected="selected" @endif>Djibouti
                                    </option>
                                    <option value="Dominica"
                                            @if ($profile[0]->country == 'Dominica') selected="selected" @endif>Dominica
                                    </option>
                                    <option value="Dominican Republic"
                                            @if ($profile[0]->country == 'Dominican Republic') selected="selected" @endif>
                                        Dominican Republic
                                    </option>
                                    <option value="Ecuador"
                                            @if ($profile[0]->country == 'Ecuador') selected="selected" @endif>Ecuador
                                    </option>
                                    <option value="Egypt"
                                            @if ($profile[0]->country == 'Egypt') selected="selected" @endif>Egypt
                                    </option>
                                    <option value="El Salvador"
                                            @if ($profile[0]->country == 'El Salvador') selected="selected" @endif>El
                                        Salvador
                                    </option>
                                    <option value="Equatorial Guinea"
                                            @if ($profile[0]->country == 'Equatorial Guinea') selected="selected" @endif>
                                        Equatorial Guinea
                                    </option>
                                    <option value="Eritrea"
                                            @if ($profile[0]->country == 'Eritrea') selected="selected" @endif>Eritrea
                                    </option>
                                    <option value="Estonia"
                                            @if ($profile[0]->country == 'Estonia') selected="selected" @endif>Estonia
                                    </option>
                                    <option value="Ethiopia"
                                            @if ($profile[0]->country == 'Ethiopia') selected="selected" @endif>Ethiopia
                                    </option>
                                    <option value="Europa Island"
                                            @if ($profile[0]->country == 'Europa Island') selected="selected" @endif>
                                        Europa Island
                                    </option>
                                    <option value="Falkland Islands"
                                            @if ($profile[0]->country == 'Falkland Islands') selected="selected" @endif>
                                        Falkland Islands
                                    </option>
                                    <option value="Faroe Islands"
                                            @if ($profile[0]->country == 'Faroe Islands') selected="selected" @endif>
                                        Faroe Islands
                                    </option>
                                    <option value="Fiji"
                                            @if ($profile[0]->country == 'Fiji') selected="selected" @endif>Fiji
                                    </option>
                                    <option value="Finland"
                                            @if ($profile[0]->country == 'Finland') selected="selected" @endif>Finland
                                    </option>
                                    <option value="France"
                                            @if ($profile[0]->country == 'France') selected="selected" @endif>France
                                    </option>
                                    <option value="French Guiana"
                                            @if ($profile[0]->country == 'French Guiana') selected="selected" @endif>
                                        French Guiana
                                    </option>
                                    <option value="French Polynesia"
                                            @if ($profile[0]->country == 'French Polynesia') selected="selected" @endif>
                                        French Polynesia
                                    </option>
                                    <option value="Gabon"
                                            @if ($profile[0]->country == 'Gabon') selected="selected" @endif>Gabon
                                    </option>
                                    <option value="Gambia"
                                            @if ($profile[0]->country == 'Gambia') selected="selected" @endif>Gambia
                                    </option>
                                    <option value="Gaza Strip"
                                            @if ($profile[0]->country == 'Gaza Strip') selected="selected" @endif>Gaza
                                        Strip
                                    </option>
                                    <option value="Gaza Strip"
                                            @if ($profile[0]->country == 'Gaza Strip') selected="selected" @endif>
                                        Georgia
                                    </option>
                                    <option value="Germany"
                                            @if ($profile[0]->country == 'Germany') selected="selected" @endif>Germany
                                    </option>
                                    <option value="Ghana"
                                            @if ($profile[0]->country == 'Ghana') selected="selected" @endif>Ghana
                                    </option>
                                    <option value="Gibraltar"
                                            @if ($profile[0]->country == 'Gibraltar') selected="selected" @endif>
                                        Gibraltar
                                    </option>
                                    <option value="Glorioso Islands"
                                            @if ($profile[0]->country == 'Glorioso Islands') selected="selected" @endif>
                                        Glorioso Islands
                                    </option>
                                    <option value="Greece"
                                            @if ($profile[0]->country == 'Greece') selected="selected" @endif>Greece
                                    </option>
                                    <option value="Greenland"
                                            @if ($profile[0]->country == 'Greenland') selected="selected" @endif>
                                        Greenland
                                    </option>
                                    <option value="Grenada"
                                            @if ($profile[0]->country == 'Grenada') selected="selected" @endif>Grenada
                                    </option>
                                    <option value="Guadeloupe"
                                            @if ($profile[0]->country == 'Guadeloupe') selected="selected" @endif>
                                        Guadeloupe
                                    </option>
                                    <option value="Guam"
                                            @if ($profile[0]->country == 'Guam') selected="selected" @endif>Guam
                                    </option>
                                    <option value="Guatemala"
                                            @if ($profile[0]->country == 'Guatemala') selected="selected" @endif>
                                        Guatemala
                                    </option>
                                    <option value="Guernsey"
                                            @if ($profile[0]->country == 'Guernsey') selected="selected" @endif>Guernsey
                                    </option>
                                    <option value="Guinea"
                                            @if ($profile[0]->country == 'Guinea') selected="selected" @endif>Guinea
                                    </option>
                                    <option value="Guinea-Bissau"
                                            @if ($profile[0]->country == 'Guinea-Bissau') selected="selected" @endif>
                                        Guinea-Bissau
                                    </option>
                                    <option value="Guyana"
                                            @if ($profile[0]->country == 'Guyana') selected="selected" @endif>Guyana
                                    </option>
                                    <option value="Haiti"
                                            @if ($profile[0]->country == 'Haiti') selected="selected" @endif>Haiti
                                    </option>
                                    <option value="Heard"
                                            @if ($profile[0]->country == 'Heard') selected="selected" @endif>Heard
                                    </option>
                                    <option value="Holy See (Vatican City)"
                                            @if ($profile[0]->country == 'Holy See (Vatican City)') selected="selected" @endif>
                                        Holy See (Vatican City)
                                    </option>
                                    <option value="Honduras"
                                            @if ($profile[0]->country == 'Honduras') selected="selected" @endif>Honduras
                                    </option>
                                    <option value="Hong Kong"
                                            @if ($profile[0]->country == 'Hong Kong') selected="selected" @endif>Hong
                                        Kong
                                    </option>
                                    <option value="Howland Island"
                                            @if ($profile[0]->country == 'Howland Island') selected="selected" @endif>
                                        Howland Island
                                    </option>
                                    <option value="Hungary"
                                            @if ($profile[0]->country == 'Hungary') selected="selected" @endif>Hungary
                                    </option>
                                    <option value="Iceland"
                                            @if ($profile[0]->country == 'Iceland') selected="selected" @endif>Iceland
                                    </option>
                                    <option value="India"
                                            @if ($profile[0]->country == 'India') selected="selected" @endif>India
                                    </option>
                                    <option value="Indonesia"
                                            @if ($profile[0]->country == 'Indonesia') selected="selected" @endif>
                                        Indonesia
                                    </option>
                                    <option value="Iran"
                                            @if ($profile[0]->country == 'Iran') selected="selected" @endif>Iran
                                    </option>
                                    <option value="Iraq"
                                            @if ($profile[0]->country == 'Iraq') selected="selected" @endif>Iraq
                                    </option>
                                    <option value="Ireland"
                                            @if ($profile[0]->country == 'Ireland') selected="selected" @endif>Ireland
                                    </option>
                                    <option value="Isle of Man"
                                            @if ($profile[0]->country == 'Isle of Man') selected="selected" @endif>Isle
                                        of Man
                                    </option>
                                    <option value="Israel"
                                            @if ($profile[0]->country == 'Israel') selected="selected" @endif>Israel
                                    </option>
                                    <option value="Italy"
                                            @if ($profile[0]->country == 'Italy') selected="selected" @endif>Italy
                                    </option>
                                    <option value="Ivory Coast"
                                            @if ($profile[0]->country == 'Ivory Coast') selected="selected" @endif>Ivory
                                        Coast
                                    </option>
                                    <option value="Jamaica"
                                            @if ($profile[0]->country == 'Jamaica') selected="selected" @endif>Jamaica
                                    </option>
                                    <option value="Jan Mayen"
                                            @if ($profile[0]->country == 'Jan Mayen') selected="selected" @endif>Jan
                                        Mayen
                                    </option>
                                    <option value="Japan"
                                            @if ($profile[0]->country == 'Japan') selected="selected" @endif>Japan
                                    </option>
                                    <option value="Jarvis Island"
                                            @if ($profile[0]->country == 'Jarvis Island') selected="selected" @endif>
                                        Jarvis Island
                                    </option>
                                    <option value="Jersey"
                                            @if ($profile[0]->country == 'Jersey') selected="selected" @endif>Jersey
                                    </option>
                                    <option value="Johnston Atoll"
                                            @if ($profile[0]->country == 'Johnston Atoll') selected="selected" @endif>
                                        Johnston Atoll
                                    </option>
                                    <option value="Jordan"
                                            @if ($profile[0]->country == 'Jordan') selected="selected" @endif>Jordan
                                    </option>
                                    <option value="Juan de Nova Island"
                                            @if ($profile[0]->country == 'Juan de Nova Island') selected="selected" @endif>
                                        Juan de Nova Island
                                    </option>
                                    <option value="Kazakhstan"
                                            @if ($profile[0]->country == 'Kazakhstan') selected="selected" @endif>
                                        Kazakhstan
                                    </option>
                                    <option value="Kenya"
                                            @if ($profile[0]->country == 'Kenya') selected="selected" @endif>Kenya
                                    </option>
                                    <option value="Kingman Reef"
                                            @if ($profile[0]->country == 'Kingman Reef') selected="selected" @endif>
                                        Kingman Reef
                                    </option>
                                    <option value="Kiribati"
                                            @if ($profile[0]->country == 'Kiribati') selected="selected" @endif>Kiribati
                                    </option>
                                    <option value="Korea,North"
                                            @if ($profile[0]->country == 'Korea,North') selected="selected" @endif>
                                        Korea,North
                                    </option>
                                    <option value="Korea,South"
                                            @if ($profile[0]->country == 'Korea,South') selected="selected" @endif>
                                        Korea,South
                                    </option>
                                    <option value="Kuwait"
                                            @if ($profile[0]->country == 'Kuwait') selected="selected" @endif>Kuwait
                                    </option>
                                    <option value="Kyrgyzstan"
                                            @if ($profile[0]->country == 'Kyrgyzstan') selected="selected" @endif>
                                        Kyrgyzstan
                                    </option>
                                    <option value="Laos"
                                            @if ($profile[0]->country == 'Laos') selected="selected" @endif>Laos
                                    </option>
                                    <option value="Latvia"
                                            @if ($profile[0]->country == 'Latvia') selected="selected" @endif>Latvia
                                    </option>
                                    <option value="Lebanon"
                                            @if ($profile[0]->country == 'Lebanon') selected="selected" @endif>Lebanon
                                    </option>
                                    <option value="Lesotho"
                                            @if ($profile[0]->country == 'Lesotho') selected="selected" @endif>Lesotho
                                    </option>
                                    <option value="Liberia"
                                            @if ($profile[0]->country == 'Liberia') selected="selected" @endif>Liberia
                                    </option>
                                    <option value="Libya"
                                            @if ($profile[0]->country == 'Libya') selected="selected" @endif>Libya
                                    </option>
                                    <option value="Liechtenstein"
                                            @if ($profile[0]->country == 'Liechtenstein') selected="selected" @endif>
                                        Liechtenstein
                                    </option>
                                    <option value="Lithuania"
                                            @if ($profile[0]->country == 'Lithuania') selected="selected" @endif>
                                        Lithuania
                                    </option>
                                    <option value="Luxembourg"
                                            @if ($profile[0]->country == 'Luxembourg') selected="selected" @endif>
                                        Luxembourg
                                    </option>
                                    <option value="Macau"
                                            @if ($profile[0]->country == 'Macau') selected="selected" @endif>Macau
                                    </option>
                                    <option value="Macedonia"
                                            @if ($profile[0]->country == 'Macedonia') selected="selected" @endif>
                                        Macedonia
                                    </option>
                                    <option value="Madagascar"
                                            @if ($profile[0]->country == 'Madagascar') selected="selected" @endif>
                                        Madagascar
                                    </option>
                                    <option value="Malawi"
                                            @if ($profile[0]->country == 'Malawi') selected="selected" @endif>Malawi
                                    </option>
                                    <option value="Malaysia"
                                            @if ($profile[0]->country == 'Malaysia') selected="selected" @endif>Malaysia
                                    </option>
                                    <option value="Maldives"
                                            @if ($profile[0]->country == 'Maldives') selected="selected" @endif>Maldives
                                    </option>
                                    <option value="Mali"
                                            @if ($profile[0]->country == 'Mali') selected="selected" @endif>Mali
                                    </option>
                                    <option value="Malta"
                                            @if ($profile[0]->country == 'Malta') selected="selected" @endif>Malta
                                    </option>
                                    <option value="Man, Isle of"
                                            @if ($profile[0]->country == 'Man, Isle of') selected="selected" @endif>Man,
                                        Isle of
                                    </option>
                                    <option value="Marshall Islands"
                                            @if ($profile[0]->country == 'Marshall Islands') selected="selected" @endif>
                                        Marshall Islands
                                    </option>
                                    <option value="Martinique"
                                            @if ($profile[0]->country == 'Martinique') selected="selected" @endif>
                                        Martinique
                                    </option>
                                    <option value="Mauritania"
                                            @if ($profile[0]->country == 'Mauritania') selected="selected" @endif>
                                        Mauritania
                                    </option>
                                    <option value="Mauritius"
                                            @if ($profile[0]->country == 'Mauritius') selected="selected" @endif>
                                        Mauritius
                                    </option>
                                    <option value="Mayotte"
                                            @if ($profile[0]->country == 'Mayotte') selected="selected" @endif>Mayotte
                                    </option>
                                    <option value="McDonald Islands"
                                            @if ($profile[0]->country == 'McDonald Islands') selected="selected" @endif>
                                        McDonald Islands
                                    </option>
                                    <option value="Mexico"
                                            @if ($profile[0]->country == 'Mexico') selected="selected" @endif>Mexico
                                    </option>
                                    <option value="Micronesia"
                                            @if ($profile[0]->country == 'Micronesia') selected="selected" @endif>
                                        Micronesia
                                    </option>
                                    <option value="Midway Islands"
                                            @if ($profile[0]->country == 'Midway Islands') selected="selected" @endif>
                                        Midway Islands
                                    </option>
                                    <option value="Moldova"
                                            @if ($profile[0]->country == 'Moldova') selected="selected" @endif>Moldova
                                    </option>
                                    <option value="Monaco"
                                            @if ($profile[0]->country == 'Monaco') selected="selected" @endif>Monaco
                                    </option>
                                    <option value="Mongolia"
                                            @if ($profile[0]->country == 'Mongolia') selected="selected" @endif>Mongolia
                                    </option>
                                    <option value="Montserrat"
                                            @if ($profile[0]->country == 'Montserrat') selected="selected" @endif>
                                        Montserrat
                                    </option>
                                    <option value="Morocco"
                                            @if ($profile[0]->country == 'Morocco') selected="selected" @endif>Morocco
                                    </option>
                                    <option value="Mozambique"
                                            @if ($profile[0]->country == 'Mozambique') selected="selected" @endif>
                                        Mozambique
                                    </option>
                                    <option value="Myanmar"
                                            @if ($profile[0]->country == 'Myanmar') selected="selected" @endif>Myanmar
                                    </option>
                                    <option value="Namibia"
                                            @if ($profile[0]->country == 'Namibia') selected="selected" @endif>Namibia
                                    </option>
                                    <option value="Nauru"
                                            @if ($profile[0]->country == 'Nauru') selected="selected" @endif>Nauru
                                    </option>
                                    <option value="Navassa Island"
                                            @if ($profile[0]->country == 'Navassa Island') selected="selected" @endif>
                                        Navassa Island
                                    </option>
                                    <option value="Nepal"
                                            @if ($profile[0]->country == 'Nepal') selected="selected" @endif>Nepal
                                    </option>
                                    <option value="Netherlands"
                                            @if ($profile[0]->country == 'Netherlands') selected="selected" @endif>
                                        Netherlands
                                    </option>
                                    <option value="Netherlands Antilles"
                                            @if ($profile[0]->country == 'Netherlands Antilles') selected="selected" @endif>
                                        Netherlands Antilles
                                    </option>
                                    <option value="Neutral Zone"
                                            @if ($profile[0]->country == 'Neutral Zone') selected="selected" @endif>
                                        Neutral Zone
                                    </option>
                                    <option value="Nevis"
                                            @if ($profile[0]->country == 'Nevis') selected="selected" @endif>Nevis
                                    </option>
                                    <option value="New Caledonia"
                                            @if ($profile[0]->country == 'New Caledonia') selected="selected" @endif>New
                                        Caledonia
                                    </option>
                                    <option value="New Zealand"
                                            @if ($profile[0]->country == 'New Zealand') selected="selected" @endif>New
                                        Zealand
                                    </option>
                                    <option value="Nicaragua"
                                            @if ($profile[0]->country == 'Nicaragua') selected="selected" @endif>
                                        Nicaragua
                                    </option>
                                    <option value="Niger"
                                            @if ($profile[0]->country == 'Niger') selected="selected" @endif>Niger
                                    </option>
                                    <option value="Nigeria"
                                            @if ($profile[0]->country == 'Nigeria') selected="selected" @endif>Nigeria
                                    </option>
                                    <option value="Niue"
                                            @if ($profile[0]->country == 'Niue') selected="selected" @endif>Niue
                                    </option>
                                    <option value="Norfolk Island"
                                            @if ($profile[0]->country == 'Norfolk Island') selected="selected" @endif>
                                        Norfolk Island
                                    </option>
                                    <option value="Northern Mariana Islands"
                                            @if ($profile[0]->country == 'Northern Mariana Islands') selected="selected" @endif>
                                        Northern Mariana Islands
                                    </option>
                                    <option value="North Marfingset"
                                            @if ($profile[0]->country == 'North Marfingset') selected="selected" @endif>
                                        North Marfingset
                                    </option>
                                    <option value="Norway"
                                            @if ($profile[0]->country == 'Norway') selected="selected" @endif>Norway
                                    </option>
                                    <option value="Oman"
                                            @if ($profile[0]->country == 'Oman') selected="selected" @endif>Oman
                                    </option>
                                    <option value="Pakistan"
                                            @if ($profile[0]->country == 'Pakistan') selected="selected" @endif>Pakistan
                                    </option>
                                    <option value="Palau"
                                            @if ($profile[0]->country == 'Palau') selected="selected" @endif>Palau
                                    </option>
                                    <option value="Palmyra Atoll"
                                            @if ($profile[0]->country == 'Palmyra Atoll') selected="selected" @endif>
                                        Palmyra Atoll
                                    </option>
                                    <option value="Panama"
                                            @if ($profile[0]->country == 'Panama') selected="selected" @endif>Panama
                                    </option>
                                    <option value="Papua New Guinea"
                                            @if ($profile[0]->country == 'Papua New Guinea') selected="selected" @endif>
                                        Papua New Guinea
                                    </option>
                                    <option value="Paracel Islands"
                                            @if ($profile[0]->country == 'Paracel Islands') selected="selected" @endif>
                                        Paracel Islands
                                    </option>
                                    <option value="Paraguay"
                                            @if ($profile[0]->country == 'Paraguay') selected="selected" @endif>Paraguay
                                    </option>
                                    <option value="Peru"
                                            @if ($profile[0]->country == 'Peru') selected="selected" @endif>Peru
                                    </option>
                                    <option value="Philippines"
                                            @if ($profile[0]->country == 'Philippines') selected="selected" @endif>
                                        Philippines
                                    </option>
                                    <option value="Pitcairn Islands"
                                            @if ($profile[0]->country == 'Pitcairn Islands') selected="selected" @endif>
                                        Pitcairn Islands
                                    </option>
                                    <option value="Poland"
                                            @if ($profile[0]->country == 'Poland') selected="selected" @endif>Poland
                                    </option>
                                    <option value="Portugal"
                                            @if ($profile[0]->country == 'Portugal') selected="selected" @endif>Portugal
                                    </option>
                                    <option value="Puerto Rico"
                                            @if ($profile[0]->country == 'Puerto Rico') selected="selected" @endif>
                                        Puerto Rico
                                    </option>
                                    <option value="Qatar"
                                            @if ($profile[0]->country == 'Qatar') selected="selected" @endif>Qatar
                                    </option>
                                    <option value="Reunion"
                                            @if ($profile[0]->country == 'Reunion') selected="selected" @endif>Reunion
                                    </option>
                                    <option value="Romania"
                                            @if ($profile[0]->country == 'Romania') selected="selected" @endif>Romania
                                    </option>
                                    <option value="Russia"
                                            @if ($profile[0]->country == 'Russia') selected="selected" @endif>Russia
                                    </option>
                                    <option value="Rwanda"
                                            @if ($profile[0]->country == 'Rwanda') selected="selected" @endif>Rwanda
                                    </option>
                                    <option value="Saint Helena"
                                            @if ($profile[0]->country == 'Saint Helena') selected="selected" @endif>
                                        Saint Helena
                                    </option>
                                    <option value="Saint Kitts and Nevis"
                                            @if ($profile[0]->country == 'Saint Kitts and Nevis') selected="selected" @endif>
                                        Saint Kitts and Nevis
                                    </option>
                                    <option value="Saint Lucia"
                                            @if ($profile[0]->country == 'Saint Lucia') selected="selected" @endif>Saint
                                        Lucia
                                    </option>
                                    <option value="Saint Pierre and Miquelon"
                                            @if ($profile[0]->country == 'Saint Pierre and Miquelon') selected="selected" @endif>
                                        Saint Pierre and Miquelon
                                    </option>
                                    <option value="Saint Vincent and the Grenadines"
                                            @if ($profile[0]->country == 'Saint Vincent and the Grenadines') selected="selected" @endif>
                                        Saint Vincent and the Grenadines
                                    </option>
                                    <option value="Samoa"
                                            @if ($profile[0]->country == 'Samoa') selected="selected" @endif>Samoa
                                    </option>
                                    <option value="San Marino"
                                            @if ($profile[0]->country == 'San Marino') selected="selected" @endif>San
                                        Marino
                                    </option>
                                    <option value="Sao Tome and Principe"
                                            @if ($profile[0]->country == 'Sao Tome and Principe') selected="selected" @endif>
                                        Sao Tome and Principe
                                    </option>
                                    <option value="Saudi Arabia"
                                            @if ($profile[0]->country == 'Saudi Arabia') selected="selected" @endif>
                                        Saudi Arabia
                                    </option>
                                    <option value="Senegal"
                                            @if ($profile[0]->country == 'Senegal') selected="selected" @endif>Senegal
                                    </option>
                                    <option value="Serbia and Montenegro"
                                            @if ($profile[0]->country == 'Serbia and Montenegro') selected="selected" @endif>
                                        Serbia and Montenegro
                                    </option>
                                    <option value="Seychelles"
                                            @if ($profile[0]->country == 'Seychelles') selected="selected" @endif>
                                        Seychelles
                                    </option>
                                    <option value="Sierra Leone"
                                            @if ($profile[0]->country == 'Sierra Leone') selected="selected" @endif>
                                        Sierra Leone
                                    </option>
                                    <option value="Singapore"
                                            @if ($profile[0]->country == 'Singapore') selected="selected" @endif>
                                        Singapore
                                    </option>
                                    <option value="Slovakia"
                                            @if ($profile[0]->country == 'Slovakia') selected="selected" @endif>Slovakia
                                    </option>
                                    <option value="Slovenia"
                                            @if ($profile[0]->country == 'Slovenia') selected="selected" @endif>Slovenia
                                    </option>
                                    <option value="Solomon Islands"
                                            @if ($profile[0]->country == 'Solomon Islands') selected="selected" @endif>
                                        Solomon Islands
                                    </option>
                                    <option value="Somalia"
                                            @if ($profile[0]->country == 'Somalia') selected="selected" @endif>Somalia
                                    </option>
                                    <option value="South Africa"
                                            @if ($profile[0]->country == 'South Africa') selected="selected" @endif>
                                        South Africa
                                    </option>
                                    <option value="South Georgia"
                                            @if ($profile[0]->country == 'South Georgia') selected="selected" @endif>
                                        South Georgia
                                    </option>
                                    <option value="South West Africa"
                                            @if ($profile[0]->country == 'South West Africa') selected="selected" @endif>
                                        South West Africa
                                    </option>
                                    <option value="South Sandwich Islands"
                                            @if ($profile[0]->country == 'South Sandwich Islands') selected="selected" @endif>
                                        South Sandwich Islands
                                    </option>
                                    <option value="Spain"
                                            @if ($profile[0]->country == 'Spain') selected="selected" @endif>Spain
                                    </option>
                                    <option value="Spratly Islands"
                                            @if ($profile[0]->country == 'Spratly Islands') selected="selected" @endif>
                                        Spratly Islands
                                    </option>
                                    <option value="Sri Lanka"
                                            @if ($profile[0]->country == 'Sri Lanka') selected="selected" @endif>Sri
                                        Lanka
                                    </option>
                                    <option value="Sudan"
                                            @if ($profile[0]->country == 'Sudan') selected="selected" @endif>Sudan
                                    </option>
                                    <option value="Suriname"
                                            @if ($profile[0]->country == 'Suriname') selected="selected" @endif>Suriname
                                    </option>
                                    <option value="Svalbard og Jan Mayen"
                                            @if ($profile[0]->country == 'Svalbard og Jan Mayen') selected="selected" @endif>
                                        Svalbard og Jan Mayen
                                    </option>
                                    <option value="Swaziland"
                                            @if ($profile[0]->country == 'Swaziland') selected="selected" @endif>
                                        Swaziland
                                    </option>
                                    <option value="Sweden"
                                            @if ($profile[0]->country == 'Sweden') selected="selected" @endif>Sweden
                                    </option>
                                    <option value="Switzerland"
                                            @if ($profile[0]->country == 'Switzerland') selected="selected" @endif>
                                        Switzerland
                                    </option>
                                    <option value="Syria"
                                            @if ($profile[0]->country == 'Syria') selected="selected" @endif>Syria
                                    </option>
                                    <option value="Taiwan"
                                            @if ($profile[0]->country == 'Taiwan') selected="selected" @endif>Taiwan
                                    </option>
                                    <option value="Tajikistan"
                                            @if ($profile[0]->country == 'Tajikistan') selected="selected" @endif>
                                        Tajikistan
                                    </option>
                                    <option value="Tanzania"
                                            @if ($profile[0]->country == 'Tanzania') selected="selected" @endif>Tanzania
                                    </option>
                                    <option value="Thailand"
                                            @if ($profile[0]->country == 'Thailand') selected="selected" @endif>Thailand
                                    </option>
                                    <option value="Timor"
                                            @if ($profile[0]->country == 'Timor') selected="selected" @endif>Timor
                                    </option>
                                    <option value="The Bahamas"
                                            @if ($profile[0]->country == 'The Bahamas') selected="selected" @endif>The
                                        Bahamas
                                    </option>
                                    <option value="The Gambia"
                                            @if ($profile[0]->country == 'The Gambia') selected="selected" @endif>The
                                        Gambia
                                    </option>
                                    <option value="Togo"
                                            @if ($profile[0]->country == 'Togo') selected="selected" @endif>Togo
                                    </option>
                                    <option value="Tokelau"
                                            @if ($profile[0]->country == 'Tokelau') selected="selected" @endif>Tokelau
                                    </option>
                                    <option value="Tonga"
                                            @if ($profile[0]->country == 'Tonga') selected="selected" @endif>Tonga
                                    </option>
                                    <option value="Trinidad and Tobago"
                                            @if ($profile[0]->country == 'Trinidad and Tobago') selected="selected" @endif>
                                        Trinidad and Tobago
                                    </option>
                                    <option value="Tromelin Island"
                                            @if ($profile[0]->country == 'Tromelin Island') selected="selected" @endif>
                                        Tromelin Island
                                    </option>
                                    <option value="Tunisia"
                                            @if ($profile[0]->country == 'Tunisia') selected="selected" @endif>Tunisia
                                    </option>
                                    <option value="Turkey"
                                            @if ($profile[0]->country == 'Turkey') selected="selected" @endif>Turkey
                                    </option>
                                    <option value="Turkmenistan"
                                            @if ($profile[0]->country == 'Turkmenistan') selected="selected" @endif>
                                        Turkmenistan
                                    </option>
                                    <option value="Turks and Caicos Islands"
                                            @if ($profile[0]->country == 'Turks and Caicos Islands') selected="selected" @endif>
                                        Turks and Caicos Islands
                                    </option>
                                    <option value="Tuvalu"
                                            @if ($profile[0]->country == 'Tuvalu') selected="selected" @endif>Tuvalu
                                    </option>
                                    <option value="U.N.(Geneva)"
                                            @if ($profile[0]->country == 'U.N.(Geneva)') selected="selected" @endif>
                                        U.N.(Geneva)
                                    </option>
                                    <option value="U.N.(New York)"
                                            @if ($profile[0]->country == 'U.N.(New York)') selected="selected" @endif>
                                        U.N.(New York)
                                    </option>
                                    <option value="U.N.(Vienna)"
                                            @if ($profile[0]->country == 'U.N.(Vienna)') selected="selected" @endif>
                                        U.N.(Vienna)
                                    </option>
                                    <option value="Uganda"
                                            @if ($profile[0]->country == 'Uganda') selected="selected" @endif>Uganda
                                    </option>
                                    <option value="Ukraine"
                                            @if ($profile[0]->country == 'Ukraine') selected="selected" @endif>Ukraine
                                    </option>
                                    <option value="United Arab Emirates"
                                            @if ($profile[0]->country == 'United Arab Emirates') selected="selected" @endif>
                                        United Arab Emirates
                                    </option>
                                    <option value="United Kingdom"
                                            @if ($profile[0]->country == 'United Kingdom') selected="selected" @endif>
                                        United Kingdom
                                    </option>
                                    <option value="Uruguay"
                                            @if ($profile[0]->country == 'Uruguay') selected="selected" @endif>Uruguay
                                    </option>
                                    <option value="Uzbekistan"
                                            @if ($profile[0]->country == 'Uzbekistan') selected="selected" @endif>
                                        Uzbekistan
                                    </option>
                                    <option value="US Minor Outlying Islands"
                                            @if ($profile[0]->country == 'US Minor Outlying Islands') selected="selected" @endif>
                                        US Minor Outlying Islands
                                    </option>
                                    <option value="Vanuatu"
                                            @if ($profile[0]->country == 'Vanuatu') selected="selected" @endif>Vanuatu
                                    </option>
                                    <option value="Venezuela"
                                            @if ($profile[0]->country == 'Venezuela') selected="selected" @endif>
                                        Venezuela
                                    </option>
                                    <option value="Vietnam"
                                            @if ($profile[0]->country == 'Vietnam') selected="selected" @endif>Vietnam
                                    </option>
                                    <option value="Virgin Islands"
                                            @if ($profile[0]->country == 'Virgin Islands') selected="selected" @endif>
                                        Virgin Islands
                                    </option>
                                    <option value="Wake Island"
                                            @if ($profile[0]->country == 'Wake Island') selected="selected" @endif>Wake
                                        Island
                                    </option>
                                    <option value="Wallis and Futuna Islands"
                                            @if ($profile[0]->country == 'Wallis and Futuna Islands') selected="selected" @endif>
                                        Wallis and Futuna Islands
                                    </option>
                                    <option value="West Bank"
                                            @if ($profile[0]->country == 'West Bank') selected="selected" @endif>West
                                        Bank
                                    </option>
                                    <option value="Western Sahara"
                                            @if ($profile[0]->country == 'Western Sahara') selected="selected" @endif>
                                        Western Sahara
                                    </option>
                                    <option value="Western Samoa"
                                            @if ($profile[0]->country == 'Western Samoa') selected="selected" @endif>
                                        Western Samoa
                                    </option>
                                    <option value="Yemen"
                                            @if ($profile[0]->country == 'Yemen') selected="selected" @endif>Yemen
                                    </option>
                                    <option value="Yugoslavia"
                                            @if ($profile[0]->country == 'Yugoslavia') selected="selected" @endif>
                                        Yugoslavia
                                    </option>
                                    <option value="Zaire"
                                            @if ($profile[0]->country == 'Zaire') selected="selected" @endif>Zaire
                                    </option>
                                    <option value="Zambia"
                                            @if ($profile[0]->country == 'Zambia') selected="selected" @endif>Zambia
                                    </option>
                                    <option value="Zimbabwe"
                                            @if ($profile[0]->country == 'Zimbabwe') selected="selected" @endif>Zimbabwe
                                    </option>
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
                                    <option value="All"
                                            @if ($profile[0]->mess_filter == 'all') selected="selected" @endif>All
                                    </option>
                                    <option value="Friends"
                                            @if ($profile[0]->mess_filter == 'friends') selected="selected" @endif>
                                        Friends only
                                    </option>
                                    <option value="Staff"
                                            @if ($profile[0]->mess_filter == 'staff') selected="selected" @endif>Staff
                                        only
                                    </option>
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
                <input type="submit" style="margin-left: 400px" class="input_submit" name="submitForm"
                       value="Save Changes"/> or <a href="" title="Cancel edit">Cancel</a>
            </fieldset>
                <input type="hidden" id="csrftoken" name="_token" value="{{ csrf_token() }}">
            </form>
            <div class="clearfix"></div>
        </div>
    </div>

@endsection