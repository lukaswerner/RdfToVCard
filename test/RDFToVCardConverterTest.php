<?php
namespace Prototype;

use Sabre\VObject;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-11-19 at 10:14:37.
 */
class RDFToVCardConverterTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var RDFToVCardConverter
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new RDFToVCardConverter;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers Prototype\RDFToVCardConverter::convert
     * @todo   Implement testConvert().
     */
    public function testConvert() {
        $this->NAttribute();
        $this->FNAttribute();
    }
    
    public function FNAttribute() {
        $vcard = new VObject\Component\VCard();
        $vcard->add('FN', 'Lukas Werner');
        $contact = new ContactInformation();
        $contact->setFullname('Lukas Werner');
        $this->assertEquals($vcard->serialize(), $this->object->convert($contact)->serialize());
    }
    
    public function NAttribute() {
        $vcard = new VObject\Component\VCard();
        $vcard->add('N', ['Werner', 'Lukas', ['Roland', 'Thomas', 'Alfred', 'Joseph'], 'B.Sc.', 'Informatik']);
        $contact = new ContactInformation();
        $contact->setLastname('Werner');
        $contact->setFirstname('Lukas');
        $contact->setAdditionalNames(['Roland', 'Thomas', 'Alfred', 'Joseph']);
        $contact->setHonorificPrefixes('B.Sc.');
        $contact->setHonorificSuffixes('Informatik');
        $this->assertEquals($vcard->serialize(), $this->object->convert($contact)->serialize());
    }

}