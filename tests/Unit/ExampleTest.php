<?php
  test('asserts true is true', function () {
    $this->assertTrue(true);

    expect(true)->toBeTrue();
  });

//namespace Tests\Unit;
//
//use PHPUnit\Framework\TestCase;
//
//class ExampleTest extends TestCase
//{
//    /**
//     * A basic test example.
//     *
//     * @return void
//     */
//    public function testBasicTest()
//    {
//        $this->assertTrue(true);
//    }
//}
