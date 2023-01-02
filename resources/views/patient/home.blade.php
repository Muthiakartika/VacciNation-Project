@extends('layouts.app')

@section('content')
    <!-- Botman Chat-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.css">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Patient Dashboard</h1>
            <br>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-success">Hello Mr/Mrs.{{auth()->user()->name}}</h5>
                    </div>
                    <div class="card-body">
                        <br>
                        <br>
                        <div class="text-center">
                            <img class="img-fluid px-2 px-sm-3 mt-2 mb-3" style="width: 25rem;"
                                 src="{{asset('admin/img/undraw_medical_care_movn.svg')}}" alt="Patient">
                        </div>
                        {{--                        <p>Add some quality, svg illustrations to your project courtesy of <a--}}
                        {{--                                target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a--}}
                        {{--                            constantly updated collection of beautiful svg images that you can use--}}
                        {{--                            completely free and without attribution!</p>--}}
                        {{--                        <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on--}}
                        {{--                            unDraw &rarr;</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Chat bot VacciBot--}}
    <script>
        var botmanWidget = {
            mainColor: '#1cc88a',
            bubbleBackground: '#1cc88a',
            title: 'Vacci-Bot',
            aboutText: 'Write Something',
            introMessage: "Selamat datang di Vacci-Bot"+
               " <br>Apa yang ingin anda ketahui ?</br>"+
               " <br>1. Kenapa status vaksinasi saya pending?</br>" +
               " <br>2. Kenapa request vaksinasi saya ditolak?</br>" +
               " <br>3. Bisakah saya memilih rumah sakit tempat mendapat vaksin?</br>" +
               " <br>4. Saya ingin menghapus akun saya. Bagaimana caranya?</br>" +
               "<br>5. Apakah saya bisa mendaftarkan vaksinasi untuk orang lain dengan akun saya ?</br>"+
                "<hr><br>Welcome to the Vacci-Bot."+
                " <br>What would you like to know?</br>"+
                " <br>1. Why is my vaccination status pending?</br>" +
                " <br>2. Why was my vaccination request rejected?</br>" +
                " <br>3. Can I choose the hospital where to get the vaccine?</br>" +
                " <br>4. I want to delete my account. How to?</br>" +
                "<br>5.  Can I register vaccinations for other people with my account?</br>"
        };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@endsection

