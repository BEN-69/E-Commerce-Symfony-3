<?php
namespace Ben\EcommerceBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class FacturesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('ecommerce:facture')
            ->setDescription('Ceci est un premier test')
            ->addArgument('date', InputArgument::OPTIONAL, 'Date pour laquel vous souhaitez récuperer les factures');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $date = new \DateTime();
        $em = $this->getContainer()->get('doctrine')->getManager();
        $factures = $em->getRepository('BenEcommerceBundle:Commandes')->byDateCommand($input->getArgument('date'));


        if ($factures != null) {
            $text = 'Vous avez telecharger '.count($factures).' facture(s).';
            $dir = $date->format('d-m-Y h-i-s');
            //__dir__.'/../../../../Facturation/'.$dir;
             mkdir('Facturation/'.$dir);

            foreach($factures as $facture) {
                $this->getContainer()->get('setNewFacture')->facture($facture)
                    ->Output('facturation/'.$dir.'/facture'.$facture->getReference().'.pdf','F');
            }
        } else {
            $text = 'Ancun facture disponible';
        }
        $output->writeln($text);
    }
}