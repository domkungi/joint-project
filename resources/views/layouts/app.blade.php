<html>

<head>
    <title>Handsomes @yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js" defer></script>

    @stack('styles')

    
    @livewireStyles

</head>
<body class="mm-webpage" >

    <header>

        <div class="nav">
            <ul>
          
                <li class="home"><a class="active" href="/index">Home</a></li>
                <li class="puchase-requisition"><a href="/pr">PR</a>
                    <ul>
                        <li>Puchase Requisition</li>
                    </ul>
                <li class="rfq"><a href="/rfq">RFQ</a>
                    <ul>
                        <li>Request for quotation</li>
                    </ul>
                </li>
                <li class="quotation"><a href="/inquotation">IB-Quotation</a>
                    <ul>
                        <li>Inbound Quotation</li>
                    </ul>
                </li>
                <li class="purchase-order"><a href="/po">PO</a>
                    <ul>
                        <li>Purchase Order</li>
                    </ul>
                </li>
                <li class="gd"><a href="/gr">Goods Receipt</a></li>
                <li class="product"><a href="/productlist">Product</a></li>
                <li class="vendor"><a href="/vendor">Vendor</a></li>
                <li class="employee"><a href="/employeelist">Employee</a></li>
                <li class="inventory"><a href="/storage">Inventory</a></li>
            </ul>



        </div>
    </header>

    @section('content')

    @show

    
    @stack('scripts')
    @livewireScripts
</body>

</html>