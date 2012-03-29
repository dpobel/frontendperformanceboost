<?php
/**
 * @copyright Copyright (C) 2012 Damien Pobel. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @package frontendperformanceboost
 */

class fepPhpYuiCssCompressorOptimizer
{

    /**
     * Optimizes the CSS string by using the YUI CSS Compressor PHP port
     *
     * @param string $css
     * @param int $packLevel
     * @return string
     */
    public static function optimize( $css, $packLevel = 2 )
    {
        eZDebug::accumulatorStart(
            __METHOD__, 'Packer',
            'Front end performance boost CSS optimizer'
        );
        $minimizer = new CSSmin( false );
        $css = $minimizer->run( $css );
        eZDebug::accumulatorStop( __METHOD__ );

        return $css;
    }

}

