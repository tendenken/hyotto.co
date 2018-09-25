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


require_once('./common/cookiemonster.php') ;
$remainCount = checkCookie() ;

?>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/style.css?<?php echo time(); ?>">
	<script type="text/javascript" src="/js/hyottoco.js?<?php echo time(); ?>"></script>
</head>
<body>
	<div class="header">
		<img class="headerimg" src="../materials/hyottoko.png" />
		<img class="headerlogo" src="../materials/logo.png" />
		
	</div>
	<div class="contents">
        <div class="input-box">
    		<div class="error-title">
	    		ERROR !!!!
		    </div>
    		<div class="error-msg">
	    		Invalid URL or expired....
		    </div>
            <div class="back-area" onclick="register(); return false;">
         		<img class="submit-button" src="../materials/back.png"	/>
            </div>
        </div>
	</div>

	<div class="footer">
		<div class="footerlogo">
		    2018 天神橋電算技術研究所
		</div>
	</div>

</body>
</html>