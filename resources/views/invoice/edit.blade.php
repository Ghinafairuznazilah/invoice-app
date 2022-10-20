<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <title>Page | Update Invoice</title>
  </head>
  <body>
    <div class="container">
        <h3 class="mt-4 mb-4">INVOICE</h3>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

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

            {{-- <div class="row">
              <div class="col-md-4">
                <button type="button" class="button btn-warning editbtn btn-sm m-1 mb-2"value="{{$invoices[0]->id}}" >Edit</button>
              </div>
            </div> --}}


            @foreach($invoices as $i)
            
            <div class="row">
              <form action="{{route('detail-invoice.update', $i->id)}}" method="POST" >
                @csrf
                @method('PUT')
              <div class="col-md-6 px-3">
                <div class="form-group row mb-3">
                    <div class="col-md-2">
                        <label class="form-label">ID</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="id" name="id" value="{{ $i->id }}" readonly>
                    </div>
                </div>

                <div class="form-group row mb-3">
                  <div class="col-md-2">
                      <label class="form-label">Invoice ID</label>
                  </div>
                  <div class="col-md-10">
                      <input type="text" class="form-control" id="invoice_id" name="invoice_id" value="{{ $i->invoice_id }}" readonly>
                  </div>
                </div>
              

              <div class="form-group row mb-3">
                <div class="col-md-2">
                    <label class="form-label">Product ID</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="product_id" name="product_id" value="{{ $i->product_id }}" readonly>
                </div>
              </div>

              <div class="form-group row mb-3">
                <div class="col-md-2">
                    <label class="form-label">Description</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="description" name="description" value="{{ $i->description }}" readonly>
                </div>
            </div>

            <div class="form-group row mb-3">
              <div class="col-md-2">
                  <label class="form-label">Quantity</label>
              </div>
              <div class="col-md-10">
                  <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $i->quantity }}" onkeypress="return inputAngka(event)">
              </div>
             </div>

              
              <div class="row mb-5">
                <div class="col-md-5">
                  <button type="submit" class="btn btn-primary mx-auto">Submit</button>
                </div>
                  
              </div>

              </div>
              </form>
            </div>
     
         @endforeach

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
        
                

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
    
    <script>

        function inputAngka(evt) {
        
        var charCode = (evt.which) ? evt.which : event.keyCode
        
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        
            return false;
        
            return true;
        
        }
        
        $(document).ready(function () {
        
          $(document).on('click','.showbtn', function() {
              var idshow = $(this).val();
            //   alert(idshow);
        
              $('#modalshow').modal('show');
              $(".btn").click(function(){
              $("#modalshow").modal('hide');
              });
        
              $.ajax({
                  type: "GET",
                  url: "/dashboard/pegawai/"+idshow,
                  success: function(response) {
                      console.log(response.pegawai.id);
                      $('#idshow').val(response.pegawai.id);
                      $('#useridshow').val(response.pegawai.user_id);
                      $('#NIPshow').val(response.pegawai.NIP);
                      $('#NIKshow').val(response.pegawai.NIK);
                      $('#namashow').val(response.pegawai.nama);
                      $('#jabatanshow').val(response.pegawai.jabatan);
                      $('#jenis_kelaminshow').val(response.pegawai.jenis_kelamin);
                      $('#nohpshow').val(response.pegawai.nohp);
                      $('#tempat_lahirshow').val(response.pegawai.tempat_lahir);
                      $('#tanggal_lahirshow').val(response.pegawai.tanggal_lahir);
                      $('#alamatshow').val(response.pegawai.alamat);
                  }
              });
          
            });
        
            $(document).on('click','.editbtn', function() {
                        var id = $(this).val();
                        alert(id);
        
                        $('#modalupdate').modal('show');
        
        
                        $(".btn").click(function(){
                        $("#modalupdate").modal('hide');
                        });
        
                        $.ajax({
                            type: "GET",
                            url: "/detail-invoice/"+id+"/edit",
                            success: function(response) {
                                console.log(response.detailinvoice);
                                // $('#id').val(response.detailinvoice.id);
                                // $('#invoice_id').val(response.detailinvoice.invoice_id);
                                // $('#product_id').val(response.detailinvoice.product_id);
                                // $('#quantity').val(response.detailinvoice.quantity);
                                // $('#total_payments').val(response.detailinvoice.total_payments);
                            }
                        });
                    });
        

        
        });

    
              
    </script>
        
   
      
   



    
    
  </body>
</html>