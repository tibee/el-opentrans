<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Payment;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

class Card implements NodeInterface
{
    use HasTypeAttribute;

    public const MASTER_CARD = 'MasterCard';

    public const VISA = 'VISA';

    public const AMERICAN_EXPRESS = 'AmericanExpress';

    public const JCB = 'JCB';

    public const MAESTRO = 'Maestro';

    public const DISCOVER_CARD = 'DiscoverCard';

    public const TRANS_CARD = 'Transcard';

    public const DINA_CARD = 'DinaCard';

    public const CHINA_UNION_PAY = 'ChinaUnionPay';

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CARD_NUM")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    private $number;

    /**
     * @Serializer\Expose
     * @Serializer\Type("DateTimeInterface<'Y-m'>")
     * @Serializer\SerializedName("CARD_EXPIRATION_DATE")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var DateTimeInterface
     */
    private $expDate;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CARD_HOLDER_NAME")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    private $holder;

    /**
     * @return $this
     *
     * @phpstan-return \Naugrim\OpenTrans\Nodes\Payment\Card
     */
    public static function create(string $type, string $number, string $holder, DateTimeInterface $expDate): self
    {
        $self = new self();
        $self
            ->setHolder($holder)
            ->setNumber($number)
            ->setExpDate($expDate)
            ->setType($type);

        return $self;
    }

    public function getHolder(): string
    {
        return $this->holder;
    }

    public function setHolder(string $holder): self
    {
        $this->holder = $holder;
        return $this;
    }

    public function getExpDate(): DateTimeInterface
    {
        return $this->expDate;
    }

    public function setExpDate(DateTimeInterface $expDate): self
    {
        $this->expDate = $expDate;
        return $this;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;
        return $this;
    }
}
