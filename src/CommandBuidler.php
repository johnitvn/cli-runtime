<?php

namespace johnitvn\cliruntime;

/**
 * Command Buidler class
 *
 * @author John Martin <john.itvn@gmail.com>
 * @since 1.0.0
 */
class CommandBuidler {

    private $command = '';
    private $params = '';
    private $flags = '';
    private $arguments = '';

    public function __construct($command) {
        $this->command = $command;
    }

    public function getCommand() {
        return sprintf('%s%s%s%s', 
            $this->command,
            $this->params,
            $this->flags,
            $this->arguments
        );
    }

    public function addParam($value) {
        $this->params .= " $value";
        return $this;
    }

    public function addFlag($name, $value = null) {
        $this->flags .= " -$name" . ($value == null ? "" : "=$value");
        return $this;
    }

    public function addArgument($name, $value = null) {
        $this->arguments .= " --$name" . ($value == null ? "" : "=$value");
        return $this;
    }

}
