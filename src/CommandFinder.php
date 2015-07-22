<?php

namespace johnitvn\cliruntime;

/**
 * @author John Martin <john.itvn@gmail.com>
 * @since 1.0.2
 */
class CommandFinder {

    /**
     * Get the real path of command
     * @param string $command The command name
     * @return string|null Return string of real path to command or null if comand not installed or not register in system enviroment
     */
    public static function findCommand($command) {
        if (static::isWindownsOS()) {
            $command = $command . '.bat';
        }
        $realCommand = null;
        $envPaths = explode(PATH_SEPARATOR, getenv('path'));
        foreach ($envPaths as $path) {
            $path = $path . DIRECTORY_SEPARATOR . $command;
            if (file_exists($path)) {
                $realCommand = $path;
                break;
            }
        }
        return $realCommand;
    }

    private static function isWindownsOS() {
        return strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
    }

}
