@extends('layouts.home')

@section('title')
    E2C
@endsection

@section('header')
    <li class="nav-item"><a class="nav-link active" href="{{ route('home.index') }}">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="#">Formations</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('home.contact') }}">Contacts</a></li>
@endsection

@section('main')
    <section class="pt-5">
        <div class="container pt-4 pt-xl-5">
            <div class="row pt-5">
                <div class="col-md-8 text-center text-md-start mx-auto">
                    <div class="text-center">
                        <h1 class="display-4 fw-bold mb-5">Discovering the Power of <span class="underline">Second Chances</span> .</h1>
                        <p class="fs-5 text-muted mb-5">Transforming Lives and Communities: How École de la 2e Chance is Empowering Young People to Build Brighter Futures.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="text-center position-relative"><img class="img-fluid" src="{{ asset('storage/img/illustrations/meeting.svg') }}" style="width: 800px;"></div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-4 py-xl-5">
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-lg-3">
                <div class="col">
                    <div class="card border-light border-1 d-flex justify-content-center p-4">
                        <div class="card-body">
                            <div class="bs-icon-lg bs-icon-rounded bs-icon-secondary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-4 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-school">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path>
                                    <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path>
                                </svg></div>
                            <div>
                                <h4 class="fw-bold">Carpentry</h4>
                                <p class="text-muted">Learn the skills and techniques needed to work with wood and other building materials, including cutting, shaping, and joining.</p>
                                <button class="btn btn-sm px-0" type="button">Learn More&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                    </svg><br></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-light border-1 d-flex justify-content-center p-4">
                        <div class="card-body">
                            <div class="bs-icon-lg bs-icon-rounded bs-icon-secondary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-4 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-school">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path>
                                    <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path>
                                </svg></div>
                            <div>
                                <h4 class="fw-bold">Cooking</h4>
                                <p class="text-muted">Learn the culinary skills and techniques needed to prepare a variety of dishes and cuisines, including food safety, nutrition, and presentation.</p><button class="btn btn-sm px-0" type="button">Learn More&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                    </svg><br></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-light border-1 d-flex justify-content-center p-4">
                        <div class="card-body">
                            <div class="bs-icon-lg bs-icon-rounded bs-icon-secondary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-4 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-school">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path>
                                    <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path>
                                </svg></div>
                            <div>
                                <h4 class="fw-bold">Automotive Repair</h4>
                                <p class="text-muted">Develop the skills and knowledge required to diagnose, repair, and maintain vehicles, including engine mechanics, electrical systems.</p><button class="btn btn-sm px-0" type="button">Learn More&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                    </svg><br></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-4 py-xl-5">
            <div class="row gy-4 gy-md-0">
                <div class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                    <div><img class="rounded img-fluid fit-cover" style="min-height: 300px;" src="{{ asset('storage/img/illustrations/presentation.svg') }}" width="800"></div>
                </div>
                <div class="col">
                    <div style="max-width: 450px;">
                        <h3 class="fw-bold pb-md-4">Measuring Success: École de la 2e Chance's Impact and <span class="underline">Achievements</span> .</h3>
                        <p class="text-muted py-4 py-md-0">Through its vocational training programs, personal development support, and academic guidance, the school has helped many young people to overcome the challenges they face and to unlock their full potential.</p>
                        <div class="row gy-4 row-cols-2 row-cols-md-2">
                            <div class="col">
                                <div><span class="fs-2 fw-bold text-primary bg-warning">50%</span>
                                    <p class="fw-normal text-muted">Academic Achievement</p>
                                </div>
                            </div>
                            <div class="col">
                                <div><span class="fs-2 fw-bold text-primary bg-warning">40%</span>
                                    <p class="fw-normal text-muted">Employment in Target Fields</p>
                                </div>
                            </div>
                            <div class="col">
                                <div><span class="fs-2 fw-bold text-primary bg-warning">3+</span>
                                    <p class="fw-normal text-muted">Years of experience</p>
                                </div>
                            </div>
                            <div class="col">
                                <div><span class="fs-4 fw-bold text-primary bg-warning">Positive Social Impact</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 mt-5">
        <div class="container py-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">What people say<br><span class="underline pb-2">about us</span></h2>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 d-sm-flex justify-content-sm-center">
                <div class="col mb-4">
                    <div class="d-flex align-items-center align-items-sm-start"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-quote fs-1 text-warning flex-shrink-0">
                            <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"></path>
                        </svg>
                        <div>
                            <p class="fs-6 mb-3 ms-2">E2C gave me a second chance to build a career and a better life. The program helped me gain new skills and confidence, and I was able to find a job in my field soon after graduating.</p>
                            <div class="d-flex ms-2">
                                <div class="d-flex">
                                    <p class="fw-bold me-2">Nada</p>
                                    <p class="text-muted mb-0">E2C graduate</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="d-flex align-items-center align-items-sm-start"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-quote fs-1 text-warning flex-shrink-0">
                            <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"></path>
                        </svg>
                        <div>
                            <p class="fs-6 mb-3 ms-2">Ecole de la 2ème Chance is an invaluable resource for young people who have struggled with traditional education. The programs are tailored to each student's needs and provide practical skills and training that are essential for success in today's job market.</p>
                            <div class="d-flex ms-2">
                                <div class="d-flex">
                                    <p class="fw-bold me-2">Ahmed</p>
                                    <p class="text-muted mb-0">E2C instructor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="d-flex align-items-center align-items-sm-start"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-quote fs-1 text-warning flex-shrink-0">
                            <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"></path>
                        </svg>
                        <div>
                            <p class="fs-6 mb-3 ms-2">I was hesitant to apply to Ecole de la 2ème Chance at first, but I am so glad I did. The program helped me discover my strengths and interests and gave me the confidence to pursue my dreams.</p>
                            <div class="d-flex ms-2">
                                <div class="d-flex">
                                    <p class="fw-bold me-2">Reda</p>
                                    <p class="text-muted mb-0">current E2C student</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
