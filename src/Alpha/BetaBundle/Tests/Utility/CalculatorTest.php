<?php

namespace Alpha\BetaBundle\Utility;

//http://keiruaprod.fr/symblog-fr/docs/tests-unitaires-et-fonctionels-phpunit.html
//http://www.elao.com/blog/developpement/a-la-decouverte-de-symfony-2-tests-unitaires-sur-le-modele-phpunit-et-doctrine-2.html    
//http://symfony.com/doc/current/cookbook/testing/doctrine.html

class CalculatorTest extends \PHPUnit_Framework_TestCase {

    /**
    * @var \Doctrine\ORM\EntityManager
    */
    private $em;
    
    public function setUp()
    {
//        $kernel = static::createKernel();
//        $kernel->boot();
//        $this->em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
    }
    
    
//
//    public function __construct() {
//        $kernel = new AppKernel('dev', true);
//        $kernel->boot();
//        $this->em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
//    }
//
//    /**
//     * Enter description here ...
//     * @return \Doctrine\ORM\EntityManager
//     */
//    protected function getEntityManager() {
//        return $this->em;
//    }

    public function testAdd() {
        print __METHOD__ . "\n";
        $my = null;
        $nb1 = 2;
        $nb2 = 5;
        $obj1 = new \stdClass();
        $obj1->nom = "Boyer";
        $array1 = Array();
        $ch =  '';
        $bool = true;
        $xml = new \DOMElement('foo');
        $xml2 = new \DOMElement('bar');
//        $GLOBALS['foo'] = 'bar';
        
//        $this->assertEqualXMLStructure($xml, $xml2);
//        $this->assertContains($obj1, "Boyer");
//        $wrap = "*****************************************************************";
//        $this->expectOutputString($wrap);
//        print $wrap;
        
        $this->assertEmpty($ch);
        $this->assertGreaterThan($nb1,$nb2); //assertGreaterThanOrEqual //assertLessThan
        $this->assertInternalType('integer', $nb1);
        $this->assertNull($my);
        $this->assertSame('200', '200');
        
        
//        $this->markTestSkipped(
//        'The MySQLi extension is not available.'
//        );
        
        
        // Optional: Test anything here, if you want.
//        $this->assertTrue(TRUE, 'This should already work.');
        // Stop here and mark this test as incomplete.
//        $this->markTestIncomplete(
//        'This test has not been implemented yet.'
//        );
//        $this->assertXmlStringEqualsXmlString('<foo><bar/></foo>', '<foo><bar/></foo>');
        // Optional: Test anything here, if you want.
        $this->assertTrue(TRUE, 'This should already work.');

//        $this->assertStringMatchesFormatFile(__DIR__.'/file1.yml', 'yml');
//        $this->assertRegExp('/def$/', 'abcdef');
//        $this->assertInstanceOf('stdClass', $obj1);
//        $this->assertContainsOnly('array', $array1);
//        $this->assertObjectHasAttribute('nom', $obj1);
//        $this->assertArrayHasKey('foo', array('bar' => 'baz', 'foo'=>'ok'));
//        $this->assertTrue($bool);
        return $obj1;
    }

    /**
     * @depends testAdd
     */
    public function testNewAdd(\stdClass $obj1) {
        $obj2 = new \stdClass();
        $obj2->nom = "Boyer";
        $this->assertEquals($obj1, $obj2);
        return $obj2;
    }
    
//    
//    /**
//    * @assert (0, 0) == 5
//    */
//    public function add($a, $b)
//    {
//    return $a + $b;
//    }

    /**
     * @depends testAdd
     */
    public function testNewAdd2(\stdClass $obj2) {
        $obj3 = new \stdClass();
        $obj3->nom = "Yeboss";
//        $this->assertEquals($obj3, $obj2);
    }

//    /**
//     * @expectedException InvalidArgumentException
//     * Lance un exeption (voir config) -- RunTime, LogicException...
//     */
//    public function testException() {
//        
//    }
    
//    
//    /**
//    * @expectedException PHPUnit_Framework_Error
//     * Exclu une Type Error PHP: Warning, Fatal..
//    */
//    public function testExceptionHasRightMessage()
//    {
//     include 'not_existing_file.php';
//    }
    
    
//
//    public function testQuery() {
//        $query = $em->createQuery('SELECT COUNT(te.id) FROM \Alpha\BetaBundle\Entity\Test te');
//        $count = $query->getSingleScalarResult();
//
//        $this->assertEquals($count, 1) ;
//    }
}

?>
