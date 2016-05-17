<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Service\UniquePathFinderService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UniquePathFinderServiceTest extends WebTestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param string $name
     * @param array $existingPaths
     * @param string $expectedPath
     */
    public function testGetUniquePath($name, $existingPaths, $expectedPath)
    {
        $uniquePathFinder = new UniquePathFinderService();
        $foundPath = $uniquePathFinder->getUniquePath($name, $existingPaths);

        $this->assertEquals($expectedPath, $foundPath);
    }

    public function dataProvider()
    {
        return [
            [
                'Alek Prohaska',
                [
                    'alek_prohaska',
                ],
                'alek_prohaska_1'
            ],
            [
                'Alek Prohaska',
                [
                    'alek_prohaska_1',
                ],
                'alek_prohaska'
            ],
            [
                'Alek Prohaska',
                [
                    'alek_prohaska',
                    'alek_prohaska_1',
                    'alek_prohaska_2',
                    'alek_prohaska_4',
                ],
                'alek_prohaska_3'
            ],
        ];
    }
}
