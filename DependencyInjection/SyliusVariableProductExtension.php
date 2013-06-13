<?php

namespace Sylius\Bundle\VariableProductBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Sylius\Bundle\VariableProductBundle\SyliusVariableProductBundle;
use Symfony\Component\Config\Definition\Processor;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class SyliusVariableProductExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();

        $config = $processor->processConfiguration($configuration, $config);
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/container'));

        $driver = $config['driver'];

        $this->loadDriver($driver, $config, $loader);

        $container->setParameter('sylius_variable_product.driver', $driver);
        $container->setParameter('sylius_variable_product.engine', $config['engine']);

        $this->mapClassParameters($config['classes'], $container);

        $container->setParameter('sylius_variable_product.driver.'.$driver, true);


    }

    /**
     * Load bundle driver.
     *
     * @param string $driver
     * @param array $config
     * @param XmlFileLoader $loader
     *
     * @throws \InvalidArgumentException
     */
    protected function loadDriver($driver, array $config, XmlFileLoader $loader)
    {
        if (!in_array($driver, SyliusVariableProductBundle::getSupportedDrivers())) {
            throw new \InvalidArgumentException(sprintf('Driver "%s" is unsupported by SyliusVariableProductBundle.', $driver));
        }

        $classes = $config['classes'];
        $loader->load(sprintf('driver/%s.xml', $driver));

        $loader->load('products.xml');
        $loader->load('properties.xml');
        $loader->load('prototypes.xml');
    }

    /**
     * Remap class parameters.
     *
     * @param array $classes
     * @param ContainerBuilder $container
     */
    protected function mapClassParameters(array $classes, ContainerBuilder $container)
    {
        foreach ($classes as $model => $serviceClasses) {
            foreach ($serviceClasses as $service => $class) {
                $service = $service === 'form' ? 'form.type' : $service;
                $container->setParameter(sprintf('sylius.%s.%s.class', $service, $model), $class);
            }
        }
    }
}
