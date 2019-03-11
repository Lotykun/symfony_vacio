<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateProductCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:create-product';

    protected function configure()
    {
        $this->setDescription('Creates a new product.')->setHelp('This command allows you to create a product...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(['User Creator','============','',]);
    }
}

