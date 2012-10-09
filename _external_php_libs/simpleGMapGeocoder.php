<?php

/**
* simpleGMapGeocoder | simpleGMapGeocoder is part of simpleGMapAPI
*                      Heiko Holtkamp, 2010
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA 
*
*
* simpleGMapGeocoder
* is used for geocoding and is part of simpleGMapAPI
*
* @class        simpleGMapGeocoder
* @author       Heiko Holtkamp <heiko@rvs.uni-bielefeld.de>
* @version      0.1.3
* @copyright    2010 HH
*/

class simpleGMapGeocoder {
    
/**
* @function     getGeoCoords
* @param        $address : string
* @returns      -
* @description  Gets GeoCoords by calling the Google Maps geoencoding API
*/
function getGeoCoords($address)
{
    $coords = array();
    
    /*
      OBSOLETE, now using utf8_encode
      
      // replace special characters (eg. German "Umlaute")
      $address = str_replace("ä", "ae", $address);
      $address = str_replace("ö", "oe", $address);
      $address = str_replace("ü", "ue", $address);
      $address = str_replace("Ä", "Ae", $address);
      $address = str_replace("Ö", "Oe", $address);
      $address = str_replace("Ü", "Ue", $address);
      $address = str_replace("ß", "ss", $address);
    */
    
    $address = utf8_encode($address);
    
    // call geoencoding api with param json for output
    $geoCodeURL = "https://maps.google.com/maps/api/geocode/json?address=".
                  urlencode($address)."&sensor=false";
    
    $result = json_decode(file_get_contents($geoCodeURL), true);
                
    $coords['status'] = $result["status"];
    $coords['lat'] = $result["results"][0]["geometry"]["location"]["lat"];
    $coords['lng'] = $result["results"][0]["geometry"]["location"]["lng"];
    
    return $coords;
}

/**
* WORK IN PROGRESS...
*
* @function     reverseGeoCode
* @param        $lat : string
* @param        $lng : string
* @returns      -
* @description  Gets Address for the given LatLng by calling the Google Maps geoencoding API
*/
function reverseGeoCode($lat,$lng)
{
    $address = array();
    
    // call geoencoding api with param json for output
    $geoCodeURL = "https://maps.google.com/maps/api/geocode/json?address=$lat,$lng&sensor=false";
    
    $result = json_decode(file_get_contents($geoCodeURL), true);
                
    $address['status'] = $result["status"];
    
    echo $geoCodeURL."<br />";
    print_r($result);
    
    return $address;
}

/**
* @function     getOSMGeoCoords
* @param        $address : string
* @returns      -
* @description  Gets GeoCoords by calling the OpenStreetMap geoencoding API
*/
function getOSMGeoCoords($address)
{
    $coords = array();
        
    $address = utf8_encode($address);
    
    // call OSM geoencoding api
    // limit to one result (limit=1) without address details (addressdetails=0)
    // output in JSON
    $geoCodeURL = "https://nominatim.openstreetmap.org/search?format=json&limit=1&addressdetails=0&q=".
                  urlencode($address);
    
    $result = json_decode(file_get_contents($geoCodeURL), true);
    
    $coords['lat'] = $result[0]["lat"];
    $coords['lng'] = $result[0]["lon"];

    return $coords;
}

} // end of class

?>