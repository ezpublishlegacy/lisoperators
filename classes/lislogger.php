<?php

/*
* @copyright Copyright (C) 2010-2013 land in sicht AG All rights reserved.
* @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
*/

class lisLogger  {
    
    function lisLogger($fileName, $mode){
        $this->file = fopen( $fileName, $mode );
    }
    
    
    static function CreateNew($fileName)
    {
        return new lisLogger( $fileName, "wt" );
    }

    static function CreateForAdd($fileName)
    {
        return new lisLogger( $fileName, "a+t" );
    }
    
    function writeString( $string, $label='' )
    {
        if( $this->file )
        {
            if ( is_object( $string ) || is_array( $string ) )
                $string = eZDebug::dumpVariable( $string );

            if( $label == '' )
                fputs( $this->file, $string."\r\n" );
            else
                fputs( $this->file, $label . ': ' . $string."\r\n" );
        }
    }

    function writeTimedString( $string, $label='' )
    {
        if( $this->file )
        {
            $time = $this->getTime();

            if ( is_object( $string ) || is_array( $string ) )
                $string = eZDebug::dumpVariable( $string );

            if( $label == '' )
                fputs( $this->file, $time. '  '. $string. "\n" );
            else
                fputs( $this->file, $time. '  '. $label. ': '. $string. "\n" );
        }
    }

    static function getTime()
    {
        $time = strftime( "%d-%m-%Y %H-%M" );
        return $time;
    }

    public $file;
    
}

?>