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



function doCancel() {
	var cofirmBox = document.getElementById('confirm-box') ;
	var cover      = document.getElementById('cover') ;
	var alertBox = document.getElementById('alert-box') ;
    var generateBox = document.getElementById('generate-box') ;
    var errorBox = document.getElementById('error-box') ;
	cofirmBox.style.display = 'none' ;
	cover.style.display = 'none' ;
	alertBox.style.display = 'none' ;
	generateBox.style.display = 'none' ;
	errorBox.style.display = 'none' ;
}

function showConfirm() {
	if(!checkTransfer()) return ;
	var cofirmBox = document.getElementById('confirm-box') ;
	var cover      = document.getElementById('cover') ;
	cofirmBox.style.display = 'block' ;
	cover.style.display = 'block' ;
}

function checkTransfer() {
	var transferURL = document.getElementById('fw-dest').value ;
	if(transferURL.trim(transferURL) == '') {
		showAlert() ;
		return false ;
	}
	data = transferURL.match(/(http|https):\/\/.+/);
	if(!data) {
		showAlert() ;
		return false ;
	}
	return true ;
}

function showAlert() {
	var alertBox = document.getElementById('alert-box') ;
	var cover      = document.getElementById('cover') ;
	alertBox.style.display = 'block' ;
	cover.style.display = 'block' ;
}

function generate() {
	var cofirmBox = document.getElementById('confirm-box') ;
	var generateBox = document.getElementById('generate-box') ;
	var cover      = document.getElementById('cover') ;
	cofirmBox.style.display = 'none' ;
	generateBox.style.display = 'block' ;
	cover.style.display = 'block' ;
	getSurl() ;
}

function getSurl() {
	var request = new XMLHttpRequest() ;
	request.responseType = 'text';
    request.onload = function() {
    	if(request.readyState == request.DONE && request.status == 200 ) {
    		var response = JSON.parse(request.responseText) ;
    		console.log(response) ;
    		if(response.status == 'OK') {
                setResponse(response) ;
    		}
    		else {
    			showError() ;
    		}
    	}
    }
    var transferURL = document.getElementById('fw-dest').value ;
    var apiKey = 'testing' ;
    var sendData = new Object() ;
    sendData.transferURL = transferURL ;
    sendData.apiKey = apiKey ;
    var sendString = JSON.stringify(sendData) ;
    request.open('POST','/api/') ;
    request.setRequestHeader( 'Content-Type', 'application/json');
    request.send(sendString) ;
}

function setResponse(response) {
	var slen = document.getElementById('slen') ;
	var remain = document.getElementById('remain') ;
	slen.value = response.slen ;
	remain.innerHTML = response.remain ;
	doCancel() ;
}

function showError() {
	var generateBox = document.getElementById('generate-box') ;
	var errorBox = document.getElementById('error-box') ;
	var cover      = document.getElementById('cover') ;
	errorBox.style.display = 'block' ;
	generateBox.style.display = 'none' ;
	cover.style.display = 'block' ;
}

function register() {
	location.href = '/register' ;
}