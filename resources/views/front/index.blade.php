@extends('front.layout')

@section('content')
    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5>{{ json_decode($banner->content)->title }}</h5>
                            <h1>{{ json_decode($banner->content)->sub_title }}</h1>
                            <p>{{ json_decode($banner->content)->desc }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part pb-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xl-3 align-self-center">
                    <div class="single_feature_text ">
                        <h2>{{ json_decode($feature->content)->title }}</h2>
                        <p>{{ json_decode($feature->content)->desc }} </p>

                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-layers"></i></span>
                            <h4>{{ json_decode($better_future->content)->title }}</h4>
                            <p>{{ json_decode($better_future->content)->desc }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-new-window"></i></span>
                            <h4>{{ json_decode($qualified_trainers->content)->title }}</h4>
                            <p>{{ json_decode($qualified_trainers->content)->desc }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part single_feature_part_2">
                            <span class="single_service_icon style_icon"><i class="ti-light-bulb"></i></span>
                            <h4>{{ json_decode($job_oppurtunity->content)->title }}</h4>
                            <p>{{ json_decode($job_oppurtunity->content)->desc }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- member_counter counter start -->
    <section class="member_counter padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">{{ $courses_count }}</span>
                        <h3>Courses</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">{{ $trainers_count }}</span>
                        <h3>Trainers</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">{{ $students_count }}</span>
                        <h3>Students</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- member_counter counter end -->

    <!--::review_part start::-->
    <section class="special_cource padding_top pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>{{ json_decode($course->content)->title }}</p>
                        <h2>{{ json_decode($course->content)->sub_title }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($courses as $course)
                    <div class="col-sm-6 col-lg-4">
                        <div class="single_special_cource">
                            <img style="width: 100%" src="{{ asset('uploads/courses/' . $course->img) }}"
                                class="special_img" alt="">
                            <div class="special_cource_text">
                                <a href="{{ route('front.show', $course->category->id) }}"
                                    class="btn_4">{{ $course->category->name }} </a>
                                <h4>{{ $course->price }}</h4>
                                <a href="{{ route('front.showcourse', [$course->category->id, $course->id]) }}">
                                    <h3>{{ $course->name }} </h3>
                                </a>
                                <p>{{ $course->small_desc }}</p>
                                <div class="author_info">
                                    <div class="author_img">
                                        <img style="width: 28%"
                                            src="{{ asset('uploads/trainers/' . $course->trainer->img) }}" alt="">
                                        <div class="author_info_text">
                                            <p>Conduct by:</p>
                                            <h5>{{ $course->trainer->name }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!--::blog_part end::-->
@endsection
