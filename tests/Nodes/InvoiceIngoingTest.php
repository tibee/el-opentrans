<?php

namespace Naugrim\OpenTrans\Tests\Nodes;

use JMS\Serializer\SerializerInterface;
use Naugrim\OpenTrans\Nodes\Invoice;
use Naugrim\OpenTrans\Nodes\Order;
use PHPUnit\Framework\TestCase;
use JMS\Serializer\SerializerBuilder;

class InvoiceIngoingTest extends TestCase
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    protected function setUp(): void
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    public function testIngoingInvoice(): void
    {
        $xml = file_get_contents(__DIR__ . '/../assets/example_andavis_invoice.xml');

        $data = $this->serializer->deserialize($xml, Invoice::class, 'xml');

        $this->assertInstanceOf(Invoice::class, $data);

        $this->assertEquals('R1000', $data->getHeader()->getInfo()->getId());
    }
}
