<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contact\Details;

class ContactDetails extends Details
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CONTACT_ID")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $id;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CONTACT_NAME")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $name;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FIRST_NAME")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $firstName;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TITLE")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $title;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ACADEMIC_TITLE")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $academicTitle;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\Contact\Role")
     * @Serializer\SerializedName("CONTACT_ROLE")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $role;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CONTACT_DESCRIPTION")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $description;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\Phone")
     * @Serializer\SerializedName("PHONE")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $phone;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\Fax")
     * @Serializer\SerializedName("FAX")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.bmecat.org/bmecat/2005")
     *
     */
    protected $fax;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("URL")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $url;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\Emails")
     * @Serializer\SerializedName("EMAILS")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.bmecat.org/bmecat/2005")
     */
    protected $emails;
}
