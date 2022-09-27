<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class ShipmentPartiesReference implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\DeliveryIdRef")
     * @Serializer\SerializedName("INVOICE_RECIPIENT_IDREF")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var DeliveryIdRef
     */
    protected $deliveryIdRef;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\FinalDeliveryIdRef")
     * @Serializer\SerializedName("FINAL_DELIVERY_IDREF")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var FinalDeliveryIdRef
     */
    protected $finalDeliveryIdRef;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\DelivererIdRef")
     * @Serializer\SerializedName("DELIVERER_IDREF")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var DelivererIdRef
     */
    protected $delivererIdRef;
}
