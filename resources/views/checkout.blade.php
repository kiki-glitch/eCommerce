 @extends('layout')

 <x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Checkout
         </h2>
     </x-slot>

     {{-- {{ url('create-post') }} --}}
     {{-- <form action="#" method="POST" enctype="multipart/form-data"> --}}
     {{-- @csrf --}}
     <div class="checkout_container">
         <div class="py-12">
             <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                 <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                     <div class="p-6 bg-white border-b border-gray-200">
                         <div class="flex flex-wrap -mx-1 overflow-hidden sm:-mx-px lg:-mx-3">
                             {{-- //ITEMS IN CART --}}
                             <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-px sm:px-px lg:my-3 lg:px-3 lg:w-1/2">
                                 <table class="divide-y divide-gray-200 border-b border gray-200 sm:rounded-lg">
                                     <thead class="bg-gray-50">
                                         <tr>
                                             <th scope="col"
                                                 class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                 Quantity
                                             </th>
                                             <th scope="col"
                                                 class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                 Name
                                             </th>
                                             <th scope="col"
                                                 class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                 Total Cost
                                             </th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @php $total = 0 @endphp
                                         @if (session('cart'))
                                             @foreach (session('cart') as $id => $details)
                                                 @php $total += $details['price'] * $details['quantity'] @endphp
                                                 <tr data-id="{{ $id }}">
                                                     <th scope="col" data-th="Quantity" name="quantity"
                                                         class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                         {{ $details['quantity'] }}X
                                                     </th>
                                                     <th scope="col" data-th="Product"
                                                         class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                         {{ $details['name'] }}
                                                     </th>
                                                     <th scope="col" data-th="Subtotal"
                                                         class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                         {{ $details['price'] * $details['quantity'] }}
                                                     </th>
                                                 </tr>
                                             @endforeach
                                         @endif
                                     </tbody>
                                 </table>
                                 <div style="padding-top:40px">
                                     <table class="divide-y divide-gray-200 border-b border gray-200 sm:rounded-lg">
                                         <thead class="bg-gray-50">
                                             <tr>
                                                 <th scope="col"
                                                     class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                     Total Cost
                                                 </th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                 <th scope="col"
                                                     class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                     Ksh. {{ $total }}
                                                 </th>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>

                             {{-- //DELIVERY LOCATION --}}
                             <div class="my-1 px-1 w-1/3 overflow-hidden sm:my-px sm:px-px lg:my-3 lg:px-3 lg:w-1/2">
                                 <table class="divide-y divide-gray-200 border-b border gray-200 sm:rounded-lg">
                                     <thead class="bg-gray-50">
                                         <tr>
                                             <th scope="col"
                                                 class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                 Delivery Location
                                             </th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <tr>
                                             <th scope="col"
                                                 class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                 Latitude: -1.311528 / S 1° 18' 41.5'' <br>
                                                 Longitude: 36.815514 / E 36° 48' 55.848'' <br>
                                                 Strathmore University, Ole Sangale Link Road, Nairobi, P. O. BOX
                                                 41362,
                                                 Kenya
                                                 <div class="change_location" style="padding: 15px">
                                                     <x-nav-link :href="route('dashboard')"
                                                         :active="request()->routeIs('#')">
                                                         <i style="color: black; padding-right:5px"
                                                             class='bx bx-map-alt trick_icon'></i>
                                                         {{ __('Change Location') }}
                                                     </x-nav-link>
                                                 </div>
                                             </th>
                                         </tr>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                         <div class="empty_cart">
                             <button class="btn btn-success checkout_button" id="checkout_button">
                                 Complete Order
                             </button>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     {{-- </form> --}}
 </x-app-layout>

 @section('scripts')
     <script type="text/javascript">
         $("#checkout_button").change(function(e) {
             e.preventDefault();

             alert("Hello World!");

         });
     </script>
 @endsection

 {{-- //  document.getElementById("checkout_button").addEventListener("click", function() {
 //      alert("Hello World!");
     
 //  }); --}}
 {{-- //  var ele = $(this);
                //  $.ajax({
            //      url: '{{ route('update.cart') }}',
            //      method: "patch",
            //      data: {
            //          _token: '{{ csrf_token() }}',
            //          id: ele.parents("tr").attr("data-id"),
            //          quantity: ele.parents("tr").find(".quantity").val()
            //      },
            //      success: function(response) {
            //          window.location.reload();
            //      }
            //  }); --}}
