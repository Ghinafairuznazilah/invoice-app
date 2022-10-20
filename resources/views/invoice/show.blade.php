<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Page | Detail Invoice</title>
  </head>
  <body>
    <div class="container">
        <h3 class="mt-4 mb-4">INVOICE</h3>

        @if ($invoices[0]->status === "Unpaid")
        <h3 class="text-center" style="background-color: red">Status : {{ $invoices[0]->status }} </h3>
        @else
        <h3 class="text-center" style="background-color: green">Status : {{ $invoices[0]->status }} </h3>
        @endif
        
        <div class="card">
            <div class="row mb-4">
                <div class="col-md-8">
                    <h4>Invoice ID :  {{ $invoices[0]->id }}</h4>
                    <h4>Issue Date : {{ $invoices[0]->created_at }}</h4>
                    <h4>Due Date : {{ $invoices[0]->updated_at }}</h4>
                    <h4>Subject : {{ $invoices[0]->subject }}</h4>
                </div>
                <div class="col-md-4">
                    <h4>From : {{ $invoices[0]->dari }} <br> Jakarta</h4>
                    <h4>For : {{ $invoices[0]->CompanyName }} <br> {{ $invoices[0]->address  }}</h4>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-8">
                    <div class="table-responsive col-lg-10">
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th scope="col">Item Type</th>
                              <th scope="col">Description</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Unit Price</th>
                              <th scope="col">Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($invoices as $i)
                            <tr>
                                <td>{{ $i->item_type }}</td>
                                <td>{{ $i->description }}</td>
                                <td>{{ $i->quantity }}</td>
                                <td>{{ $i->price }}</td>
                                <td>
                                  <?php 
                                  $quantity = $i->quantity;
                                  $price = $i->price;
                                  $amount = (int)($quantity*$price);
                                  echo $amount;
                                  ?>
                                </td>
                            </tr>
                            @endforeach  
                           
                            
                          </tbody>
                        </table>
                    
                      </div>
                </div>
            </div>

            <div class="row mb-4">
                <p>Subtotal : {{ $total }}</p>
                <p>Tax : <?php 
                $tax = ($total*0.01);
                echo $tax
                ?>
                </p>
                <p>Payments :  <?php 
                  $tax = ($total*0.01);
                  $payments = $tax+$total;
                  echo $payments


                  ?> </p>
                <p>Amount due :
                  <?php 
                  $tax = ($total*0.01);
                  $payments = $tax+$total;
                  echo $payments


                  ?>
                </p>
            </div>
       
            
        </div>
       
        

    </div>
    




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

    
  </body>
</html>