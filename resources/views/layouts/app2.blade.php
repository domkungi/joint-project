<html>

<head>
    <title>Handsome - @yield('title')</title>
    <meta charset="utf-8">
    <title>Responsive Navbar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js" defer></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style2.css')}}">

    @stack('styles')


    @livewireStyles

</head>

<body>
    <nav>
        <input type="checkbok" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Handsome - SD</label>
        <ul>
            <li><a class="active" href="/index">Home</a></li>
            <li><a href="/customer">Customer</a></li>
            <li><a href="/inquiry">Inquiry</a></li>
            <li><a href="/quotation">Quotation</a></li>
            <li><a href="/saleorder">Sale Order</a></li>
            <li><a href="/picking">Picking</a></li>
            <li><a href="/invoice">Invoice</a></li>
            <li><a href="/storage">Inventory</a></li>
            <li><a href="/summary">Summary</a></li>
        </ul>
    </nav>
    <section>

     @section('content')

    @show

    </section>

   

    @stack('scripts')
    @livewireScripts


</body>

</html>