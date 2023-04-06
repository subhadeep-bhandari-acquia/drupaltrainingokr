<?php

namespace Subhadeep\ConsoleApplication\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MyThirdCommand extends CommandBase {

  public function execute(InputInterface $input, OutputInterface $output): int {
    if ($input->getArgument('condition') === 'SUCCESS') {
      $this->io->success(__CLASS__ . ' is SUCCESS');
    } else {
      $this->io->error(__CLASS__ . ' is ERROR');
    }
    return self::SUCCESS;
  }
}
