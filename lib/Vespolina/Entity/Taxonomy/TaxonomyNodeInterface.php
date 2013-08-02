<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\Entity\Taxonomy;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @author Daniel Kucharski <daniel@xerias.be>
 */
interface TaxonomyNodeInterface
{
    /**
     * @return integer
     */
    function getId();

    /**
     * @param string $name
     * @return TaxonomyNodeInterface
     */
    function setName($name);

    /**
     * @return string
     */
    function getName();

    /**
     * @param TaxonomyNodeInterface $parent
     * @return TaxonomyNodeInterface
     */
    function setParent($parent = null);

    /**
     * @return null|TaxonomyNodeInterface
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

    /**
     * @param TaxonomyNodeInterface $taxonomyNode
     * @return TaxonomyNodeInterface
     */
    function addChild(TaxonomyNodeInterface $taxonomyNode);

    /**
     * @param TaxonomyNodeInterface $taxonomyNode
     * @return TaxonomyNodeInterface
     */
    function removeChild(TaxonomyNodeInterface $taxonomyNode);

    /**
     * @param array $children
     * @return TaxonomyNodeInterface
     */
    function setChildren(array $children);

    /**
     * @return ArrayCollection
     */
    function getChildren();

    /**
     * @return TaxonomyNodeInterface
     */
    function clearChildren();
}
