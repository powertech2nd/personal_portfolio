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
            <form>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class=" col-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>

                <div class=" mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject">
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                </div>

                <button type="button" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
@endsection