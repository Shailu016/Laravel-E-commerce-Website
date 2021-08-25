@component('mail::message')
Order placed successfully!


<span  class="note ">
    <div style="border:2px solid whitesmoke; width:400px; margin-left:50px;">
    <strong style="margin-left:150px;">Recipt</strong>
    <p style="margin-left:20px;">OrderId- {{ $order->id }}</p>
    <p style="margin-left:20px;">PaymentMethod- {{ $order->payment_method }}</p>
    <p style="margin-left:20px;">DeliveryAddress- {{ $order->delivery_address }}</p>
    <p style="margin-left:20px;">Order_at- {{ $order->created_at }}</h3>
    
</div> 
        </span>




{{ config('app.name') }}
@endcomponent
