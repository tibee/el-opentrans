<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Payment;

use DateTimeInterface;
use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Account;
use Naugrim\OpenTrans\Nodes\BankAccount;
use Naugrim\OpenTrans\Nodes\BankCode;

class Payment implements NodeInterface
{
    /**
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Payment\Card")
     * @Serializer\SerializedName("CARD")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Card|null
     */
    private $card;

    /**
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\Account>")
     * @Serializer\XmlList(entry = "ACCOUNT", inline = true)
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Account[]|null
     */
    private $accounts;

    /**
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("CASH")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var bool|null
     */
    private $cash;

    /**
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("DEBIT")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var bool|null
     */
    private $debit;

    /**
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("CHECK")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var bool|null
     */
    private $check;

    /**
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("CENTRAL_REGULATION")
     *
     * @var bool|null
     */
    private $centralRegulation;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\Payment\PaymentTerms")
     * @Serializer\SerializedName("PAYMENT_TERMS")
     *
     * @var PaymentTerms
     */
    private $paymentTerms;

    public static function createCardPayment(
        string $cartType,
        string $cardNumber,
        string $cardHolder,
        DateTimeInterface $expDate
    ): self {
        return (new self())->setCard(Card::create($cartType, $cardNumber, $cardHolder, $expDate));
    }

    public static function createCashPayment(): self
    {
        return (new self())->setCash(true);
    }

    public static function createDebitPayment(): self
    {
        return (new self())->setDebit(true);
    }

    public static function createCheckPayment(): self
    {
        return (new self())->setCheck(true);
    }

    public static function createIbanPayment(
        string $iban,
        string $accountHolder,
        string $bankName,
        string $bic,
        string $country
    ): self {
        $bankAccount = new BankAccount();
        $bankAccount->setType(BankAccount::TYPE_IBAN);
        $bankAccount->setValue($iban);

        $bankCode = new BankCode();
        $bankCode->setType(BankCode::TYPE_BIC);
        $bankCode->setValue($bic);

        return (new self())->addAccount(
            (new Account())
                ->setBankAccount($bankAccount)
                ->setHolder($accountHolder)
                ->setBankName($bankName)
                ->setBankCode($bankCode)
                ->setBankCountry($country)
        );
    }

    public function getCard(): ?Card
    {
        return $this->card;
    }

    public function setCard(Card $card): self
    {
        $this->card = $card;
        $this->check = $this->debit = $this->cash = $this->accounts = null;

        return $this;
    }

    /**
     * @return Account[]
     */
    public function getAccounts(): ?array
    {
        return $this->accounts;
    }

    /**
     * @param Account[] $accounts
     *
     * @return $this
     */
    public function setAccounts(array $accounts): self
    {
        if (empty($accounts)) {
            return $this;
        }

        foreach ($accounts as $account) {
            if (! $account instanceof Account) {
                /** @var Account $account */
                $account = NodeBuilder::fromArray($account, new Account());
            }
            $this->addAccount($account);
        }

        return $this;
    }

    public function addAccount(Account $account): self
    {
        if ($this->accounts === null) {
            $this->accounts = [];
        }

        $this->accounts[] = $account;
        $this->cash = $this->debit = $this->check = $this->card = null;

        return $this;
    }

    public function isCash(): bool
    {
        return (bool) $this->cash;
    }

    public function setCash(bool $cash): self
    {
        $this->cash = $cash;
        $this->debit = $this->check = $this->card = $this->accounts = null;

        return $this;
    }

    public function isDebit(): bool
    {
        return (bool) $this->debit;
    }

    public function setDebit(bool $debit): self
    {
        $this->debit = $debit;
        $this->cash = $this->check = $this->accounts = $this->card = null;

        return $this;
    }

    public function isCheck(): bool
    {
        return (bool) $this->check;
    }

    public function setCheck(bool $check): self
    {
        $this->check = $check;
        $this->cash = $this->debit = $this->accounts = $this->card = null;

        return $this;
    }

    public function isCentralRegulation(): bool
    {
        return (bool) $this->centralRegulation;
    }

    public function setCentralRegulation(bool $hasCentralRegulation): self
    {
        $this->centralRegulation = $hasCentralRegulation;
        return $this;
    }

    public function getPaymentTerms(): PaymentTerms
    {
        return $this->paymentTerms;
    }

    public function setPaymentTerms(PaymentTerms $paymentTerms): self
    {
        $this->paymentTerms = $paymentTerms;
        return $this;
    }
}
