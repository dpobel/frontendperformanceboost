<?php
/**
 * @copyright Copyright (C) 2012 Damien Pobel. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @package frontendperformanceboost
 */

class fepCliOptimizer
{

    /**
     * Executes the $command, writes the content of $code on the standard
     * input of the process and returns the standard output.
     * 
     * @param string $command 
     * @param string $code 
     * @param int $level 
     * @return string
     * @throw Exception if the command does not return 0 or if the process can 
     * not be launched.
     */
    protected static function execute( $command, $code, $level = 2 )
    {
        $originalSize = strlen( $code );
        $pipes = array();
        $process = proc_open(
            $command,
            array(
                0 => array( 'pipe', 'r' ),
                1 => array( 'pipe', 'w' ),
                2 => array( 'pipe', 'w' )
            ),
            $pipes
        );
        if ( !is_resource( $process ) )
        {
            throw new Exception( 'proc_open() failed' );
        }

        fwrite( $pipes[0], $code );
        fclose( $pipes[0] );

        $code = stream_get_contents( $pipes[1] );
        fclose( $pipes[1] );

        $errorOutput = stream_get_contents( $pipes[2] );
        if ( $errorOutput != '' )
        {
            eZDebug::writeWarning( $errorOutput, 'Error output' );
        }
        fclose( $pipes[2] );

        $return = proc_close( $process );
        if ( $return != 0 )
        {
            throw new Exception( 'Returned value is not 0: ' . $return );
        }
        return $code;
    }

}


