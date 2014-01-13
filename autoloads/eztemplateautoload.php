<?php

/*
* @copyright Copyright (C) 2010-2013 land in sicht AG All rights reserved.
* @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
*/

// Operator autoloading
$eZTemplateOperatorArray = array();

$eZTemplateOperatorArray[] =
  array( 'script' => 'extension/lisoperators/autoloads/str_replace_controloperator.php',
         'class' => 'MyStrReplaceOperator',
         'operator_names' => array( 'ezstr_replace' ) );
$eZTemplateOperatorArray[] =
  array( 'script' => 'extension/lisoperators/autoloads/json_decode_controloperator.php',
         'class' => 'MyJsonDecodeOperator',
         'operator_names' => array( 'ezjson_decode' ) );         
$eZTemplateOperatorArray[] =
  array( 'script' => 'extension/lisoperators/autoloads/autolink_controloperator.php',
         'class' => 'MyAutoLinkOperator',
         'operator_names' => array( 'myautolink' ) );                  

?>