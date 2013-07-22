<?php

/*
 * This file is part of the Sylius package.
 *
 * (c); Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\VariableProductBundle\Model;

/**
 * Option value interface.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
interface OptionValueInterface
{
    /**
     * Get option.
     *
     * @return OptionInterface $option
     */
    public function getOption();

    /**
     * Set option.
     *
     * @param OptionInterface $option
     */
    public function setOption(OptionInterface $option = null);

    /**
     * Get internal value.
     *
     * @return string
     */
    public function getValue();

    /**
     * Set internal value.
     *
     * @param string $value
     */
    public function setValue($value);

    /**
     * Proxy method to access the name of real option object.
     * Those methods are mostly useful in templates so you can easily
     * display option name with their values.
     *
     * @return string The name of option
     */
    public function getName();

    /**
     * Proxy method to access the presentation of real option object.
     *
     * @return string The presentation of object
     */
    public function getPresentation();

    /**
     * @param Conflict[] $conflicts
     * @return OptionValue
     */
    public function setConflictedValues($conflicts);

    /**
     * @return Conflict[]
     */
    public function getConflictedValues();

    /**
     * @param ConflictInterface $conflict
     * @return bool
     */
    public function addConflictedValue(ConflictInterface $conflict);

    /**
     * @param ConflictInterface $conflict
     * @return mixed
     */
    public function removeConflictedValue(ConflictInterface $conflict);

    /**
     * @param ConflictInterface $conflict
     * @return mixed
     */
    public function hasConflictedValue(ConflictInterface $conflict);

    /**
     * @param Conflict[] $conflicts
     * @return OptionValue
     */
    public function setConflictValues($conflicts);

    /**
     * @return Conflict[]
     */
    public function getConflictValues();

    /**
     * @param ConflictInterface $conflict
     * @return bool
     */
    public function addConflictValue(ConflictInterface $conflict);

    /**
     * @param ConflictInterface $conflict
     * @return mixed
     */
    public function removeConflictValue(ConflictInterface $conflict);

    /**
     * @param ConflictInterface $conflict
     * @return mixed
     */
    public function hasConflictValue(ConflictInterface $conflict);

    /**
     * @param DependencyInterface[] $dependencies
     * @return OptionValue
     */
    public function setDependencies($dependencies);

    /**
     * @return DependencyInterface[]
     */
    public function getDependencies();

    /**
     * @param DependencyInterface $dependency
     * @return mixed
     */
    public function addDependency(DependencyInterface $dependency);

    /**
     * @param DependencyInterface $dependency
     * @return mixed
     */
    public function removeDependency(DependencyInterface $dependency);

    /**
     * @param DependencyInterface $dependency
     * @return mixed
     */
    public function hasDependency(DependencyInterface $dependency);
}
