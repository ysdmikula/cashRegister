<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous" defer>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous" defer>
    </script>
    <script src="{{ asset('js/calculator.js') }}" defer></script>
    <script src="{{ asset('js/receipt.js') }}" defer></script>
</head>

<body class="d-flex overflow-hidden vh-100">
    <div id="cashRegister" class="d-flex flex-column h-100">
        <div class="receipt active" id="0"></div>
        <div id="total" class="d-flex align-items-center justify-content-between">
            <div>
                <div>Celkem</div>
                <div id="totalPrice" class="mx-1">0</div>
                <div>Kč</div>
            </div>
            <input type="number" id="cashAccepted">
            <span id="change">Vrátit <span class="mx-1 text-success">0</span>Kč</span>
        </div>
        <div class="d-flex">
            <button id="delete" class="flex-grow-1 bg-danger">delete</button>
            <button id="clear" class="flex-grow-1 bg-gray-900">clear</button>
            <button id="save" class="flex-grow-1 bg-success" disabled>check</button>

        </div>
        @include("components.calculator")
    </div>
    <div id="receiptList" class="d-flex flex-column">
        <button class="mb-1 active" id="0">0</button>
        <button class="mb-1 add">+</button>
    </div>
    <div>
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline d-flex w-100" id="search">
              <input class="form-control mr-sm-2 flex-grow-1" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
        <div id="products" class="d-flex flex-grow-1 flex-wrap">
        @foreach ($products as $key=>$product)
            <div class="productContainer"> 
                <a href="product/{{$product->id}}" class="product link" data-productId="{{$product->id}}">
                    <div>
                        <h5>{{ $product->id }}</h5>
                        <div>{{ $product->name }}</div>
                    </div>
                </a>
            </div>
        @endforeach
        </div>
    </div> 
</body>

</html>
