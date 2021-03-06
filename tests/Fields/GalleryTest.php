<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Gallery;

class GalleryTest extends TestCase
{
    public function testType()
    {
        $field = Gallery::make('Gallery')->toArray();
        $this->assertSame('gallery', $field['type']);
    }

    public function testInsert()
    {
        $field = Gallery::make('Insert')->insert('prepend')->toArray();
        $this->assertSame('prepend', $field['insert']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument insert [test]');

        Gallery::make('Invalid Insert')->insert('test')->toArray();
    }

    public function testHeight()
    {
        $field = Gallery::make('Height')->height(10, 20)->toArray();
        $this->assertSame(10, $field['min_height']);
        $this->assertSame(20, $field['max_height']);
    }

    public function testWidth()
    {
        $field = Gallery::make('Width')->width(10, 20)->toArray();
        $this->assertSame(10, $field['min_width']);
        $this->assertSame(20, $field['max_width']);
    }
}
