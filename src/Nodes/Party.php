<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @Serializer\XmlRoot("PARTY")
 */
class Party implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\PartyId")
     * @Serializer\SerializedName("PARTY_ID")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var PartyId
     */
    protected $partyId;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\PartyRole")
     * @Serializer\SerializedName ("PARTY_ROLE")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var PartyRole
     */
    protected $partyRole;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Address")
     * @Serializer\SerializedName ("ADDRESS")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Address
     */
    protected $address;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Account")
     * @Serializer\SerializedName("ACCOUNT")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Account
     */
    protected $account;

    public function getPartyId(): PartyId
    {
        return $this->partyId;
    }

    public function setPartyId(PartyId $partyId): self
    {
        $this->partyId = $partyId;
        return $this;
    }

    public function getPartyRole(): PartyRole
    {
        return $this->partyRole;
    }

    public function setPartyRole(PartyRole $partyRole): self
    {
        $this->partyRole = $partyRole;
        return $this;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getAccount(): Account
    {
        return $this->account;
    }

    public function setAccount(Account $account): self
    {
        $this->account = $account;
        return $this;
    }
}
