<?php
/**
 * @copyright Copyright (C) 2012 Damien Pobel. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @package frontendperformanceboost
 */

class fepOptimizer
{
    /**
     * Generates a summary of this optimization if the DebugOutput is enabled
     * if the corresponding conditional debug is enabled.
     *
     * @param string $debugSettings
     * @param string $name
     * @param int $originalCodeSize
     * @param int $optimizedCodeSize
     */
    public static function report( $debugSettings, $name, $originalCodeSize, $optimizedCodeSize )
    {
        eZDebugSetting::writeDebug(
            $debugSettings,
            'Original size: ' . $originalCodeSize,
            $name
        );
        eZDebugSetting::writeDebug(
            $debugSettings,
            'Optimized size: ' . $optimizedCodeSize
                . ' (' . round( $optimizedCodeSize * 100/$originalCodeSize, 1 ) . '%)',
            $name
        );
    }


}
