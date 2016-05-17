<?php

namespace AppBundle\Service;

class UniquePathFinderService
{
    const SYMBOL_WHITESPACE = ' ';
    const SYMBOL_UNDERSCORE = '_';

    /**
     * @param string $name
     * @param array $existingPaths
     *
     * @return string
     */
    public function getUniquePath($name, &$existingPaths)
    {
        $i = 1;
        $name = $this->sanitizeName($name);
        $path = $name;

        while (true) {

            if (! in_array($path, $existingPaths)) {
                $existingPaths[] = $path;
                return $path;
            }

            $path = $name . self::SYMBOL_UNDERSCORE . $i++;
        }
    }

    private function sanitizeName($name)
    {
        return strtolower(
            str_replace(self::SYMBOL_WHITESPACE, self::SYMBOL_UNDERSCORE, $name)
        );
    }
}
