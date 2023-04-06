<?php

namespace Subhadeep\ConsoleApplication\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CommandBase extends Command {

  protected SymfonyStyle $io;

  public function __construct(string $name = null) {
    parent::__construct($name);
  }

  protected function configure(): void {
    $this->addArgument('condition', InputArgument::REQUIRED, 'SUCCESS or ERROR');
  }

  protected function initialize(InputInterface $input, OutputInterface $output) {
    $this->io = new SymfonyStyle($input, $output);
  }

}
