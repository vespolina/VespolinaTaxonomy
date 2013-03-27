<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\Entity\Taxonomy;

use Vespolina\Entity\Taxonomy\TermInterface;


/**
 * @author Daniel Kucharski <daniel@xerias.be>
 */
interface TaxonomyInterface
{
    /**
     * @return integer
     */
    function getId();

    /**
     * @param string $name
     * @return TaxonomyInterface
     */
    function setName($name);

    /**
     * @return string
     */
    function getName();

    /**
     * @param TaxonomyInterface $parent
     * @return TaxonomyInterface
     */
    function setParent(TaxonomyInterface $parent = null);

    /**
     * @return null|TaxonomyInterface
     */
    function getParent();

    /**
     * @return integer
     */
    function getLevel();

    /**
     * @return string
     */
    function getPath();

    /**
     * @return \DateTime
     */
    function getLockTime();

    /**
     * Add an attribute to the collection
     *
     * @param $name
     * @param $value
     * @return mixed
     */
    function addAttribute($name, $value);

    /**
     * Add a collection of Attribute
     *
     * @param array $attributes
     */
    function addAttributes(array $attributes);

    /**
     * Remove all attributes from the collection
     */
    function clearAttributes();

    /**
     * Return a specific attribute from the collection
     *
     * @param $name
     */
    function getAttribute($name);

    /**
     * Return a collection of Attribute
     *
     * @return array of attributes
     */
    function getAttributes();

    /**
     * Remove an attribute from the collection
     *
     * @param string $name
     */
    function removeAttribute($name);

    /**
     * Set a collection of Attribute
     *
     * @param array $attributes
     * @return \Vespolina\Entity\Taxonomy\TermInterface
     */
    function setAttributes(array $attributes);
}
