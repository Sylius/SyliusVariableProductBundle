<?php
/*
* This file is part of the Sylius package.
*
* (c) Paweł Jędrzejewski
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Sylius\Bundle\VariableProductBundle;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Sylius\Bundle\ResourceBundle\DependencyInjection\Compiler\ResolveDoctrineTargetEntitiesPass;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Product management bundle with highly flexible architecture.
 * Implements basic product model with properties support.
 *
 * Use *SyliusCustomizableProductBundle* to get variants, options and
 * customizations support.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */

class SyliusVariableProductBundle extends Bundle
{
    /**
     * Return array with currently supported drivers.
     *
     * @return array
     */
    public static function getSupportedDrivers()
    {
        return array(
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM
        );
    }

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $interfaces = array(
            'Sylius\Bundle\VariableProductBundle\Model\Variant\VariantInterface'          => 'sylius.model.variant.class',
            'Sylius\Bundle\VariableProductBundle\Model\Option\OptionInterface'            => 'sylius.model.option.class',
            'Sylius\Bundle\VariableProductBundle\Model\Option\OptionValueInterface'       => 'sylius.model.option_value.class',
        );

        $container->addCompilerPass(new ResolveDoctrineTargetEntitiesPass('sylius_variable_product', $interfaces));

        $mappings = array(
            realpath(__DIR__ . '/Resources/config/doctrine/model') => 'Sylius\Bundle\VariableProductBundle\Model',
        );

        $container->addCompilerPass(DoctrineOrmMappingsPass::createXmlMappingDriver($mappings, array('doctrine.orm.entity_manager'), 'sylius_variable_product.driver.doctrine/orm'));
    }
}
