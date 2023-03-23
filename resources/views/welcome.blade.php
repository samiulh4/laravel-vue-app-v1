@extends('layouts.lumia')
@section('title')
    Laravel & Vue App | Lumia
@endsection
@section('styles')
    <style>
        #hero {
            background: url("{{ asset('assets/common/img/covers/laravel-vue-cover.png') }}") center center;
        }
    </style>
@endsection

@section('banner')
    @include('partials.lumia.banner')
@endsection
@section('content')
    <!-- ======= What We Do Section ======= -->
    @include('partials.lumia.what-we-do')

    <!-- ======= About Section ======= -->
    @include('partials.lumia.about')

    <!-- ======= Skills Section ======= -->
    @include('partials.lumia.skill')

    <!-- ======= Counts Section ======= -->
    @include('partials.lumia.count')

    <!-- ======= Services Section ======= -->
    @include('partials.lumia.service')

    <!-- ======= Portfolio Section ======= -->
    @include('partials.lumia.portfolio')

    <!-- ======= Testimonials Section ======= -->
    @include('partials.lumia.testimonial')

    <!-- ======= Team Section ======= -->
    @include('partials.lumia.team')

    <!-- ======= Contact Section ======= -->
    @include('partials.lumia.contact')
@endsection
