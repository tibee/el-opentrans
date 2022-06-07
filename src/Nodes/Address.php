<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;

class Address extends \Naugrim\BMEcat\Nodes\Address
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("NAME")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $name;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("NAME2")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $name2;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("NAME3")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $name3;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DEPARTMENT")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $department;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\Contact\Details")
     * @Serializer\SerializedName("CONTACT_DETAILS")
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\ContactDetails")
     */
    protected $contactDetails;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("STREET")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $street;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ZIP")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $zip;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("BOXNO")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $boxno;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ZIPBOX")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $zipbox;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CITY")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $city;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("COUNTRY")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $country;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("COUNTRY_CODED")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $countryCoded;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("VATID")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $vatId;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\Phone")
     * @Serializer\SerializedName("PHONE")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $phone;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\Fax")
     * @Serializer\SerializedName("FAX")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $fax;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EMAIL")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $email;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\Crypto\PublicKey")
     * @Serializer\SerializedName("PUBLIC_KEY")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $publicKey;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("URL")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $url;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ADDRESS_REMARKS")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $addressRemarks;
}
