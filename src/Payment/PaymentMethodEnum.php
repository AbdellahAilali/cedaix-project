<?php
/**
 * Created by PhpStorm.
 * User: hassane
 * Date: 15/11/18
 * Time: 13:20
 */

namespace App\Payment;


abstract class PaymentMethodEnum
{
    const METHOD_CASH = "cash";
    const METHOD_CHEQUE = "cash";
    const METHOD_CREDIT_CARD = "credit_card";

    /** @var array user friendly named type */
    protected static $methodName = [
        self::METHOD_CASH => ['fr' => 'Liquide'],
        self::METHOD_CHEQUE => ['fr' => 'Cheque'],
        self::METHOD_CREDIT_CARD => ['fr' => 'Carte de crédit'],
    ];

    /**
     * @param  string $methodShortName
     * @return string
     */
    public static function getMethodName($methodShortName, $lang)
    {
        if (!isset(static::$methodName[$methodShortName][$lang])) {
            return "Unknown type ($methodShortName) in language $lang";
        }

        return static::$methodName[$methodShortName][$lang];
    }

    public static function getAvailableMethods()
    {
        return [
            self::METHOD_CASH,
            self::METHOD_CHEQUE,
            self::METHOD_CREDIT_CARD,
        ];
    }
}
