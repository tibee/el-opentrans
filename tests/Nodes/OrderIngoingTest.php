<?php

namespace Naugrim\OpenTrans\Tests\Nodes;

use JMS\Serializer\SerializerInterface;
use Naugrim\BMEcat\Exception\SchemaValidationException;
use Naugrim\OpenTrans\Nodes\Order;
use Naugrim\OpenTrans\SchemaValidator;
use PHPUnit\Framework\TestCase;
use JMS\Serializer\SerializerBuilder;

class OrderIngoingTest extends TestCase
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    protected function setUp(): void
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    public function testIngoingOrder(): void
    {
        $xml = file_get_contents(__DIR__ . '/../assets/example_andavis_order.xml');

        $data = $this->serializer->deserialize($xml, Order::class, 'xml');

        $this->assertInstanceOf(Order::class, $data);

        $this->assertInstanceOf(Order\OrderHeader::class, $data->getOrderHeader());
        try {
            $this->assertTrue(SchemaValidator::isValid($xml, '2.1'));
        } catch (SchemaValidationException $exception) {
            echo $exception->__toString();
        }

        $this->assertEquals(4711, $data->getOrderHeader()->getOrderInfo()->getOrderId());
    }
}
