@extends('personalPortfolio.layouts.main')

@section('custom-css')
    <style>
        .section-content {
            /* background-color: darkorange; */
            width: 600px;
            margin: auto;
        }
        .section-content p {
            font-size: 1.2rem;
        }

        .form-control {
            background-color: var(--dark-secondary-color);
            border: 1px solid var(--dark-secondary-color);
            color: white;
        }

        .form-control:focus {
            background-color: var(--dark-secondary-color);
            border: 1px solid var(--primary-color-indra);
            color: white;
        }

        /* Change the white to any color */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px var(--dark-secondary-color) inset !important;
        }

        /*Change text in autofill textbox*/
        input:-webkit-autofill {
            -webkit-text-fill-color: white !important;
        }

        .form-control.is-invalid, .was-validated .form-control:invalid {
            color: #eb4432;
        }

        .invalid-feedback{
            color: #eb4432;
        }
    </style>
@endsection

@section('content')
    <section class="section-content row">
        <div class="row">
            <h1>Contact Me</h1>
            <p>If you'd like to ask about a project or just have question for me, get in touch with me by filling
                the
                form below.</p>
        </div>
        <div class="row mt-3">
            <form method="post" action="{{ route('personalPortfolio.contactSubmit') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" col-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class=" mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control  @error('subject') is-invalid @enderror" id="subject" name="subject">
                    @error('subject')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control  @error('message') is-invalid @enderror" id="message" name="message" rows="3"></textarea>
                    @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
@endsection