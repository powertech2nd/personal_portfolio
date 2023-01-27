@extends('personalPortfolio.layouts.main')

@section('custom-css')
    <style>
        .section-content{
            margin: auto;
        }

        button.nav-link.active {
            color: var(--primary-color-indra) !important;
            background-color: var(--dark-body--color) !important;
            border-color: var(--primary-color-indra) var(--primary-color-indra) var(--dark-body-background-color) !important;
            font-weight: 600;
            outline: none;
        }

        .nav-tabs{
            --bs-nav-tabs-border-color : var(--primary-color-indra);
        }

        .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
            border-color : var(--primary-color-indra);
        }

        .body-wrapper {
            padding: 80px 30px 30px;
            width: 1024px;
            /* background-color: rgb(198, 147, 147); */
            margin: auto;
        }


        .label-php{
            background-color: #6b7eb9;
            color: white;
        }

        .label-javascript{
            background-color: #f0db4e;
        }

        .label-csharp{
            background-color: #7f3187;
            color: white;
        }

        .label-visualbasic{
            background-color: #196098;
        }

        .label-golang{
            background-color: #209eac;
            color:white;
        }

        .label-java{
            background-color: #5382a0;
            color: white;
        }

        .label-laravel{
            background-color: #a80b05;
            color:white;
        }

        .label-codeigniter{
            background-color: #791b01;
            color: white;
        }

        .label-dotnet, .label-aspdotnet{
            background-color: #008cdb;
            color: white;
        }

        .label-dotnetcore, .label-aspdotnetcore{
            background-color: #643997;
            color:white;
        }

        .label-gingonic{
            background-color: #209eac;
            color:white;
        }

        .label-mysql{
            background-color: #bf7b0d;
            color: white;
        }

        .label-mssql{
            background-color: #b03436;
            color: white;
        }

        .label-postgresql{
            background-color: #336691;
            color: white;
        }

        .label-k2apps{
            background-color: #80ae41;
            color: white;
        }

        .label-ssrs{
            background-color: #b03436;
            color: white;
        }

        .label-kepserver {
            background-color: #70b738;
            color: white;
        }

        .label-odoo {
            background-color: #a24689;
            color: white;
        }

        .label-mathjax {
            background-color: #2d9c43;
            color: white;
        }

        .label-octobercms {
            background-color: #dc6c25;
            color: white;
        }

        .line-project-separator {
            margin-top: 30px;
            margin-bottom:30px;
            border-top: 2px solid var(--primary-color-indra);
        }
    </style>
@endsection


