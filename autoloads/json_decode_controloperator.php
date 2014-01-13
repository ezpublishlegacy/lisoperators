<?php

/*
* @copyright Copyright (C) 2010-2013 land in sicht AG All rights reserved.
* @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
*/

class MyJsonDecodeOperator
{
    /*!
     Constructor
    */
    function MyJsonDecodeOperator()
    {
        $this->Operators = array( 'ezjson_decode');
    }

    /*!
     Returns the operators in this class.
    */
    function &operatorList()
    {
        return $this->Operators;
    }

    /*!
     \return true to tell the template engine that the parameter list
    exists per operator type, this is needed for operator classes
    that have multiple operators.
    */
    function namedParameterPerOperator()
    {
        return true;
    }

    /*!
     The first operator has two parameters, the other has none.
     See eZTemplateOperator::namedParameterList()
    */
    function namedParameterList()
    {
        return array(                      
                      'ezjson_decode' => array('json' => array( 'type' => 'string',
                                                                     'required' => true,
                                                                     'default' => '' ),
                                             'assoc' => array( 'type' => 'bool',
                                                                     'required' => false,
                                                                     'default' => true ) ) );
    }

    /*!
     Executes the needed operator(s).
     Checks operator names, and calls the appropriate functions.
    */
    function modify( &$tpl, &$operatorName, &$operatorParameters, &$rootNamespace,
                     &$currentNamespace, &$operatorValue, &$namedParameters )
    {
        switch ( $operatorName )
        {
            case 'ezjson_decode':
            {
                $operatorValue = $this->ezjson_decode( $namedParameters['json'], 
                                                       $namedParameters['assoc']
                                                     );
            } break;
        }
    }

    function ezjson_decode( $json, $assoc  )
    { 
        return json_decode( $json, $assoc  );
    }

    /// \privatesection
    var $Operators;
}

?>