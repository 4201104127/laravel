<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<script src="{{ asset('js/vendor/jquery-1.11.3.min.js') }}"></script>
<div class="area-title area-title-header">
    <h2>Thanh toán PAYPAL</h2>
</div>
<div class="container">
    <div class="category-checkout col-md-8">
        <h5>Đơn hàng</h5>
    </div>
</div>
<div class="container">
    <div id="paypal-button"></div>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        paypal.Button.render({
            env: 'sandbox', // Or 'production'
            style: {
                size: 'medium',
                color: 'blue',
                shape: 'pill',
            },
            // Set up the payment:
            // 1. Add a payment callback
            payment: function(data, actions) {
                // 2. Make a request to your server
                return actions.request.post('/api/create-payment')
                    .then(function(res) {
                        // 3. Return res.id from the response
                        return res.id;
                    });
            },
            // Execute the payment:
            // 1. Add an onAuthorize callback
            onAuthorize: function(data, actions) {
                // 2. Make a request to your server
                return actions.request.post('/api/execute-payment', {
                    paymentID: data.paymentID,
                    payerID:   data.payerID
                })
                    .then(function(res) {
                        // 3. Show the buyer a confirmation message.
                        alert('Payment went through!')
                    });
            }
        }, '#paypal-button');
    </script>
{{--    <script>
        paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
                sandbox: 'AY94j126kWjE0nA_oWVdFVWP58GKb5x3DElXiOm2o5MJrfuwUunVAGKOSOz1tKrVSQvbkq5FDr3WmTqn',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
                size: 'large',
                color: 'gold',
                shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
                return actions.payment.create({
                    transactions: [{
                        amount: {
                            total: '30.11',
                            currency: 'USD',
                            details: {
                                subtotal: '30.00',
                                tax: '0.07',
                                shipping: '0.03',
                                handling_fee: '1.00',
                                shipping_discount: '-1.00',
                                insurance: '0.01'
                            }
                        },
                        description: 'The payment transaction description.',
                        custom: '90048630024435',
                        //invoice_number: '12345', Insert a unique invoice number
                        payment_options: {
                            allowed_payment_method: 'INSTANT_FUNDING_SOURCE'
                        },
                        soft_descriptor: 'ECHI5786786',
                        item_list: {
                            items: [
                                {
                                    name: 'hat',
                                    description: 'Brown hat.',
                                    quantity: '5',
                                    price: '3',
                                    tax: '0.01',
                                    sku: '1',
                                    currency: 'USD'
                                },
                                {
                                    name: 'handbag',
                                    description: 'Black handbag.',
                                    quantity: '1',
                                    price: '15',
                                    tax: '0.02',
                                    sku: 'product34',
                                    currency: 'USD'
                                }],
                            shipping_address: {
                                recipient_name: 'Brian Robinson',
                                line1: '4th Floor',
                                line2: 'Unit #34',
                                city: 'San Jose',
                                country_code: 'US',
                                postal_code: '95131',
                                phone: '011862212345678',
                                state: 'CA'
                            }
                        }
                    }],
                    note_to_payer: 'Contact us for any questions on your order.'
                });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    // Show a confirmation message to the buyer
                    window.alert('Thank you for your purchase!');
                });
            }
        }, '#paypal-button');

    </script>--}}
</div>

