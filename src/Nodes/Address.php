<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\Crypto\PublicKey;
use Naugrim\BMEcat\Nodes\Fax;
use Naugrim\BMEcat\Nodes\Phone;
use Naugrim\OpenTrans\Nodes\Contact\Details;

class Address implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("NAME")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $name;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("NAME2")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $name2;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("NAME3")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $name3;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DEPARTMENT")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $department;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Contact\Details")
     * @Serializer\SerializedName("CONTACT_DETAILS")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Details
     */
    protected $contactDetails;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("STREET")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $street;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ZIP")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $zip;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("BOXNO")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $boxno;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ZIPBOX")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $zipbox;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CITY")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $city;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("COUNTRY")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $country;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("COUNTRY_CODED")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $countryCoded;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("VATID")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $vatId;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\Phone")
     * @Serializer\SerializedName("PHONE")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var Phone
     */
    protected $phone;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\Fax")
     * @Serializer\SerializedName("FAX")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var Fax
     */
    protected $fax;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EMAIL")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $email;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\Crypto\PublicKey")
     * @Serializer\SerializedName("PUBLIC_KEY")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var PublicKey
     */
    protected $publicKey;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("URL")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $url;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ADDRESS_REMARKS")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $addressRemarks;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getName2(): string
    {
        return $this->name2;
    }

    public function setName2(string $name2): self
    {
        $this->name2 = $name2;
        return $this;
    }

    public function getName3(): string
    {
        return $this->name3;
    }

    public function setName3(string $name3): self
    {
        $this->name3 = $name3;
        return $this;
    }

    public function getDepartment(): string
    {
        return $this->department;
    }

    public function setDepartment(string $department): self
    {
        $this->department = $department;
        return $this;
    }

    public function getContactDetails(): Details
    {
        return $this->contactDetails;
    }

    public function setContactDetails(Details $contactDetails): self
    {
        $this->contactDetails = $contactDetails;
        return $this;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;
        return $this;
    }

    public function getZip(): string
    {
        return $this->zip;
    }

    public function setZip(string $zip): self
    {
        $this->zip = $zip;
        return $this;
    }

    public function getBoxno(): string
    {
        return $this->boxno;
    }

    public function setBoxno(string $boxno): self
    {
        $this->boxno = $boxno;
        return $this;
    }

    public function getZipbox(): string
    {
        return $this->zipbox;
    }

    public function setZipbox(string $zipbox): self
    {
        $this->zipbox = $zipbox;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    public function getCountryCoded(): string
    {
        return $this->countryCoded;
    }

    public function setCountryCoded(string $countryCoded): self
    {
        $this->countryCoded = $countryCoded;
        return $this;
    }

    public function getVatId(): string
    {
        return $this->vatId;
    }

    public function setVatId(string $vatId): self
    {
        $this->vatId = $vatId;
        return $this;
    }

    public function getPhone(): Phone
    {
        return $this->phone;
    }

    public function setPhone(Phone $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function getFax(): Fax
    {
        return $this->fax;
    }

    public function setFax(Fax $fax): self
    {
        $this->fax = $fax;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPublicKey(): PublicKey
    {
        return $this->publicKey;
    }

    public function setPublicKey(PublicKey $publicKey): self
    {
        $this->publicKey = $publicKey;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getAddressRemarks(): string
    {
        return $this->addressRemarks;
    }

    public function setAddressRemarks(string $addressRemarks): self
    {
        $this->addressRemarks = $addressRemarks;
        return $this;
    }
}
