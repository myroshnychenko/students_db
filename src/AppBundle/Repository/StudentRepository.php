<?php

namespace AppBundle\Repository;
use Doctrine\ORM\EntityRepository;

/**
 * StudentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class StudentRepository extends EntityRepository
{
    public function getStudentIterator()
    {
        $q = $this->_em->createQuery('select s from \\AppBundle\\Entity\\Student s');
        return $q->iterate();
    }
}
