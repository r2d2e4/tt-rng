<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class RNGTest extends TestCase
{
    public function testRng()
    {
        $rng = new RNG();

        $clientSeed = 'lucky';
        $serverSeed = 'myverysecretseed';
        $nonce = 777;

        $expected = [
            0.58171380846761,
            0.81263402313925,
            0.45119149517268,
            0.94509777566418,
            0.96199777116999,
            0.36743924533948,
            0.022865142207593,
            0.3972706287168,
            0.34069796930999,
            0.19673975510523,
            0.03213173779659,
            0.80251516867429,
            0.4324490390718,
            0.35716894757934,
            0.65123346471228,
            0.20855146087706,
            0.005621484015137,
            0.087673835922033,
            0.27721287868917,
            0.42527134506963,
            0.24142302037217,
            0.11580226081423,
            0.59903156058863,
            0.069140405626968,
            0.89238416287117,
            0.79271626798436,
            0.95573784247972,
            0.29909811029211,
            0.37528795097023,
            0.41593954968266,
            0.49302719417028,
            0.8685344690457,
            0.70473477011546,
            0.97833195608109,
            0.71384990378283,
            0.61965396720916,
            0.62927423557267,
            0.72229878534563,
            0.50869268365204,
            0.13720801053569,
            0.34510680194944
        ];

        $actual = $rng->generateFloats($serverSeed, $clientSeed, $nonce, count($expected));

        $this->assertCount(count($expected), $actual);

        foreach ($expected as $key => $expectedValue) {
            $isEqual = bccomp((string) $expectedValue, (string) $actual[$key], 16) == 0;
            $this->assertTrue($isEqual, "$expectedValue\nand\n$actual[$key] for $key iteration is not equal");
        }
    }
}