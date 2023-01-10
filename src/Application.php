<?php

namespace Strategy;

use Strategy\Cart\Item;
use Strategy\Cart\ShoppingCart;
use Strategy\Order\Order;
use Strategy\Invoice\TextInvoiceStrategy;
use Strategy\Invoice\PDFInvoiceStrategy;
use Strategy\Payments\CashOnDeliveryStrategy;
use Strategy\Payments\CreditCardStrategy;
use Strategy\Payments\PaypalPayment;

class Application
{
	public static function run()
	{
		$cart = new ShoppingCart();
		$banana = new Item('BNN', 'Banana', 'A Yellow Fruit', 100);
		$grape = new Item('GRP', 'Grape', 'A Violet fruit', 200);
		$strawberry = new Item('STB', 'Strawberry', 'A Red fruit', 250);

		$cart->addItem($banana, 5);
		$cart->addItem($grape, 3);
		$cart->addItem($strawberry, 10);

		$cart->displayItems();

		// Generate Invoice
		$order = new Order('Killian Vitug', 'killianvitug@mail.com', $cart);

		echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
		$textInvoice = new TextInvoiceStrategy();
		$order->setInvoiceGenerator($textInvoice);
		$order->generateInvoice();

		echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
		$pdfInvoice = new PDFInvoiceStrategy();
		$order->setInvoiceGenerator($textInvoice);
		$order->generateInvoice();

		echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
	

		// Payment
		echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
		$creditCard = new CreditCardStrategy('Killian Vitug', '5432-1234-1231-3234', '331', '12/24');
		$order->setPaymentMethod($creditCard);
		$order->pay();

		echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
		$paypal = new PaypalStrategy('killianvitug@email.com', 'MYSecretPassword$$$');
		$order->setPaymentMethod($paypal);
		$order->pay();

		echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
		$cod = new CashOnDeliveryStrategy('Jarel Cabiling', ' Street,  Town', 'City', 777, 'Country');
		$order->setPaymentMethod($cod);
		$order->pay();

		echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
		$cod = new CashOnDeliveryStrategy('Jarel Cabiling', ' Street,  Town', 'City', 777, 'Country');
		
		

		// Show Invoice
		$order->setInvoiceGenerator($textInvoice);
		$order->generateInvoice();

		$order->setPaymentMethod($cod);
		$order->pay();
	}
}