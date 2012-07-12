<?php

//include("geoloc/geoipcity.inc");
//include("geoloc/geoipregionvars.php");
//
//$gi = geoip_open(realpath("GeoLiteCity.dat"), GEOIP_STANDARD);
//
//$record = geoip_record_by_addr($gi, '85.171.105.114');
//$la = $record->latitude;
//$lo = $record->longitude;
//
//http://freegeoip.net/json/85.171.105.114

//$d = file_get_contents("http://www.iplocationtools.com/ip_query.php?ip=85.171.105.114&output=xml"); // on charge l'api
//
//if (!$d)
//    return false; // Failed to open connection
//
//$answer = new SimpleXMLElement($d);
//
//if ($answer->Status != 'OK')
//    return false; // Invalid status code
//
//$country_code = $answer->CountryCode;
//$country_name = $answer->CountryName;
//$region_name = $answer->RegionName;
//$city = $answer->City;
//$zippostalcode = $answer->ZipPostalCode;
//$latitude = $answer->Latitude;
//$longitude = $answer->Longitude;

//exit(print_r($city));


//
//$url = "http://api.hostip.info/get_html.php?ip=85.171.105.114&position=true";
//if ($json = file_get_contents($url)) {
//    exit(print_r($json));
//}
//$url = "http://maps.google.com/maps/geo?output=json&q=" . $la . "," . $lo;
//if ($json = file_get_contents($url)) {
//    $informations = json_decode($json, true);
//    if ($informations['Status']['code'] != 200) {
//        die("Erreur");
//    } else {
//        print_r($informations);
//    }
//} else {
//    echo "Erreur";
//}
//
//exit(print_r($json));
//geoip_close($gi);
//require_once('geoloc2/ip2location.class.php');
//$ip = new ip2location;
//$ip->open('geoloc2/databases/IP-COUNTRY-SAMPLE.BIN');
//$record = $ip->getAll('89.156.71.149');
//
//echo 'IP Address: ' . $record->ipAddress;
//echo 'IP Number: ' . $record->ipNumber;
//echo 'Country Short: ' . $record->countryShort;
//echo 'Country Long: ' . $record->countryLong;
//echo 'Region: ' . $record->region;
//echo 'City: ' . $record->city;
//echo 'ISP/Organisation: ' . $record->isp;
//echo 'Latitude: ' . $record->latitude;
//echo 'Longitude: ' . $record->longitude;
//echo 'Domain: ' . $record->domain;
//echo 'ZIP Code: ' . $record->zipCode;
//echo 'Time Zone: ' . $record->timeZone;
//echo 'Net Speed: ' . $record->netSpeed;
//echo 'IDD Code: ' . $record->iddCode;
//echo 'Area Code: ' . $record->areaCode;
//echo 'Weather Station Code: ' . $record->weatherStationCode;
//echo 'Weather Station Name: ' . $record->areaCode;
//echo 'MCC: ' . $record->mcc;
//echo 'MNC: ' . $record->mnc;
//echo 'Mobile Brand: ' . $record->mobileBrand;


function get_ip()
	{ 
		$ip = '';
		if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		{ 
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} 
		elseif(isset($_SERVER['HTTP_CLIENT_IP']))
		{ 
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} 
		else
		{ 
			$ip = $_SERVER['REMOTE_ADDR'];
		} 
		return $ip;
	}
	
	function locateIp($ip)
	{
		$URL = "http://www.ipinfodb.com/ip_query.php?ip=$ip&output=xml";
		//Initialize the Curl session
		$ch = curl_init();
  
		//Set curl to return the data instead of printing it to the browser.
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//Set the URL
		curl_setopt($ch, CURLOPT_URL, $URL);
		//Execute the fetch
		$d = curl_exec($ch);
		//Close the connection
		curl_close($ch);
	 
		//Use backup server if cannot make a connection
		if (!$d)
		{
			$URL = "http://backup.ipinfodb.com/ip_query.php?ip=$ip&output=xml";
			//Initialize the Curl session
			$ch = curl_init();
	  
			//Set curl to return the data instead of printing it to the browser.
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			//Set the URL
			curl_setopt($ch, CURLOPT_URL, $URL);
			//Execute the fetch
			$backup = curl_exec($ch);
			//Close the connection
			curl_close($ch);
			if($backup)
				$answer = new SimpleXMLElement($backup);
			if (!$backup) return false; // Failed to open connection
		}
		else
		{
			$answer = new SimpleXMLElement($d);
		}
	
		$country_code = $answer->CountryCode;
		$country_name = $answer->CountryName;
		$region_name = $answer->RegionName;
		$city = $answer->City;
		$zippostalcode = $answer->ZipPostalCode;
		$latitude = $answer->Latitude;
		$longitude = $answer->Longitude;
		$timezone = $answer->Timezone;
		$gmtoffset = $answer->Gmtoffset;
		$dstoffset = $answer->Dstoffset;
	 
		//Return the data as an array
		return array('ip' => $ip, 'country_code' => $country_code, 'country_name' => $country_name, 'region_name' => $region_name,
					'city' => $city, 'zippostalcode' => $zippostalcode, 'latitude' => $latitude, 'longitude' => $longitude,
					'timezone' => $timezone, 'gmtoffset' => $gmtoffset, 'dstoffset' => $dstoffset);
	}
        exit(print_r(locateIp('85.171.105.114')));
?>
