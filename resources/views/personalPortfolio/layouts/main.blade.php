<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"> <!-- Specify the character encoding for the HTML document -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  gives the browser instructions on how to control the page's dimensions and scaling -->
    <title>Indra Portofolio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <style>
        :root {
            --primary-color-indra: #0df2eb;
            --secondary-color-indra: #0d87f2;
            --dark-body-background-color: #031b30;
            --dark-secondary-color: #053661;
            --bs-link-color: var(--primary-color-indra);
            --bs-border-color-translucent: #08918d;
            --bs-link-hover-color: #08918d;
        }

        .card{
            --bs-card-bg: var(--dark-body-background-color);
            --bs-card-border-width: 2px;
        }

        .btn-primary {
            --bs-btn-bg: var(--secondary-color-indra);
            --bs-btn-border-color: var(--secondary-color-indra);
            --bs-btn-color: white;
        }

        .btn:hover {
            background-color: #085191;
            border-color : #085191;
            color: white;
        }

        body {
            color: white;
            background-color: var(--dark-body-background-color);
        }

        .body-wrapper {
            padding: 80px 30px 30px;
            width: 1024px;
            /* background-color: rgb(198, 147, 147); */
            margin: auto;
        }

        header {
            /* background-color: aqua; */
            margin-bottom: 50px;
        }

        header .nav-link.active {
            border-bottom: 5px solid var(--primary-color-indra);
        }

        .header-left {
            max-width: 150px;
        }

        .header-left img {
            border-radius: 50%;
            width: 110px;
        }

        .header-right .nav {
            font-size: 1.5rem;
        }

        .header-right .person-name {
            font-size: 2rem;
            padding-left: 1rem;
        }

        .header-right .person-title {
            font-size: 1rem;
            padding-left: 3.5rem;
        }

        .profile-intro {
            width: 740px;
            margin: auto;
            background-color: var(--dark-secondary-color);
        }

        footer {
            /* background-color: aqua; */
            margin-top: 50px;
        }

        .link-laravel {
            color: #f9322c;
            text-decoration: none;
        }

        .link-laravel:hover {
            color: #f9322c;
            text-decoration: underline;
        }
    </style>

    @yield('custom-css')
</head>

<body>

    <div class="body-wrapper">
        <header class="row border-bottom border-4">
            <div class="col-3 header-left">
                <img src="https://mm.widyatama.ac.id/wp-content/uploads/2020/08/dummy-profile-pic-male1.jpg"
                    alt="Indra Picture">
            </div>
            <div class="col-9 header-right">
                <div class="person-name">Wibisono Indrawan</div>
                <div class="person-title">Bachelor of Computer Science</div>
                <div>
                    <nav class="nav">
                        <a class="nav-link {{ request()->routeIs('personalPortfolio.index') ? 'active' : '' }}" href="{{ request()->routeIs('personalPortfolio.index') ? '#' : route('personalPortfolio.index') }}">Experience</a>
                        <a class="nav-link {{ request()->routeIs('personalPortfolio.projects') ? 'active' : '' }}" href="{{ request()->routeIs('personalPortfolio.projects') ? '#' : route('personalPortfolio.projects') }}">Projects</a>
                        <a class="nav-link {{ request()->routeIs('personalPortfolio.techStacks') ? 'active' : '' }}" href="{{ request()->routeIs('personalPortfolio.tectStacks') ? '#' : route('personalPortfolio.techStacks') }}">Tech Stacks</a>
                        <a class="nav-link {{ request()->routeIs('personalPortfolio.contact') ? 'active' : '' }}" href="{{ request()->routeIs('personalPortfolio.contact') ? '#' : route('personalPortfolio.contact') }}">Contact</a>
                    </nav>
                </div>
            </div>
        </header>

        @if(Session::has('global_success_alert_msg'))
        <div class="alert {{ Session::get('global_success_alert_class', 'alert-info') }} alert-dismissible fade show" role="alert">
            {{ Session::get('global_success_alert_msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        @yield('content')

       

        <footer class="p-4 my-4 border-top row border-4">
            <div class="col-3">
                Built with <a class="link-laravel" href="www.laravel.com">Laravel</a>
            </div>

            <div class="col-3 offset-6 text-end">
                <span class="">© 2022 Wibisono Indrawan</span>
                <div class="text-muted" style="font-size:0.7rem;">This website was created as a learning medium for me
                    to experiment with new things in
                    programming</div>
            </div>
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    @yield('custom-js')
</body>

</html>