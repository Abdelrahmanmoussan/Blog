@section('title') Guest @endsection

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="IiZebkpgAxYLnqueWvLnsHmi1gi10sy7A77KsBBX">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link rel="preload" as="style" href="http://127.0.0.1:8000/build/assets/app-Dw2RGVvr.css" />
        <link rel="modulepreload" href="http://127.0.0.1:8000/build/assets/app-BgvOogpt.js" />
        <link rel="stylesheet" href="http://127.0.0.1:8000/build/assets/app-Dw2RGVvr.css" />
        <script type="module" src="http://127.0.0.1:8000/build/assets/app-BgvOogpt.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="/css/mystyle.css">

        {{-- style --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-*******" crossorigin="anonymous" />
        <style>
          .rating {
            unicode-bidi: bidi-override;
            direction: rtl;
            text-align: center;
          }
          .rating input {
            display: none;
          }
          .rating label {
            display: inline-block;
            padding: 5px;
            font-size: 20px;
            color: #aaa;
            cursor: pointer;
          }
        </style>
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter selection:bg-red-500 selection:text-white">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{route('tasks.index') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-black focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-black focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-black focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif

                <div>
                    <div class="container mt-5">
                        <div class="text-center mt-3">
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Posted By</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $task->id }}</td>
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $task->user->name }}</td>
                                            <td>{{ $task->created_at }}</td>
                                            <td>
                                                <a href="{{ route('tasks.show', $task->id) }}" type="button" class="btn btn-info">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div>
                        {{ $tasks->links() }}
                    </div>
                </div>

                <script>
                    const stars = document.querySelectorAll('.rating input');

                    stars.forEach((star) => {
                        star.addEventListener('click', function () {
                            resetStars();
                            const clickedStar = this.value;
                            for (let i = 0; i < clickedStar; i++) {
                                stars[i].checked = true;
                                const icon = stars[i].nextElementSibling.querySelector('i');
                                if (icon) {
                                    icon.classList.remove('far');
                                    icon.classList.add('fas');
                                }
                            }
                        });
                    });

                    function resetStars() {
                        stars.forEach((star) => {
                            star.checked = false;
                            const icon = star.nextElementSibling.querySelector('i');
                            if (icon) {
                                icon.classList.remove('fas');
                                icon.classList.add('far');
                            }
                        });
                    }
                </script>

            </div>
        </div>
    </body>
</html>
