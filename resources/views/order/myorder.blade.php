@include('order.myorderstyle')


<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="p-2">
                <h4>My carts</h4>
                {{-- <div class="d-flex flex-row align-items-center pull-right"><span class="mr-1">Sort by:</span><span class="mr-1 font-weight-bold">Price</span><i class="fa fa-angle-down"></i></div> --}}
            </div>

            @forelse ($clothes as $cloth)
                <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                    <div class="mr-1"><img class="rounded"
                            src="/storage/cloth-image/{{ $cloth->image }}" width="70"></div>
                    <div class="d-flex flex-column align-items-center product-details"><span
                            class="font-weight-bold">{{ $cloth->name }}</span>
                        <div class="d-flex flex-row product-desc">
                            {{-- <div class="size mr-1"><span style="color:red;font-weight:bolder">Quantity:</span><span class="font-weight-bold">&nbsp;</span></div> --}}
                            <div class="color"><span style="color:red;font-weight:bolder">fabric:</span><span
                                    class="font-weight-bold">&nbsp;{{ $cloth->cart->category->name }}</span></div>

                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center qty">
                        <h5 style="color:red;font-weight:bolder" class=" mt-1 mr-1 ml-1">{{ $cloth->cart->quantity }}
                        </h5>
                    </div>
                    <div>
                        @if ($is_membership)
                            <h5 style="color:rgb(111, 111, 220);font-weight:bolder">Rs
                                {{ $cloth->price * $cloth->cart->quantity - $cloth->price * $cloth->cart->quantity * (20 / 100) }}
                            </h5>
                        @else
                            <h5 style="color:rgb(111, 111, 220);font-weight:bolder">Rs
                                {{ $cloth->price * $cloth->cart->quantity }}</h5>
                        @endif
                    </div>
                    <div class="d-flex align-items-center">

                        <form action="{{ route('removeCart', $cloth->cart->id) }}" method="POST">
                            @csrf

                            <button onclick="return confirm('Are you sure you want to delete this item?');"
                                class="btn btn-outline-danger btn-sm" type="submit" title="Delete">
                                <i class="fa fa-trash mb-1 text-danger"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <td>No item </td>
            @endforelse

            <div class="d-flex flex-row float-right mt-4 p-1 mb-2 bg-dark rounded"><button
                    class="btn btn-warning btn-sm ml-2 mb-3 pay-button" type="button"> <a
                        href="{{ route('welcome') }}" style="color:rgb(200, 33, 111);font-gray:bolder">Back To
                        Shop</a>
                </button>

                <button class="btn-sm ml-3 mb-3 pay-button" style="background: #39075c" id="payment-button"
                    type="button">Pay
                    with Khalti</button>

                <form action="https://uat.esewa.com.np/epay/main" method="POST">
                    @foreach ($clothes as $cloth)
                        <input value="100" name="tAmt" type="hidden">
                        <input value="90" name="amt" type="hidden">
                        <input value="5" name="txAmt" type="hidden">
                        <input value="2" name="psc" type="hidden">
                        <input value="3" name="pdc" type="hidden">
                        <input value="EPAYTEST" name="scd" type="hidden">
                        <input value="125478343" name="pid" type="hidden">
                        <input value="http://esewa.test/payment-verify?q=su" type="hidden" name="su">
                    @endforeach
                    <input value="http://merchant.com.np/page/esewa_payment_failed?q=fu" type="hidden" name="fu">
                    <button class="btn-sm ml-2 pay-button" style="background: #16d80c" id="payment-button"
                        type="submit">Pay
                        with Esewa</button>
                </form>
                <form action="{{ route('cashstore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @foreach ($clothes as $cloth)
                        <input type="hidden" name="cloth_id" value="{{ $cloth->id }}">
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <input type="hidden" name="quantity" value="{{ $cloth->cart->quantity }}">
                        @if ($is_membership)
                            <input type="hidden" name="price"
                                value="{{ $cloth->price * $cloth->cart->quantity - $cloth->price * $cloth->cart->quantity * (20 / 100) }}">
                        @else
                            <input type="hidden" name="price" value="{{ $cloth->price * $cloth->cart->quantity }}">
                        @endif
                    @endforeach
                    <button class="btn-sm ml-2 pay-button" style="background: #ea0436" id="payment-button"
                        type="submit">Pay
                        With Cash</button>
                </form>

            </div>



        </div>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
<script>
    var config = {
        // replace the publicKey with yours
        "publicKey": "test_public_key_dc74e0fd57cb46cd93832aee0a390234",
        "productIdentity": "1234567890",
        "productName": "Dragon",
        "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
        "paymentPreference": [
            "KHALTI",

        ],
        "eventHandler": {
            onSuccess(payload) {
                // hit merchant api for initiating verfication
                console.log(payload);
            },
            onError(error) {
                console.log(error);
            },
            onClose() {
                console.log('widget is closing');
            }
        }
    };

    var checkout = new KhaltiCheckout(config);
    var btn = document.getElementById("payment-button");
    btn.onclick = function() {
        // minimum transaction amount must be 10, i.e 1000 in paisa.
        checkout.show({
            amount: 1000
        });
    }
</script>
