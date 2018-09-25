<?php
/*********************************************************************************************
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
*********************************************************************************************/

    require_once('../common/config.php') ;
    require_once('../common/dbman.php') ;
    
    $transfer = '../error.php' ;
    $entity = '../database/'.$_GET['rnd'].'.xml' ;
    $exists = checkDB($entity) ;
    
    if($exists) {
    	$transfer = $exists->destination ; 
    }
    header('Location: '.$transfer);

    exit ;