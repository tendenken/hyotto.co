<?php
/************************************************************************
Copyright 2018 tendenken Lab. (天神橋電算技術研究所)

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
*************************************************************************/

    require_once('config.php') ;

    function getSlen() {
        // return false ; // for test
        $slen = '' ;
        $keyLen = MINIMUM_KEY_LEN ;
        $exists = true ;
        do {
            for($index = 0 ; $index < MAX_CHECK_COUNT ; $index++) {
                $slen = getRandomKey($keyLen) ;
                $entity = '../database/'.$slen.'.xml' ;
                if(!checkDB($entity)) {
                    $exists = !$exists ;
                    break ;
                }
            }
            if($exists) $keyLen++ ;
            else break ;
            if($keyLen > MAX_KEY_LEN) return false ;
        }while(true) ;
        return $slen ;
    }

    function createXML($entity,$url) {
        $xml = new SimpleXMLElement(
        	'<?xml version="1.0" encoding="UTF-8"?>'.
        	'<transfer></transfer>' 
        ) ;
        $xml->destination = $url ;
        $xml->expire = date(DATE_ATOM,strtotime('+'.TRANFER_EXPIRE.' month')) ;
        $xml->created = date(DATE_ATOM) ;
        $xml->asXML($entity) ;
        return true ;
    }

    function checkDB($entity) {
        $exists = file_exists($entity) ;
        if($exists) {
            $xml = simplexml_load_file($entity) ;
            $today = date(DATE_ATOM);
            if( strtotime($today) > strtotime($xml->expire) ) {
                unlink($entity) ;
                return false ;
            }
            else {
                return $xml ;
            }
        } 
    	return false ;
    }

    function getRandomKey($digits) {
        $seed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $strarray = preg_split("//", $seed, 0, PREG_SPLIT_NO_EMPTY);
        $key = "" ;
        for ( $index = 0 ; $index < $digits ; $index++) {
            $key .= $strarray[ array_rand( $strarray ,1 ) ] ;
        }
        return $key ;
    } 