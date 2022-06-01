<?php

namespace Naugrim\OpenTrans\Tests\Nodes;

use JMS\Serializer\SerializerInterface;
use Naugrim\OpenTrans\Nodes\Order;
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

        $this->assertInstanceOf(Order\Header::class, $data->getHeader());
        $this->assertEquals(4711, $data->getHeader()->getInfo()->getId());
    }
}