@section('content')
    <section class="section-content row">
        <div class="row text-center">
            <h1>Projects</h1>
        </div>

        <div class="card border-0 mb-5 col-11 m-auto mt-5">
            <ul class="nav nav-tabs mb-3 fs-5" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $active_tab == 'gb' ? 'active' : '' }}" id="tabs-gb-tab" data-bs-toggle="tab"
                        data-bs-target="#tabs-gb" type="button" role="tab">Geniebook</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $active_tab == 'kag' ? 'active' : '' }}" id="tabs-kag-tab" data-bs-toggle="tab"
                        data-bs-target="#tabs-kag" type="button" role="tab">Kapal Api Global</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $active_tab == 'spk' ? 'active' : '' }}" id="tabs-spk-tab" data-bs-toggle="tab" data-bs-target="#tabs-spk"
                        type="button" role="tab">Santos Premium Krimer</button>
                </li>
            </ul>
            <div class="tab-content" id="tabs-tabContent">
                <!-- ============================= TAB GENIEBOOK================================= -->
                <div class="tab-pane fade {{ $active_tab == 'gb' ? 'active show' : '' }}" id="tabs-gb" role="tabpanel">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title">Geniebook Admin</h5>
                            <p class="card-text fs-6">Maintain an existing codebase including troubleshooting bugs for an admin website that manages all Geniebook leads data. With this website, the admin can view, edit, and update data including changing or bypassing website settings for certain features like SMS authentication and so on.</p>
                            <div class="card-text">
                                <span class="badge label-php">PHP</span>
                                <span class="badge label-codeigniter">Code Igniter</span>
                                <span class="badge label-mysql">MySQL</span>
                            </div>
                        </div> 
                    </div>

                    <hr class="line-project-separator">

                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title">Geniebook Arena (Backend)</h5>
                            <p class="card-text fs-6">Develop a quiz game website that is targeted at students in Elementary School and Junior High School. This website will be accessed by hundreds of students simultaneously when they are joining quizzes every day so performance is critical for this website. 
                                </p>
                            <p class="card-text fs-6">On the development side, we need to migrate the existing thousands of question to Geniebook Arena which have a different database structure for storing question.</p>
                            <div class="card-text">
                                <span class="badge label-golang">Golang</span>
                                <span class="badge label-gingonic">Gin Gonic</span>
                                <span class="badge label-mysql">MySQL</span>
                            </div>
                        </div>
                    </div>

                    <hr class="line-project-separator">

                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title">Geniebook Blog</h5>
                            <p class="card-text fs-6">Build a blog website where user can input an article dynamically to the blog via an admin page created using October CMS and use Code Igniter to show the articles.
                                </p>
                            <p class="card-text fs-6">In the article user can input any kind of data including mathematical formula.</p>
                            <div class="card-text">
                                <span class="badge label-codeigniter">Code Igniter</span>
                                <span class="badge label-octobercms">October CMS</span>
                                <span class="badge label-mysql">MySQL</span>
                                <span class="badge label-mathjax">MathJax</span>
                            </div>
                        </div>
                    </div>


                    <hr class="line-project-separator">

                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title">Geniebook Homepage</h5>
                            <p class="card-text fs-6">Assist in developing the company homepage website to improve the business presence online, web usability, and gain more leads. To achieve the goal the engineering team work closely with branding, design, product, and marketing team.
                                </p>
                            <p class="card-text fs-6">There are serveal aspect that need to be considered when managing the website such as SEO, website performance, and mobile responsiveness.</p>
                            <div class="card-text">
                                <span class="badge label-golang">Code Igniter</span>
                                <span class="badge label-mysql">MySQL</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================= END TAB GENIEBOOK================================= -->

                <!-- ============================= TAB KAG================================= -->
                <div class="tab-pane fade {{ $active_tab == 'kag' ? 'active show' : '' }}" id="tabs-kag" role="tabpanel">
                    <div class="card border-0 ">
                        <div class="card-body">
                            <h5 class="card-title">E-Procurement</h5>
                            <p class="card-text fs-6">Develop a website for the procurement team to view offers that
                                is inputted
                                by the third-party vendor. This website was created using the Backend For Frontend
                                pattern and
                                also creating a console program that used for 2 ways synchronization between 2
                                different
                                databases.<p>
                            <div class="card-text">
                                <span type="" class="badge label-csharp">C#</span>
                                <span type="" class="badge label-aspdotnetcore">ASP.NET Core</span>
                                <span class="badge label-aspdotnetcore">.Net Core</span>
                                <span type="" class="badge label-mssql">Microsoft SQL Server</span>
                            </div>
                        </div>
                    </div>

                    <hr class="line-project-separator">

                    <div class="card border-0 ">
                        <div class="card-body">
                            <h5 class="card-title">Cek Kesehatan Mandiri</h5>
                            <p class="card-text fs-6">Maintain an existing codebase for a system that checks employee health each day by tracking user answers relating to Covid Pandemic.<br/>This system will save user answers for questions that have to be answered by employees every day and automatically flag if a user is at risk to be infected by Covid-19.<p>
                            <div class="card-text">
                                <span class="badge label-php">PHP</span>
                                <span class="badge label-codeigniter">Code Igniter</span>
                                <span class="badge label-java">Java</span>
                                <span class="badge label-mysql">MySQL</span>
                                <span class="badge label-postgresql">PostgreSQL</span>
                                <span class="badge label-odoo">Odoo CRM</span>
                            </div>
                        </div>
                    </div>

                    <hr class="line-project-separator">

                    <div class="card border-0 ">
                        <div class="card-body">
                            <h5 class="card-title">SALIS</h5>
                            <p class="card-text fs-6">Maintain an existing codebase and continue adding a new feature to the website that keeps track of employee target for each year and Key Performance Index (KPI). There are many types of KPI for employees which have different types of reports that are created with SQL Server Reporting Service.<p>
                            <div class="card-text">
                                <span class="badge label-csharp">C#</span>
                                <span class="badge label-aspdotnet">ASP.NET</span>
                                <span class="badge label-mssql">Microsoft SQL Server</span>
                                <span class="badge label-ssrs">SQL Server Reporting Service</span>
                            </div>
                        </div>
                    </div>

                    <hr class="line-project-separator">

                    <div class="card border-0 ">
                        <div class="card-body">
                            <h5 class="card-title">Jadwal dan Notulen Meeting</h5>
                            <p class="card-text fs-6">Develop a website that is used for creating meeting schedule and writing minutes of the meeting. This website has a feature to view, create, edit, and delete schedules. Users can also upload attachments to the website for certain meetings.<p>
                                <div class="card-text">
                                    <span class="badge label-csharp">C#</span>
                                    <span class="badge label-aspdotnetcore">ASP.NET Core</span>
                                    <span class="badge label-mssql">Microsoft SQL Server</span>
                                    <span class="badge label-ssrs">SQL Server Reporting Service</span>
                                </div>
                        </div>
                    </div>

                    <hr class="line-project-separator">

                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title">Web Project Register</h5>
                            <p class="card-text fs-6">Build a website to manage and document the progress of projects that is worked on by the department. On this website, users can input a template for registering a project that is used to pre-fill out the form for creating a project.<p>
                            <div class="card-text">
                                <span class="badge label-csharp">C#</span>
                                <span class="badge label-aspdotnetcore">ASP.NET Core</span>
                                <span class="badge label-mssql">Microsoft SQL Server</span>
                                <span class="badge label-ssrs">SQL Server Reporting Service</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================= END TAB KAG================================= -->


                <!-- ============================= TAB SPK================================= -->
                <div class="tab-pane fade {{ $active_tab == 'spk' ? 'active show' : '' }}" id="tabs-spk" role="tabpanel">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title">E-Service</h5>
                            <p class="card-text fs-6">Successfully develop a website to manage requests between
                                departments.
                                Users
                                can also see the report for certain requests or departments to see how long it takes
                                time to
                                complete the request.</p>
                            <p class="card-text fs-6">After this project was successfully implemented in Santos
                                Premium
                                Krimer
                                then
                                it begin to roll out to other Kapal Api companies such as Santos Jaya Abadi, Agel
                                Langgeng,
                                Excelso Multirasa, and Weiss Tech.</p>
                            <div class="card-text">
                                <span class="badge label-csharp">C#</span>
                                <span class="badge label-aspdotnet">ASP .NET</span>
                                <span class="badge label-mssql">Microsoft SQL Server</span>
                            </div>
                        </div>
                    </div>

                    <hr class="line-project-separator">

                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title">Factory Monitoring System</h5>
                            <p class="card-text fs-6">Build a service program that runs every minute to keep track
                                of hundreds
                                of production plant sensor values and save it in the database. There is also a
                                website that
                                shows the report visualized with a graph that users can use to see certain sensor
                                values in a
                                range of time.</p>
                            <div class="card-text">
                                <span class="badge label-php">PHP</span>
                                <span class="badge label-laravel">Laravel</span>
                                <span class="badge label-mysql">MySQL</span>
                                <span class="badge label-dotnet">.Net</span>
                            </div>
                        </div>
                    </div>

                    <hr class="line-project-separator">


                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title">E-Checklist Reporting</h5>
                            <p class="card-text fs-6">Create advance reporting for the E-Checklist website that is
                                used by the
                                production team. <br /> Due to the complexity of the report, they all are built
                                using SQL Server
                                Reporting Service (SSRS). </p>
                            <p class="card-text fs-6">For each report there are multiple queries with subquery,
                                pivot table,
                                temporary table, and loops that are stored in a stored procedure, then we apply
                                custom
                                formatting and grouping in SSRS to display it. </p>
                            <div class="card-text">
                                <span class="badge label-k2apps">K2 Apps</span>
                                <span class="badge label-ssrs">SQL Server Reporting Service</span>
                                <span class="badge label-mssql">Microsoft SQL Server</span>
                            </div>
                        </div>
                    </div>

                    <hr class=" border-2 border-top">

                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title">SCADA</h5>
                            <p class="card-text fs-6">Develop a desktop program that shows hundreds of production
                                packaging plan
                                sensor values in real-time and displays it as a machinery diagram with sensor
                                textbox and
                                picture that change color and text based on sensor value.</p>
                            <p class="card-text fs-6">There are many types of sensors that have a different behavior
                                that has to
                                be implemented in the program using OOP.</p>
                            <div class="card-text">
                                <span class="badge label-csharp">C#</span>
                                <span class="badge label-kepserver">KepServer</span>
                                <span class="badge label-dotnet">.Net</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================= END tAB SPK================================= -->
            </div>
    </section>
@endsection