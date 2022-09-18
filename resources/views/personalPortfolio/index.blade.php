@extends('personalPortfolio.layouts.main')

@section('content')
    <section class="profile-intro p-4 my-4 rounded-2">
        <div class="container-fluid">
            <h2 class="fw-bold">Hi there, my name is Indra 👋</h2>
            <p class="fs-6">I am a Web Developer from Surabaya, Indonesia.</p>
            <p class="fs-6">Graduated from Universitas Surabaya in 2018, currently working as a Web Developer mostly
                on the backend side.</p>
            <p class="fs-6">I've used PHP, C#, VB, Javascript, and Golang, but my preferred technology stack
                is PHP with Laravel and MySQL.</p>
        </div>
    </section>


    <section class="row">
        <div class="py-3 main-title text-center">
            <h2>Experience</h2>
        </div>

        <div class="card mb-3 ps-0">
            <div class="row g-0">
                <div class="col-4 px-3 d-flex align-items-center bg-white">
                    <img src="{{ asset('companyLogo/gb_logo.png') }}" class="img-fluid" alt="GB Logo">
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <h5 class="card-title">Geniebook</h5>
                        <p class="card-text">Web Developer <br /> <small class="text-muted">Nov 2021 - Now </small>
                        </p>
                        <p class="card-text">Develop and maintain fetures in the internal applications for the marketing team to manage all the leads data. Creating new apps for marketing campaigns to increase Genibook subscribers.</p>
                        <a href="{{ route('personalPortfolio.projects', ['tab' => 'gb']) }}"><button type="button" class="btn btn-primary">Learn More</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3 ps-0">
            <div class="row g-0">
                <div class="col-4 px-3 d-flex align-items-center bg-white">
                    <img src="{{ asset('companyLogo/kag_logo.webp') }}" class="img-fluid" alt="KAG Logo">
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <h5 class="card-title">PT. Kapal Api Global</h5>
                        <p class="card-text">System Developer <br /> <small class="text-muted">Jan 2020 - Nov
                                2021</small></p>
                        <p class="card-text">Responsible for developing and maintaining internal applications within the company. Also in charge of adapting to new technology to improve the development process and share the knowledge to other coworkers.</p>
                        <a href="{{ route('personalPortfolio.projects', ['tab' => 'kag']) }}"><button type="button" class="btn btn-primary">Learn More</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3 ps-0">
            <div class="row g-0">
                <div class="col-4 px-3 d-flex align-items-center bg-white">
                    <img src="{{ asset('companyLogo/spk_logo.png') }}" class="img-fluid" alt="SPK Logo">
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <h5 class="card-title">PT. Santos Premium Krimer</h5>
                        <p class="card-text">ICT Programmer <br /> <small class="text-muted">Jun 2018 - Jan
                                2020</small></p>
                        <p class="card-text">Performing all requirements to implement internal applications that meet the user's goals and needs. Starting from analyzing business processes, developing, maintaining, testing, and deployment.</p>
                        <a href="{{ route('personalPortfolio.projects', ['tab' => 'spk']) }}"><button type="button" class="btn btn-primary">Learn More</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection