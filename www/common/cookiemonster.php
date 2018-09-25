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

function checkCookie() {
    $remain = 0 ; 
	if(isset($_COOKIE['generated'])) {
        $remain = $_COOKIE['generated'] ;
	}
	else {
		$remain = MAX_QUOTA ;
		setcookie('generated',MAX_QUOTA,strtotime(COOKIE_EXPIRE),'/') ;
	}
	return $remain ;
}

function setRemain($generated) {
	setcookie('generated',$generated,strtotime(COOKIE_EXPIRE),'/') ;
}
