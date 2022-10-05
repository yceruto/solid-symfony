<?php

namespace App;

use App\Clock\Time\TimeFactoryInterface;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait {
        configureContainer as doConfigureContainer;
    }

    protected function build(ContainerBuilder $container): void
    {
        $container->registerForAutoconfiguration(TimeFactoryInterface::class)
            ->addTag('time.factory');
    }

    private function configureContainer(ContainerConfigurator $container, LoaderInterface $loader, ContainerBuilder $builder): void
    {
        $this->doConfigureContainer($container, $loader, $builder);

        $container->import($this->getConfigDir().'/integrator.yaml');
    }
}
