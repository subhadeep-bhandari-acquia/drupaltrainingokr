#!/usr/bin/env php
<?php

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

$application = new Application();

$containerBuilder = new ContainerBuilder();
$loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
try {
  $loader->load('../services.yaml');
} catch (Exception $e) {
  echo 'Error occurred while loading services.yaml. Error message: ' . $e->getMessage();
  exit;
}

try {
  $commandFactory = $containerBuilder->get('command_factory');
} catch (Exception $e) {
  echo 'Error occurred while running application. Error message: ' . $e->getMessage();
  exit;
}

if ($commandFactory) {
  $commands = [
    'firstcommand' => 'Subhadeep\\ConsoleApplication\\Commands\\MyFirstCommand',
    'secondcommand' => 'Subhadeep\\ConsoleApplication\\Commands\\MySecondCommand',
    'thirdcommand' => 'Subhadeep\\ConsoleApplication\\Commands\\MyThirdCommand',
  ];
  $allCommands = [];
  foreach ($commands as $commandName => $commandClass) {
    $allCommands[] = $commandFactory->getCommand($commandName, $commandClass);
  }
  if (!empty($allCommands)) {
    $application->addCommands($allCommands);
  }
}

try {
  $application->run();
} catch (Exception $e) {
  echo 'Error occurred while running application. Error message: ' . $e->getMessage();
  exit;
}
