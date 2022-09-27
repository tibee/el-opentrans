<?php

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

    /**
     * @return PartyId
     */
    public function getPartyId(): PartyId
    {
        return $this->partyId;
    }

    /**
     * @param PartyId $partyId
     *
     * @return Party
     */
    public function setPartyId(PartyId $partyId): Party
    {
        $this->partyId = $partyId;
        return $this;
    }

    /**
     * @return PartyRole
     */
    public function getPartyRole(): PartyRole
    {
        return $this->partyRole;
    }

    /**
     * @param PartyRole $partyRole
     *
     * @return Party
     */
    public function setPartyRole(PartyRole $partyRole): Party
    {
        $this->partyRole = $partyRole;
        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return Party
     */
    public function setAddress(Address $address): Party
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return Account
     */
    public function getAccount(): Account
    {
        return $this->account;
    }

    /**
     * @param Account $account
     * @return Party
     */
    public function setAccount(Account $account): Party
    {
        $this->account = $account;
        return $this;
    }
}
