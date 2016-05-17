<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;

class StudentGeneratePathService
{
    /**
     * @var UniquePathFinderService
     */
    protected $uniquePathFinder;

    /**
     * @var EntityManager
     */
    private $_em;

    /**
     * @param UniquePathFinderService $uniquePathFinder
     * @param EntityManager $em
     */
    public function __construct(UniquePathFinderService $uniquePathFinder, EntityManager $em)
    {
        $this->uniquePathFinder = $uniquePathFinder;
        $this->_em = $em;
    }

    public function generate()
    {
        $batchSize = 250;
        $i = 0;
        $paths = [];
        $q = $this->_em->createQuery('select s from AppBundle\Entity\Student s');
        $iterableResult = $q->iterate();
        foreach ($iterableResult as $row) {
            $student = $row[0];
            $student->setPath(
                $this->uniquePathFinder->getUniquePath(
                    $student->getName(),
                    $paths
                )
            );
            if (($i % $batchSize) === 0) {
                $this->_em->flush(); // Executes all updates.
                $this->_em->clear(); // Detaches all objects from Doctrine!
            }
            ++$i;
        }
        $this->_em->flush();
    }
}
