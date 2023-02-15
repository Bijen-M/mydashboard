@extends('admin.cms_module.layouts.master')

@section('content')
<div class="content__body">
    <div class="main__home">
        <div class="row no-gutters">
            <div class="col* col-md-6 col-lg-3 dashboard__stats--1 dashboard__hover">
                <a href="#">
                    <div class="dashboard__box dashboard__c1">
                        <div class="dashboard__infos">
                            <span class="sub__title">Projects</span>
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

            

        </div>
    </div>
</div>
@endsection
