<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Page | Invoices</title>
  </head>
  <body>
    <div class="container">
        <h4 class="mt-4 mb-4">List Invoices</h4>
        <a href="/invoices/create" class="badge bg-dark mb-4" style="text-decoration: none">Create Data</a>
        <div class="table-responsive col-lg-10">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">Invoice ID</th>
                  <th scope="col">From</th>
                  <th scope="col">For</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($invoices as $i)
                <tr>
                    <td>{{ $i->id }}</td>
                    <td>PT Esensi Solusi Buana</td>
                    <td>{{ $i->CompanyName }}</td>
                    <td>{{ $i->status }}</td>
                    <td>
                        <a href="/invoices/{{ $i->id }}" class="badge bg-info" style="text-decoration: none">Read</a>
                        <a href="/invoices/{{ $i->id }}/edit" class="badge bg-warning" style="text-decoration: none">Update</a>
                        <form action="/invoices/{{ $i->id }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="badge bg-danger border-0" onclick="return confirm('Are you sure want to delete data?')">Delete</button>
                        </form>
                    </td>
                  </tr>  
                @endforeach
                
              </tbody>
            </table>
        
          </div>

    </div>
    




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

    
  </body>
</html>