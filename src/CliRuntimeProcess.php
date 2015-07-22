<?php

namespace johnitvn\cliruntime;

/**
 * Description of CliRuntimeProcess
 *
 * @author John Martin <john.itvn@gmail.com>
 * @since 1.0.0
 */
class CliRuntimeProcess {

    /**
     *
     * @var mixed
     */
    protected $workingDir;

    /**
     * Constructor for create new CliRuntimeProcess instance
     * @param string|null $workingDir The working directory for execute command, set null for current working
     * 
     */
    public function __construct($workingDir = null) {
        $this->setWorkingDir($workingDir);
    }

    /**
     * Run an external command
     * @param string $command
     * @param array $output The returned output, if required
     * @return boolean Whether the exit code is 0
     */
    public function run($command) {
        $output = null;
        exec($command, $output, $exitCode);
        return $exitCode === 0;
    }

    /**
     * Run an external command and capture output
     * @param string $command
     * @param array $output The returned output, if required
     * @return boolean Whether the exit code is 0
     */
    public function runCapture($command, array &$output) {
        $output = array();
        exec($command, $output, $exitCode);
        return $exitCode == 0;
    }

    /**
     * Execute an external command and display raw output
     * @param string $command
     * @return boolean Whether the exit code is 0
     */
    public function runDisplayOutput($command) {
        passthru($command, $exitCode);
        return $exitCode === 0;
    }

    /**
     * Get current working dir
     * @return string|null 
     */
    public function getWorkingDir() {
        return $this->workingDir;
    }

    /**
     * Sets workingDir for process calls.
     *
     * @param string|null $directory
     * @throw \CliRuntimeException When working directory can't be change
     */
    public function setWorkingDir($directory = null) {
        if ($directory == null) {
            $directory = getcwd();
            if ($directory === FALSE) {
                throw new CliRuntimeException('Any one of the parent directories does not have the
 readable or search mode set');
            }
        } else if (!file_exists($directory)) {
            throw new CliRuntimeException("Path of working directory is not exist");
        }
        if (chdir($directory)) {
            $this->workingDir = $directory;
            return true;
        } else {
            throw new CliRuntimeException("Can\'t change working dir to :" . $directory);
        }
    }

}
