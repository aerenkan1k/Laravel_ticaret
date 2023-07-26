@extends('layout')
    
@section('content')
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">{{ __('project.product') }}</th>
            <th style="width:10%">{{ __('project.price') }}</th>
            <th style="width:8%">{{ __('project.quantity') }}</th>
            <th style="width:22%" class="text-center">{{ __('project.total_price') }}</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset('img') }}/{{ $details['photo'] }}" width="150" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                            <h4 class="nomargin">
                                @if(isset($details['product_name']))
                                    {{ $details['product_name'] }}
                                @elseif(isset($details['name']))
                                    {{ $details['name'] }}
                                @else
                                    <!-- if elseler foreache çevrilecek -->
                                @endif
                            </h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ $details['price'] }} ₺</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                    </td>
                    <td data-th="Subtotal" class="text-center">{{ $details['price'] * $details['quantity'] }} ₺</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> {{ __('project.drop') }}</button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align:right;"><h3><strong>{{ __('project.cart_total') }} {{ $total }} ₺</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align:right;">
                <form action="/session" method="POST">
                <a href="{{ url('home') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i>{{ __('project.back') }}</a>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> {{ __('project.pay') }}</button>
                </form>
            </td>
        </tr>
    </tfoot>
</table>
@endsection
    
@section('scripts')
<script type="text/javascript">
    
    $(".cart_update").change(function (e) {
        e.preventDefault();
    
        var ele = $(this);
    
        $.ajax({
            url: "{{ route('update_cart')}}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
    
    $(".cart_remove").click(function (e) {
        e.preventDefault();
    
        var ele = $(this);
    
        if(confirm("Ürünü sepetten çıkarmak istediğinize emin misiniz?")) {
            $.ajax({
                url: "{{ route('remove_from_cart')}}",
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
    
</script>
@endsection