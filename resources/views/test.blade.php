<html>
    <head>
        <title>Halaman test</title>
    </head>
    <body>
        <h1>Hello World {{ $kata }}</h1>
        <h2>{{ $kata2 }}</h2>
        <a href="{{ $url }}">Klik disini</a>
        <h3>Tanggal: {{ $tanggal }}</h3>
        <h4>Tanggal: {{ date('d-m-Y') }}</h4>
        <h3>Sub Data 1</h3>
        <ul>
            <li>{{ $subdata1['sd11'] }}</li>
            <li>{{ $subdata1['sd12'] }}</li>
        </ul>
        <h3>Sub Data 2</h3>
        <ul>
            @foreach($subdata2 as $data)
            <li>{{ $data }}</li>
            @endforeach
        </ul>

    </body>
</html>