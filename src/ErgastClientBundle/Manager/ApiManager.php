<?php
namespace ErgastClientBundle\Manager;

use Unirest;

class ApiManager {
    private $apiUrl;

    function __construct() {
        $this->apiUrl = 'http://ergast.com/api/';
    }

    function get($serie, $type, $season = null, $round = null) {
        $headers = array('Accept' => 'application/json');
        $seasonRound = '';
        if(!is_null($season)) {
            $seasonRound = $season . '/';
        }
        if(!is_null($round)) {
            $seasonRound .= $round . '/';
        }
        
        $response = Unirest\Request::get($this->apiUrl . $serie . '/' . $seasonRound . $type . '.json', $headers);
        return $response->body;
    }
}
