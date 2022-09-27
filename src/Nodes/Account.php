<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class Account implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("HOLDER")
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $holder;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("BANK_ACCOUNT")
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\BankAccount")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var BankAccount
     */
    protected $bankAccount;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("BANK_CODE")
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\BankCode")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var BankCode
     */
    protected $bankCode;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("BANK_NAME")
     * @Serializer\Type("string")
     * @Serializer\XmlValue
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $bankName;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("BANK_COUNTRY")
     * @Serializer\Type("string")
     * @Serializer\XmlValue
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $bankCountry;

    public function getHolder(): string
    {
        return $this->holder;
    }

    public function setHolder(string $holder): self
    {
        $this->holder = $holder;
        return $this;
    }

    public function getBankAccount(): BankAccount
    {
        return $this->bankAccount;
    }

    public function setBankAccount(BankAccount $bankAccount): self
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }

    public function getBankCode(): BankCode
    {
        return $this->bankCode;
    }

    public function setBankCode(BankCode $bankCode): self
    {
        $this->bankCode = $bankCode;
        return $this;
    }

    public function getBankName(): string
    {
        return $this->bankName;
    }

    public function setBankName(string $bankName): self
    {
        $this->bankName = $bankName;
        return $this;
    }

    public function getBankCountry(): string
    {
        return $this->bankCountry;
    }

    public function setBankCountry(string $bankCountry): self
    {
        $this->bankCountry = $bankCountry;
        return $this;
    }
}
