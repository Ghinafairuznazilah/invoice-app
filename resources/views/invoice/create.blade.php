<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <title>Page | Create Invoice</title>
  </head>
  <body>

    <div class="container">
        <h3 class="mt-4 mb-4">CREATE INVOICE</h3>
        <div class="col-lg-8">
            <form method="post" action="/invoices" class="mb-5">
                @csrf
                <div class="mb-3">
                  <label for="customer_id" class="form-label">Company Name</label>
                  <select class="form-select" id="customer_id" name="customer_id" required value="{{ old('customer_id')}}">
                      @foreach ($invoices as $i)
                          @if (old('customer_id') === $i->id)
                          <option value="{{ $i->id }}" selected>{{ $i->CompanyName }}</option>
                          @else
                          <option value="{{ $i->id }}">{{ $i->CompanyName }}</option>
                          @endif
                    
                         
                      @endforeach
                  </select>
                </div>

                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" required autofocus value="{{ old('subject')}}">
                </div>

                <div class="mb-3">
                    <label for="from" class="form-label">From</label>
                    <input type="text" class="form-control" id="dari" name="dari" required autofocus value="{{ old('dari')}}">
                </div>

                {{-- <div class="mb-3">
                    <label for="product_id" class="form-label">Product Name</label>
                    <select class="form-select" id="product_id" name="product_id" required value="{{ old('product_id')}}">
                        @foreach ($invoices as $i)
                            @if (old('product_id') === $i->id)
                            <option value="{{ $i->id }}" selected>{{ $i->description }}</option>
                            @else
                            <option value="{{ $i->id }}">{{ $i->description }}</option>
                            @endif
                      
                           
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required autofocus value="{{ old('quantity')}}">
                </div>
                --}}
        
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

        
                

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  
    
    

        
   
      
   



    
    
  </body>
</html>