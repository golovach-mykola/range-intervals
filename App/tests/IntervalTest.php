<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class IntervalTest extends \PHPUnit\Framework\TestCase
{

    public $IntervalRepository;


    protected function setUp()
    {

        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'range_test',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        $capsule->setAsGlobal();

        $capsule->bootEloquent();

        $this->IntervalRepository = new \App\repositories\IntervalRepository();
    }

    /**
     * Test interval list success.
     *
     * @covers \App\repositories\IntervalRepository::getAll
     */
    public function testGetListSuccess()
    {
        $this->assertTrue(is_object($this->IntervalRepository->getAll()));
    }

    /**
     * Test push interval success.
     *
     * @covers \App\repositories\IntervalRepository::push
     */
    public function testPushSuccess()
    {
        $this->assertTrue($this->IntervalRepository->push([
            'date_start' => '2019-02-15 15:08:00',
            'date_end' => '2019-02-15 15:12:59',
            'price' => '30'
        ]));
    }
}