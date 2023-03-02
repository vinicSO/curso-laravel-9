<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title') | EspecializaTI</title>

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-50">
        <div class="container mx-auto px-4 py-8">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >Sair</button>
            </form>

            @yield('content')
        </div>
    </body>
</html>