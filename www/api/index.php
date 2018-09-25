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

require_once('../common/config.php') ;
require_once('../common/cookiemonster.php') ;
require_once('../common/dbman.php') ;

$generated = checkCookie() ;
if($generated < 1) {
    sendError() ;
}
$post_body = file_get_contents('php://input');
$arr = json_decode($post_body,true) ;
$slen = getSlen() ;

if(!$slen) {
    sendError() ;
}
$entity = '../database/'.$slen.'.xml' ;
createXML($entity,$arr['transferURL']) ;
$proto = empty($_SERVER['HTTPS'])?'http://':'https://' ;
$slenUrl = $proto.SLEN_DOMAIN.$slen ;
$generated-- ;
setRemain($generated) ;
$response = array(
	'slen' => $slenUrl ,
	'remain' => $generated ,
	'status' => 'OK'
) ;
sleep(DELAY) ;
echo json_encode($response) ;
exit ;

function sendError() {
    $response = array(
        'status' => 'failed'
    ) ;
    sleep(DELAY) ;
    echo json_encode($response) ;
    exit ;    
}