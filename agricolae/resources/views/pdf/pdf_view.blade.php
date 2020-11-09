<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@lang('messages.order_receipt')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>

  <img src="{{ public_path('storage/various_images/Logo-Agricolae.png') }}" alt="Logo" style="width: 500px;">

  <h1 class="page-header mt-4">
    <small>@lang('messages.order_receipt')</small>
  </h1>
  <h5 class="page-header mt-4">
    <small>@lang('messages.order_number') {{ $data['order']->getId() }}</small>
  </h5>

  <table class="table table-bordered">
    <thead>
      <tr class="table-success">
        <td><small>@lang('messages.product_name')</small></td>
        <td><small>@lang('messages.product_description')</small></td>
        <td><small>@lang('messages.product_category')</small></td>
        <td><small>@lang('messages.product_price')</small></td>
        <td><small>@lang('messages.quantity')</small></td>
        <td><small>@lang('messages.total-sub-price')</small></td>
      </tr>
    </thead>
    <tbody>
      @foreach ($data['items'] as $item)
      <tr>
        <td><small>{{ $item->product->getName() }}</small></td>
        <td><small>{{ $item->product->getDescription() }}</small></td>
        <td><small>@lang('messages.' . $item->product->getCategory())</small></td>
        <td><small>${{ $item->product->getPrice() }}</small></td>
        <td><small>{{ $item->getQuantity() }}</small></td>
        <td><small>${{ $item->getQuantity()*$item->product->getPrice() }}</small></td>
      </tr>
      @endforeach
    </tbody>
    
  </table>
  <h5 class="page-header mt-4">
    <small>@lang('messages.total-price'): ${{ $data['order']->getTotal() }}</small>
  </h5>
</body>

</html>