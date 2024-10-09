<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortner | Laravel</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>

<div class="container" style="margin-top: 10px;">

    
    <div class="card">

      <div class="card-header">

        <form method="POST" action="{{ route('short.link') }}">
            @csrf
            <div class="input-group mb-3">

              <input type="text" name="link" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">

              <div class="input-group-append">
                <button class="btn btn-success" type="submit">Shorten URL</button>
              </div>

            </div>
        </form>
      </div>

      <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif

            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Short Link</th>
                        <th>Link</th>
                        <th>Count Clicks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shortlink as $row)
                        <tr>
                            <td>{{ $row->id }}</td>

                            <td><a href="{{ route('short.link.code', $row->code) }}" target="_blank">{{ route('short.link.code', $row->code) }}</a></td>
                            <td>{{ $row->link }}</td>

                            <td>{{ $row->clicks }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>
</div>
    
</body>
</html>