<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\Crypto\PublicKey;

class Emails implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EMAIL")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $email = '';

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("bme:PUBLIC_KEY")
     * @Serializer\Type("array<Naugrim\BMEcat\Nodes\Crypto\PublicKey>")
     * @Serializer\XmlList(inline = "true")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var PublicKey[]
     */
    protected $publicKeys = [];

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return PublicKey[]
     */
    public function getPublicKeys(): array
    {
        return $this->publicKeys;
    }

    /**
     * @param PublicKey[] $publicKeys
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setPublicKeys(array $publicKeys): self
    {
        $this->publicKeys = [];
        foreach ($publicKeys as $publicKey) {
            if (! $publicKey instanceof PublicKey) {
                /** @var PublicKey $publicKey */
                $publicKey = NodeBuilder::fromArray((array) $publicKey, new PublicKey());
            }
            $this->addPublicKey($publicKey);
        }
        return $this;
    }

    public function addPublicKey(PublicKey $publicKey): self
    {
        $this->publicKeys[] = $publicKey;
        return $this;
    }
}
