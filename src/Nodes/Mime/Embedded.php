<?php

namespace Naugrim\OpenTrans\Nodes\Mime;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasLangAttribute;

class Embedded implements NodeInterface
{
    use HasLangAttribute;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Mime\Data")
     * @Serializer\SerializedName("MIME_DATA")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Data
     */
    protected $data;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FILE_NAME")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $fileName;

    /**
     * @Serializer\Expose
     * @Serializer\Type("int")
     * @Serializer\SerializedName("FILE_SIZE")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var int
     */
    protected $fileSize;

    /**
     * @return Data
     */
    public function getData(): Data
    {
        return $this->data;
    }

    /**
     * @param Data $data
     * @return Embedded
     */
    public function setData(Data $data): Embedded
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return Embedded
     */
    public function setFileName(string $fileName): Embedded
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return int
     */
    public function getFileSize(): int
    {
        return $this->fileSize;
    }

    /**
     * @param int $fileSize
     * @return Embedded
     */
    public function setFileSize(int $fileSize): Embedded
    {
        $this->fileSize = $fileSize;
        return $this;
    }
}
