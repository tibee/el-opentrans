<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\DispatchNotification;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Package;

class LogisticDetails implements NodeInterface
{

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("PACKAGE_INFO")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\Package>")
     * @Serializer\XmlList(entry = "PACKAGE")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Package[]
     */
    protected $packageInfo = [];
  

}
