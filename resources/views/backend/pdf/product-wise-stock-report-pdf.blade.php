<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Supplier wise Stock Report PDF</title>
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
</head>
<body>
   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <table width="100%">
                   <tbody>
                       <tr>
                           <td width="25%"></td>
                           <td>
                               <span style="font-size: 20px; background: #1781BF; padding: 3px 10px 3px 10px; color: #fff">Shopping Mall</span><br>
                                    Dhaka, Bangladesh
                           </td>
                           <td>
                               <span>
                                showroom No: 01749302454 <br>
                                Owner No: 01749302454
                               </span>
                           </td>
                       </tr>
                   </tbody>
               </table>
           </div>
       </div>

       <div class="row">
           <div class="col-md-12">
            <hr style="margin-bottom: 0px;">
               <table>
                   <tbody>
                       <tr>
                           <td width="50%"></td>
                           <td><u><strong><span style="font-size: 15px">Product Wise Stock Report</span></strong></u></td>
                           <td></td>
                       </tr>
                   </tbody>
               </table>
           </div>
       </div>
       <div class="row">
           <div class="col-md-12">
            <table border="1" width="100%">
                <thead>
                @php
                    $buying_total = App\Model\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('buying_qty');
                    $selling_total = App\Model\invoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_qty');
                @endphp
                <tr>
                  <th>Supplier Name</th>
                  <th>Category</th>
                  <th>Product Name</th>
                  <th>In.Qty</th>
                  <th>Out.Qty</th>
                  <th>Stock</th>
                  <th>Unit</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                      <td>{{ $product->supplier->name }}</td>
                      <td>{{ $product->category->name }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $buying_total }}</td>
                      <td>{{ $selling_total }}</td>
                      <td>{{ $product->quantity }}</td>
                      <td>{{ $product->unit->name }}</td>
                  </tr>
                 </tbody>
              </table>
              @php
              $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
             @endphp
             <i>Printing Time : {{ $date->format('F j, Y, g:i a') }}</i>
           </div>
       </div>
       <br>
       <div class="row">
           <div class="col-md-12">
               <table border="0" width="100%">
                   <tbody>
                       <tr>
                           <td width="40%">
                            </td>
                           <td width="20%"></td>
                           <td width="40%" style="text-align: center;">
                                <p style="text-align: center; border-bottom: 1px solid #000">Owner Signature</p>
                           </td>
                       </tr>
                   </tbody>
               </table>
           </div>
       </div>
   </div>
</body>
</html>

