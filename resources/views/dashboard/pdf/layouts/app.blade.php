<!DOCTYPE html>
<html lang="en" data-theme="light" :class="{ 'theme-dark': dark }" x-data="data()" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul }}</title>

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/logo.jpg') }}" />
    <link rel="icon" type="image/png" href="{{ asset('img/logo.jpg') }}" />



    <style>
        @font-face {
            font-family: 'Poppins';
            src: url("{{ public_path('fonts/Poppins-Black.ttf') }}") format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        .header-laporan {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            /* garis bawah header */
            padding-bottom: 10px;
        }

        .header-laporan img {
            width: 100%;
            /* penuh lebar halaman */
            max-height: 180px;
            /* tinggi maksimal */
            object-fit: contain;
            /* menjaga proporsi gambar */
        }

        .judul-laporan {
            font-size: 18px;
            font-weight: bold;
            margin-top: 15px;
            text-align: center
        }

        .table-pdf table {
            font-size: 14px;
            font-weight: bolder;
            table-layout: fixed;
            width: 60%;
        }

        .table-pdf table th,
        .table-pdf table td {
            text-align: left;
            border: none;
            padding: 5px 0 5px 0;
        }

        .table-pdf table tr {
            background-color: white;
        }

        .table-pdf table td {
            text-align: center;
            font-weight: normal;
        }

        .table-pdf table td:first-child {
            text-align: left;
            padding-left: 10px;
        }

        .table-pdf table tr:nth-child(odd) {
            background-color: #F3F3F3;
        }

        .table-pdf table th {
            font-size: 15px;
            font-weight: bold;
            color: white;
            background-color: #0BA6DF;
            padding: 7px 10px;
            text-align: center;
        }

        .table-pdf table th:first-child {
            border-top-left-radius: 5px;
        }

        .table-pdf table th:last-child {
            border-top-right-radius: 5px;
        }
    </style>

    <div class="header-laporan img">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/kop_atl.jpg'))) }}"
            style="width: 100%; max-height: 150px; object-fit: contain;">
    </div>
</head>

<body
    class="font-workSans scrollbar-thin scrollbar-thumb-purple-600 scrollbar-track-purple-600/60 scrollbar-thumb-rounded-full hover:scrollbar-thumb-purple-600/80 transition-all">
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col flex-1 w-full">
            <main class="h-full overflow-y-auto">
                @yield('container')
            </main>
        </div>
    </div>
</body>

</html>
