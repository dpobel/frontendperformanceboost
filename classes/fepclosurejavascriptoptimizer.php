<?php
/**
 * @copyright Copyright (C) 2012 Damien Pobel. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @package frontendperformanceboost
 */

class fepClosureJavaScriptOptimizer extends fepCliOptimizer
{
    /**
     * setting to enable conditional debug
     * @see debug.ini.append.php
     */
    const DEBUG_SETTING = 'fep-closure-optimizer';

    /**
     * Optimizes the JS string by using Google Closure compiler
     *
     * @param string $code
     * @param int $level 
     * @return string
     */
    public static function optimize( $code, $level = 2 )
    {
        eZDebug::accumulatorStart(
            __METHOD__, 'Packer',
            'Front end performance boost JS optimizer'
        );
        $originalSize = strlen( $code );
        $ini = eZINI::instance( 'ezjscore.ini' );
        $command = $ini->variable( 'GoogleClosure', 'Command' );
        eZDebugSetting::writeDebug(
            self::DEBUG_SETTING, 'Running ' . $command, __METHOD__
        );
        $res = self::execute( $command, $code, $level );

        $optimizedSize = strlen( $res );
        eZDebugSetting::writeDebug(
            self::DEBUG_SETTING, 'Original size: ' . $originalSize, __METHOD__
        );
        eZDebugSetting::writeDebug(
            self::DEBUG_SETTING,
            'Optimized size: ' . $optimizedSize
                . ' (' . round( $optimizedSize * 100/$originalSize, 1 ) . '%)',
            __METHOD__
        );

        eZDebug::accumulatorStop( __METHOD__ );
        return $res;
    }

}


