@extends('admin.layouts.master')

@section('content')
    <div class="content__body">
        <div class="main__home">
            <div class="row no-gutters">
                <div class="col* col-md-6 col-lg-3 dashboard__stats--1 dashboard__hover">
                    <a href="#">
                        <div class="dashboard__box dashboard__c1">
                            <div class="dashboard__infos">
                                <span class="sub__title">total order</span>
                                <h5 class="dashboard__count">1200</h5>
                                <p>Total order for last 20 days</p>
                            </div>

                            <div class="dashboard__icon pos__abs">
                                <i class="ri-shopping-basket-line"></i>
                            </div>

                        </div>
                    </a>
                </div>

                <div class="col* col-md-6 col-lg-3 dashboard__stats--1 dashboard__hover">
                    <a href="#">
                        <div class="dashboard__box dashboard__c2">
                            <div class="dashboard__infos">
                                <span class="sub__title">New User</span>
                                <h5 class="dashboard__count">100</h5>
                                <p>Total number of user for last 20 days</p>
                            </div>

                            <div class="dashboard__icon pos__abs">
                                <i class="ri-shield-user-line"></i>
                            </div>

                        </div>
                    </a>
                </div>

                <div class="col* col-md-6 col-lg-3 dashboard__stats--1 dashboard__hover">
                    <a href="#">
                        <div class="dashboard__box dashboard__c3">
                            <div class="dashboard__infos">
                                <span class="sub__title">Task</span>
                                <h5 class="dashboard__count">1000</h5>
                                <p>Total number of task for last 20 days</p>
                            </div>

                            <div class="dashboard__icon pos__abs">
                                <i class="ri-folder-shield-2-line"></i>
                            </div>

                        </div>
                    </a>
                </div>

                <div class="col* col-md-6 col-lg-3 dashboard__stats--1 dashboard__hover">
                    <a href="#">
                        <div class="dashboard__box dashboard__c4">
                            <div class="dashboard__infos">
                                <span class="sub__title">Invoices</span>
                                <h5 class="dashboard__count">1000</h5>
                                <p>Total number of Invoices for last 40 days</p>
                            </div>

                            <div class="dashboard__icon pos__abs">
                                <i class="ri-bill-line"></i>
                            </div>

                        </div>
                    </a>
                </div>

                <div class="col* col-md-6 col-lg-3 dashboard__stats--1 dashboard__hover">
                    <a href="{{ route('cms.dashboard') }}">
                        <div class="dashboard__box dashboard__c4">
                            <div class="dashboard__infos">
                                <span class="sub__title">CMS Module</span>
                            </div>

                            <div class="dashboard__icon pos__abs">
                                <i class="ri-bill-line"></i>
                            </div>

                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>





    <div class="sidenav-overlay"></div>
@endsection



@section('footer_resources')
@endsection
