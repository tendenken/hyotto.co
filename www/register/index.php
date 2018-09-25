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


require_once('../common/cookiemonster.php') ;
$remainCount = checkCookie() ;
$proto = empty($_SERVER['HTTPS'])?'http://':'https://' ;
$url = $proto.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'] ;
$img = $proto.$_SERVER['HTTP_HOST'].'/materials/hyottoko_thumb.png' ;
?>
<html>
<head>
	<title>FRAME BOY</title>
    <meta property="og:url"           content="<?php echo $url ; ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="FRAME BOY" />
    <meta property="og:description"   content="Shortlen URL service." />
    <meta property="og:image"         content="<?php echo $img ; ?>" />
    <meta property="fb:app_id"         content="<?php echo $fbappId ; ?>" />

	<link rel="icon" type="image/png" href="../materials/hyottoko.png">
	<link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/style.css?<?php echo time(); ?>">
	<script type="text/javascript" src="/js/hyottoco.js?<?php echo time(); ?>"></script>

</head>
<body>
    <div id="fb-root"></div>
	<div class="header">
		<img class="headerimg" src="../materials/hyottoko.png" />
		<img class="headerlogo" src="../materials/logo.png" />
	</div>

	<div class="contents">
        <div class="input-box">
    		<div class="remain-hyottoco">
	    		You can generate hyottoco 
	    		<span class="remain" id="remain">
	    			<?php echo $remainCount ; ?>
	    		</span> more.
		    </div>

        	<div class="dest-input">
        	    Forwarding destination : 
        	    <input type="url" name="fw-dest" class="fw-dest" id="fw-dest" size="32" required>
            </div>
            <div class="submit-area" onclick="showConfirm(); return false;">
         		<img class="submit-button" src="../materials/genbutton.png"	/>
            </div>
            <div class="slen-url">
            	hyottoco : <input type="text" size="24" id="slen"> is valid for 
            	<span class="expire"> <?php echo TRANFER_EXPIRE ;?> </span> month.
            </div>
        </div>
	</div>

	<div class="confirm-box" id="confirm-box">
		<div class="confirm-message">
			Are you sure to hyottoco?
		</div>
        <div class="confirm-area">
    		<div class="button-yes"  onclick="generate();return false ;">
	    		<img class="button" src="../materials/generate.png" />
		    </div>
		    <div class="button-cansel" onclick="doCancel();return false ;">
			    <img class="button" src="../materials/cansel.png" />
		    </div>
        </div>
	</div>

	<div class="alert-box" id="alert-box">
		<div class="alert-message">
			Enter the valid transfer destination.
		</div>
		<div class="alert-button" onclick="doCancel();return false ;">
			<img class="alert-img" src="../materials/back.png" />
		</div>
	</div>

	<div class="generate-box" id="generate-box">
		<div class="generate-message">
			generating ....
		</div>
		<div class="spinner">
			<img class="spin-img" src="../materials/hyottoko.png" />
		</div>
	</div>

	<div class="alert-box" id="error-box">
		<div class="alert-message">
			An error has occured. Please try again.
		</div>
		<div class="alert-button" onclick="doCancel();return false ;">
			<img class="alert-img" src="../materials/back.png" />
		</div>
	</div>
    
<!-- 	<div class="share-box" id="share-box">
		
		<div class="alert-message">
			Want more ?
		</div>
		<div 
		    class="fb-like" 
		    data-href="https://www.hyotto.co/register/" 
		    data-layout="button" 
		    data-action="like" 
		    data-size="large" 
		    data-show-faces="false" 
		    data-share="true"></div>
		
		<div class="alert-button" onclick="doCancel();return false ;">
			<img class="alert-img" src="../materials/back.png" />
		</div>
	</div> -->

    <div class="cover" id="cover">
    </div>

	<div class="footer">
		<div class="footerlogo">
		    2018 天神橋電算技術研究所
		</div>
	</div>

</body>
</html>