<?php

namespace Vespolina\Taxonomy\Gateway;

use Vespolina\Entity\Taxonomy\TaxonomyNodeInterface;
use Vespolina\Exception\InvalidInterfaceException;
use Vespolina\Taxonomy\Gateway\TaxonomyGateway;

class TaxonomyDoctrineORMGateway extends TaxonomyGateway
{
    protected $em;
    protected $taxonomyNodeClass;

    public function __construct($entityManager, $taxonomyNodeClass)
    {
        parent::__construct($taxonomyNodeClass, 'DoctrineMongoDB');
        $this->em = $entityManager;
    }

    public function createQuery()
    {
        return $this->em->createQueryBuilder($this->taxonomyNodeClass);
    }

    /**
     * @param \Vespolina\Entity\Taxonomy\TaxonomyNodeInterface $taxonomyNode
     */
    public function deleteTaxonomyNode(TaxonomyNodeInterface $taxonomyNode, $andFlush = false)
    {
        $this->em->remove($taxonomyNode);
    }

    protected function executeSpecification(SpecificationInterface $specification, $matchOne = false)
    {
        $queryBuilder = $this->createQuery();
        $this->getSpecificationWalker()->walk($specification, $queryBuilder);
        $query = $queryBuilder->getQuery();

        if ($matchOne) {

            return $query->getSingleResult();
        } else {

            return $query->execute();
        }
    }

    public function matchTaxonomyNode($specification)
    {
    }

    /**
     * @return \Vespolina\Entity\Taxonomy\TaxonomyNodeInterface
     */
    public function findTaxonomyNodes(SelectQueryInterface $query)
    {
    }

    /**
     * @param \Vespolina\Entity\Taxonomy\TaxonomyNodeInterface $taxonomy
     */
    public function persistTaxonomyNode(TaxonomyNodeInterface $taxonomyNode, $andFlush = false)
    {
        $this->em->persist($taxonomyNode);
        if ($andFlush) $this->flush();
    }

    /**
     * @param \Vespolina\Entity\Taxonomy\TaxonomyNodeInterface $taxonomy
     */
    public function updateTaxonomyNode(TaxonomyNodeInterface $taxonomyNode, $andFlush = false)
    {
        $level = $taxonomyNode->getLevel();

        if (null == $level) {
            $level = 0;

            if (null !== $parent = $taxonomyNode->getParent()) {
                $level = $parent->getLevel() + 1;
            }

            $rp = new \ReflectionProperty($taxonomyNode, 'level');
            $rp->setAccessible(true);
            $rp->setValue($taxonomyNode, $level);
            $rp->setAccessible(false);
        }

        $this->em->persist($taxonomyNode);
        if ($andFlush) $this->flush();
    }

    public function flush()
    {
        $this->em->flush();
    }
}
