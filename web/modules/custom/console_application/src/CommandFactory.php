<?php

namespace Subhadeep\ConsoleApplication;

use Symfony\Component\Console\Command\Command;

class CommandFactory {

  /**
   * @param $commandName
   * @param $commandClass
   * @return Command
   */
  public function getCommand($commandName, $commandClass) : Command {
    return new $commandClass($commandName);
  }
}
