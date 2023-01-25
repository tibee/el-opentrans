<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Payment;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class PaymentTerms implements NodeInterface
{
    /**
     * @Serializer\SerializedName("PAYMENT_TERMS")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\Payment\PaymentTerm>")
     * @Serializer\XmlList(entry = "PAYMENT_TERM")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var PaymentTerm[]
     */
    private $terms;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("VALUE_DATE")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    private $valueDate;

    /**
     * @return \Naugrim\OpenTrans\Nodes\Payment\PaymentTerm[]
     */
    public function getTerms(): array
    {
        return $this->terms;
    }

    /**
     * @param array<\Naugrim\OpenTrans\Nodes\Payment\PaymentTerm> $terms
     *
     * @return $this
     */
    public function setTerms(array $terms): self
    {
        foreach ($terms as $term) {
            $this->addTerm($term);
        }

        return $this;
    }

    public function addTerm(PaymentTerm $term): self
    {
        $this->terms[] = $term;
        return $this;
    }

    public function getValueDate(): string
    {
        return $this->valueDate;
    }

    public function setValueDate(string $valueDate): self
    {
        $this->valueDate = $valueDate;
        return $this;
    }
}
