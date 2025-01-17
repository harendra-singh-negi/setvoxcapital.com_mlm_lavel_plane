<?php

namespace Srmklive\PayPal\Traits\PayPalAPI;

trait PaymentCaptures
{
    /**
     * Show details for a captured payment.
     *
     * @param string $capture_id
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.paypal.com/docs/api/payments/v2/#captures_get
     */
    public function showCapturedPaymentDetails(string $capture_id)
    {
        $this->apiEndPoint = "v2/payments/captures/{$capture_id}";

        $this->verb = 'get';

        return $this->doPayPalRequest();
    }

    /**
     * Refund a captured payment.
     *
     * @param string $capture_id
     * @param string $invoice_id
     * @param float $amount
     * @param string $note
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @throws \Throwable
     *
     * @see https://developer.paypal.com/docs/api/payments/v2/#captures_refund
     */
    public function refundCapturedPayment(string $capture_id, string $invoice_id, float $amount, string $note)
    {
        $this->apiEndPoint = "v2/payments/captures/{$capture_id}/refund";

        $this->options['json'] = [
            'amount' => [
                'value' => $amount,
                'currency_code' => $this->currency,
            ],
            'invoice_id' => $invoice_id,
            'note_to_payer' => $note,
        ];

        $this->verb = 'post';

        return $this->doPayPalRequest();
    }
}
