<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

$say = function(InputInterface $in, OutputInterface $out) {
  $phrase = $in->getArgument('phrase');
  $out->writeln($phrase);
};

$sayCommand = new Command('say');
$sayCommand->addArgument(
  'phrase',
   InputArgument::OPTIONAL,
  ' The phrase you want to say',
  ' I don\'t have anything to say');
$sayCommand->setCode($say);

$application = new Application();
$application->add($sayCommand);
$application->run();
