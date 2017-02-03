<?php

/*
 * This file is a part of Retrorsum
 * Copyright (C) 2017  https://sikofitt.com sikofitt@gmail.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Sikofitt\Retrorsum;

/**
 * Class Finder.
 * @Todo - Handle symlinks
 * @Todo - Add ability to continue after finding, like 
 *   PHP 7.0's extra parameter in dirname.
 *   Example new Finder($file, 2) would return the second 
 *   instance of $file.
 */
class Finder
{
    /**
     * @var string
     */
    private $file;

    /**
     * @var string
     */
    private $path;

    /**
     * Finder constructor.
     *
     * @param $file
     */
    public function __construct($file)
    {
        $this->file = $file;
        $this->path = realpath(__DIR__);
        $this->find();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->path;
    }

    /**
     * @param string $file
     */
    public function setFile($file)
    {
        $this->path = realpath(__DIR__);
        $this->file = $file;
        $this->find();
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return bool
     */
    public function isFound()
    {
        return false === empty($this->path);
    }

    /**
     * Finds file traversing backwards.
     * $this->path will be an empty string if it cannot find the file.
     */
    private function find()
    {
        while (false === file_exists($this->path.DIRECTORY_SEPARATOR.$this->file)) {
            $this->path .= str_replace('/', DIRECTORY_SEPARATOR, '/../');
            $this->path = realpath($this->path);
            // On windows would return {driveLetter}:\,
            // on linux it returns / That's a win win!
            if (getenv('SystemDrive').DIRECTORY_SEPARATOR === realpath($this->path)) {
                $this->path = '';
                break;
            }
        }
    }
}
