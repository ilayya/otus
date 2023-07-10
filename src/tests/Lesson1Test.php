<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class Lesson1Test extends TestCase
{
    /**
     * Тест, который проверяет, что для уравнения x^2+1 = 0 корней нет,
     *
     * php -d memory_limit=2048M vendor/phpunit/phpunit/phpunit src/tests/Lesson1Test.php
     * @return void
     */
    public function testOne(): void
    {
        $results = (new QuadraticEquationSolver())->solve(1, 0, 1);

        $this->assertEquals([], $results);
    }

    /**
     * Тест, который проверяет, что для уравнения x^2-1 = 0 есть два корня кратности 1
     *
     * @return void
     */
    public function testTwo(): void
    {
        $results = (new QuadraticEquationSolver())->solve(1, 0, -1);

        $this->assertCount(2, $results);
        $this->assertEqualsWithDelta(1, $results[0], PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(-1, $results[1], PHP_FLOAT_EPSILON);
    }

    /**
     * Написать тест, который проверяет, что для уравнения x^2+2x+1 = 0 есть один корень кратности 2 (x1= x2 = -1).
     *
     * @return void
     */
    public function testThree(): void
    {
        $results = (new QuadraticEquationSolver())->solve(1, 2, 1);

        $this->assertCount(1, $results);
        $this->assertEqualsWithDelta(-1, $results[0], PHP_FLOAT_EPSILON);
    }

    /**
     * Написать тест, который проверяет, что коэффициент a не может быть равен 0.
     * В этом случае solve выбрасывает исключение
     *
     * @return void
     */
    public function testFour(): void
    {
        $this->expectException(RuntimeException::class);

        (new QuadraticEquationSolver())->solve(0.0, 1, 1);
    }

    /**
     * a - половина от эпсилона
     *
     * @return void
     */
    public function testFive(): void
    {
        $this->expectException(RuntimeException::class);

        $a = PHP_FLOAT_EPSILON / 2;

        (new QuadraticEquationSolver())->solve($a, 1, 1);
    }

    public function testSix(): void
    {
        $this->expectException(TypeError::class);

       (new QuadraticEquationSolver())->solve(INF, 1, 0);
    }

    public function testSeven(): void
    {
        $this->expectException(TypeError::class);

       (new QuadraticEquationSolver())->solve(NAN, 1, 0);
    }

    public function testEight(): void
    {
        $this->expectException(TypeError::class);

       (new QuadraticEquationSolver())->solve(1, INF, 0);
    }

    public function testNine(): void
    {
        $this->expectException(TypeError::class);

       (new QuadraticEquationSolver())->solve(1, NAN, 0);
    }

    public function testTen(): void
    {
        $this->expectException(TypeError::class);

        (new QuadraticEquationSolver())->solve(1, 1, INF);
    }

    public function testEleven(): void
    {
        $this->expectException(TypeError::class);

        (new QuadraticEquationSolver())->solve(1, 1, NAN);
    }
}