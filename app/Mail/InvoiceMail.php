<?php

namespace App\Mail;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoice,$lessor,$company,$symbol,$cheque,$unit_ref,$due_amt,$amt_paid,$total_amt,$tax_amt)
    {
        $this->invoice=$invoice;
        $this->company=$company;
        $this->lessor=$lessor;
        $this->symbol=$symbol;
        $this->cheque=$cheque;
        $this->unit_ref=$unit_ref;
        $this->due_amt=$due_amt;
        $this->amt_paid=$amt_paid;
        $this->total_amt=$total_amt;
        $this->tax_amt = $tax_amt;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Invoice Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'admin.invoice.invoice_details',
            with: [
                'invoice' => $this->invoice,
                'company'=>$this->company,
                'lessor'=>$this->lessor,
                'symbol'=>$this->symbol,
                'cheque'=>$this->cheque,
                'unit_ref'=>$this->unit_ref,
                'due_amt'=>$this->due_amt,
                'amt_paid'=>$this->amt_paid,
                'total_amt'=>$this->total_amt,
                'tax_amt'=>$this->tax_amt,
            ],

        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
