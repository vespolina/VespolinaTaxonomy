<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\Entity\Taxonomy;

/**
 * @author Daniel Kucharski <daniel@xerias.be>
 */
interface TermInterface
{
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
     * Add a term to the collection
     *
     * @param TermInterface $term
     */
    function addTerm(TermInterface $term);

    /**
     * Add a collection of terms
     *
     * @param array $terms
     */
    function addTerms(array $terms);

    /**
     * Remove all terms from the collection
     */
    function clearTerms();

    /**
     * Return the terms children
     *
     * @return array of terms
     */
    function getTerms();

    /**
     * Remove a child from the term
     *
     * @param TermInterface $term
     */
    function removeTerm(TermInterface $term);

    /**
     * Set a collection of terms as the children
     *
     * @param array $terms
     * @return \Vespolina\Entity\Taxonomy\TermInterface
     */
    function setTerms(array $terms);
    
    /**
     * Get the taxonomy name
     * eg. product_hierarchy
     *
     * @abstract
     * @return string
     */
    function getName();

    /**
     * @return mixed
     */
    function getPath();

    /**
     * @param $name
     * @return \Vespolina\Entity\Taxonomy\TermInterface
     */
    function setName($name);

    /**
     * @param $path
     * @return \Vespolina\Entity\Taxonomy\TermInterface
     */
    function setPath($path);

    /**
     * Return the parent term of this term, if it is hierarchical. If it is the root, the containing Taxonomy class is
     * returned. Null is returned if it is not hierarchical.
     *
     * @return mixed
     */
    function getParent();
}
