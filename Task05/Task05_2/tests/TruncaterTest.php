<?php

namespace App;

use PHPUnit\Framework\TestCase;

class TruncaterTest extends TestCase
{
    public function testEmpty()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate(''), '');
    }

    public function testDefaultOptions()
    {
        $truncater = new Truncater();
        $this->assertSame(
            $truncater->truncate('Абрамов Антон Игоревич'),
            'Абрамов Антон Игоревич'
        );

        $truncater2 = new Truncater(['length' => 10]);
        $this->assertSame(
            $truncater2->truncate('Абрамов Антон Игоревич'),
            'Абрамов Ан...'
        );
    }

    public function testLessLength()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate(
            'Абрамов Антон Игоревич',
            ['length' => 10]
        ), 'Абрамов Ан...');
    }

    public function testLongerLength()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate(
            'Абрамов Антон Игоревич',
            ['length' => 50]
        ), 'Абрамов Антон Игоревич');
    }

    public function testNegativeLength()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate(
            'Абрамов Антон Игоревич',
            ['length' => -10]
        ), 'Абрамов Анто...');
    }

    public function testNewSeparation()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate(
            'Абрамов Антон Игоревич',
            ['length' => 10, 'separator' => '*']
        ), 'Абрамов Ан*');
    }
    public function testNewSeparationAndDefSetting()
    {
        $truncater = new Truncater();
        $this->assertSame($truncater->truncate(
            'Абрамов Антон Игоревич',
            ['separator' => '*']
        ), 'Абрамов Антон Игоревич');
    }

    public function testSettingsOverrides()
    {
        $truncater = new Truncater(['length' => 10, 'separator' => ' :)']);
        $this->assertSame(
            $truncater->truncate('Абрамов Антон Игоревич',),
            'Абрамов Ан :)'
        );
        $this->assertSame($truncater->truncate(
            'Абрамов Антон Игоревич',
            ['length' => 7, 'separator' => '*_*']
        ), 'Абрамов*_*');
        $this->assertSame(
            $truncater->truncate('Абрамов Антон Игоревич',),
            'Абрамов Ан :)'
        );
    }
}
