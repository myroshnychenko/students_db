<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Student;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/students/detail/{path}", name="detail_page")
     *
     * @param Student $student
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Student $student)
    {
        $response = $this->render('default/index.html.twig', [
            'student' => $student,
            'timestamp' => new \DateTime()
        ]);

        $response->setSharedMaxAge(60);

        return $response;
    }
}
