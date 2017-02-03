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

use Sikofitt\Retrorsum\Finder;

/**
 * Class FinderTest.
 */
class FinderTest extends PHPUnit_Framework_TestCase
{
    private $finder;

    public function setUp()
    {
        $this->finder = new Finder('aldkflsaf.log');
    }

    /**
     * @coversDefaultClass \Sikofitt\Retrorsum\Finder
     * @covers \Sikofitt\Retrorsum\Finder::__toString()
     * @covers \Finder::getPath()
     */
    public function testToRoot()
    {
        $this->assertEmpty((string) $this->finder);
        $this->assertEmpty($this->finder->getPath());
        $this->assertFalse($this->finder->isFound());
    }

    /**
     * @covers \Sikofitt\Retrorsum\Finder::setFile()
     */
    public function testFind()
    {
        $this->finder->setFile('composer.json');
        $this->assertSame(realpath(dirname(__DIR__)), (string) $this->finder);
        $this->assertTrue($this->finder->isFound());
    }

    public function testInitiateToString()
    {
        $finder = (string) (new Finder('composer.json'));
        $this->assertSame(realpath(dirname(__DIR__)), $finder);
    }
}
