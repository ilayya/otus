<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class Lesson1Test extends TestCase
{
    /**
     * Написать тест, который проверяет, что для уравнения x^2+1 = 0 корней нет (возвращается пустой массив)
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
     * Написать тест, который проверяет, что для уравнения x^2-1 = 0 есть два корня кратности 1 (x1=1, x2=-1)
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

        (new QuadraticEquationSolver())->solve(0, 1, 1);
    }
}