@extends('personalPortfolio.layouts.main')

@section('custom-css')
    <style>
        .section-content{
            margin: auto;
        }

        .techstacks_area {
            padding-bottom: 60px;
        }

        .techstacks_area .techstacks_inner_area {
            position: relative;
            overflow: hidden;
        }

        .techstacks_area .techstacks_inner_area:before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 5px;
            margin-left: -2.5px;
            background: #053661;
        }

        .techstacks_area .techstacks_inner_area .techstacks_item {
            width: 50%;
            max-width: 420px;
            background: var(--dark-secondary-color);
            margin-bottom: 30px;
            padding: 20px;
            position: relative;
            z-index: 2;
            border-radius : 0px 0px 8px 8px;
            /* border : 2px solid var(--primary-color-indra);
            border-top: none; */
        }

        .techstacks_area .techstacks_inner_area .techstacks_item:before {
            content: attr(data-line);
            position: absolute;
            right: -18%;
            top: 0px;
            height: 50px;
            width: 50px;
            border-radius: 50%;
            border: 4px solid #6eb7f7;
            text-align: center;
            color: #fff;
            line-height: 43px;
            font-family: "Raleway", sans-serif;
            font-size: 30px;
            font-weight: bold;
            text-transform: uppercase;
            background: #0d87f2;
        }

        .techstacks_area .techstacks_inner_area .techstacks_item:after {
            content: "";
            background: #6eb7f7;
            height: 4px;
            position: absolute;
            right: -48px;
            top: 0px;
            width: 119%;
        }

        .techstacks_area .techstacks_inner_area .techstacks_item:nth-child(even) {
            float: right;
        }

        .techstacks_area .techstacks_inner_area .techstacks_item:nth-child(even):before {
            right: auto;
            left: -18%;
        }

        .techstacks_area .techstacks_inner_area .techstacks_item:nth-child(even):after {
            left: -48px;
        }

        .techstacks_area .techstacks_inner_area .techstacks_item:nth-child(odd) {
            float: left;
        }

        .techstacks_area .techstacks_inner_area .techstacks_item:nth-child(2) {
            margin-top: 108px;
        }

        .techstacks_area .techstacks_inner_area .techstacks_item:last-child {
            margin-bottom: 0px;
        }

        .techstacks_area .techstacks_inner_area .techstacks_item h6 {
            font-size: 14px;
            color: #0ac2bc;
            font-family: "Raleway", sans-serif;
            font-weight: bold;
        }

        .techstacks_area .techstacks_inner_area .techstacks_item h4 {
            font-size: 18px;
            font-family: "Raleway", sans-serif;
            /* color: #6eb7f7; */
            padding: 8px 0px 7px 0px;
        }

        .techstacks_area .techstacks_inner_area .techstacks_item h5 {
            font-size: 14px;
            color: #333333;
            font-family: "Raleway", sans-serif;
        }

        .techstacks_area .techstacks_inner_area .techstacks_item p {
            font-size: 13px;
            line-height: 24px;
            font-family: "Raleway", sans-serif;
            color: #666666;
            font-weight: 400;
            padding-top: 12px;
        }
    </style>
@endsection

@section('content')
    <section class="section-content row py-4">
        <div class="techstacks_area">
            <div class="main-title text-center">
                <h2>Tech Stacks</h2>
            </div>

            <div class="mt-5 techstacks_inner_area">
                <div class="techstacks_item" data-line="">
                    <h4>Languages</h4>

                    <ul>
                        <li>PHP</li>
                        <li>Javascript</li>
                        <li>C#</li>
                        <li>VB</li>
                        <li>Golang</li>
                    </ul>
                </div>
                <div class="techstacks_item" data-line="">
                    <h4>Frameworks</h4>
                    <ul>
                        <li>Laravel</li>
                        <li>Code Igniter</li>
                        <li>.NET - ASP.NET</li>
                        <li>.NET Core - ASP.NET Core</li>
                        <li>Gin Gonic</li>
                    </ul>
                </div>
                <div class="techstacks_item" data-line="">
                    <h4>Database</h4>
                    <ul>
                        <li>MySQL</li>
                        <li>Microsoft SQL Server</li>
                        <li>PostgreSQL</li>
                    </ul>
                </div>
                <div class="techstacks_item" data-line="">
                    <h4>Others</h4>
                    <ul>
                        <li>Git</li>
                        <li>Jira</li>
                        <li>K2 Apps</li>
                        <li>KepServer OPC Server</li>
                        <li>SQL Server Reporting Service</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection